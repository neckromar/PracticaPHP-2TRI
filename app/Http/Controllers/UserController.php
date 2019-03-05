<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use App\Logs;
use App\Ckeditor;
use App\Mensajes;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use DateTime;

class UserController extends Controller {

    //
    //prevenir rutas si estas logout
    public function __construct() {
        
        $this->middleware('auth');
    }

    public function config($search = null) {
        $perfil = User::where('id', $search)->first();

        if (!empty($search)) {

            return view('user.config', ['perfil' => $perfil]);
        } else {
            $perfil = null;
            return view('user.config', ['perfil' => $perfil]);
        }
    }

    public function send($search = null) {
        $mensaje = null;
        if (!empty($search)) {
            $totusers = User::where('email', $search)
                            ->where('activo', 1)->get();

            return view('user.messageview', ['totusers' => $totusers,'mensaje' => $mensaje]);
        } else {

            $totusers = User::where('activo', 1)->get();
            return view('user.messageview', ['totusers' => $totusers,'mensaje' => $mensaje]);
        }
    }

    public function listadospdf() {

        $users = User::where('activo', 1)->get();
        return view('pdf.listados', ['users' => $users]);
    }

    public function listarusuarios($search = null, $select = null, $order = null) {

        if (!empty($search)) {
            $users = User::where('activo', 1)
                    ->where($select, 'LIKE', '%' . $search . '%')
                    ->orderBy($select, $order)
                    ->paginate(5);

            if (count($users) == 0) {
                return redirect()->route('listarusuarios', ['users' => $users])
                                ->with(['error' => 'No se ha encontrado a nadie']);
            } else {
                return view('user.listarusuarios', ['users' => $users]);
            }
        } else {
            $users = User::orderBy('id', "asc")
                    ->where('activo', 1)
                    ->paginate(5);

            if (count($users) == 0) {
                return view('user.listarusuarios', ['users' => $users])
                                ->with(['error' => 'No se ha encontrado a nadie']);
            } else {
                return view('user.listarusuarios', ['users' => $users]);
            }
        }
    }

    public function listarusuariosinactivos($search = null, $select = null, $order = null) {

        if (\Auth::user()->poder == "admin") {
            if (!empty($search)) {
                $users = User::where('activo', 0)
                        ->where($select, 'LIKE', '%' . $search . '%')
                        ->orderBy($select, $order)
                        ->paginate(5);

                if (count($users) == 0) {
                    return redirect()->route('listarusuariosinactivos', ['users' => $users])
                                    ->with(['error' => 'No se ha encontrado a nadie']);
                } else {
                    return view('user.listarusuariosinactivos', ['users' => $users]);
                }
            } else {
                $users = User::orderBy('id', 'asc')
                        ->where('activo', 0)
                        ->paginate(5);

                if (count($users) == 0) {
                    return view('user.listarusuariosinactivos', ['users' => $users])
                                    ->with(['error' => 'No se ha encontrado a nadie']);
                } else {
                    return view('user.listarusuariosinactivos', ['users' => $users]);
                }
            }
        } else {
            return redirect()->route('listarusuarios')
                            ->with(['error' => 'No puedes acceder a esa pagina!!']);
        }
    }

    public function messages($id) {

        $user = \Auth::user();

        if ($user->id == $id) {
            $mensajes = Mensajes::where('id_autor', $user->id)->paginate(5);

            return view('user.bandeja', ['mensajes' => $mensajes]);
        } else {
            $mensajes = Mensajes::where('id_autor', $user->id)->paginate(5);

            return redirect()->route('user.messages', $user->id)
                            ->with(['error' => 'No puedes acceder a los mensajes de otro usuario']);
        }
    }

    public function recived($id) {

        $user = \Auth::user();

        $mensajes = Mensajes::where('id_destinatario', $user->id)->paginate(5);

        return view('user.recived', ['mensajes' => $mensajes]);
    }

    public function profile($id) {
        $user = User::find($id);

        if ($user != NULL) {
            return view('user.profile', [
                'user' => $user
            ]);
        } else {
            return redirect()->route('profile', \Auth::user()->id);
        }
    }

    public function update(Request $request) {

        $user = \Auth::user();
        $id = $user->id;

        $validate = $this->validate($request, [
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'surname2' => 'max:50',
            'paginaweb' => 'max:100',
            'github' => 'max:100',
            'telefono' => 'required|string|max:9',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'image_path' => 'image'
        ]);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $surname2 = $request->input('surname2');
        $paginaweb = $request->input('paginaweb');
        $github = $request->input('github');
        $telefono = $request->input('telefono');
        $email = $request->input('email');


        $user->name = $name;
        $user->surname = $surname;
        $user->surname2 = $surname2;
        $user->paginaweb = $paginaweb;
        $user->github = $github;
        $user->telefono = $telefono;
        $user->email = $email;
        $timestamp = new DateTime();
        //subir imagen
        $image_path = $request->file('image_path');
        if ($image_path) {
            //poner nombre unico
            $image_path_name = time() . $image_path->getClientOriginalName();


            //guardar en la carpeta storage
            Storage::disk('users')->put($image_path_name, File::get($image_path));

            // seteo el nombre de la imagen en el objeto
            $user->image_path = $image_path_name;
        }
        DB::table('logs')->insert(['tipo' => 'UPDATE', 'tabla' => 'users', 'id_hechopor' => \Auth::user()->id, 'id_cambiado' => $user->id,'explicativo'=>' ha cambiado su propio perfil', 'created_at' => $timestamp, 'updated_at' => $timestamp]);

        $user->update();

        return redirect()->route('config')
                        ->with(['message' => 'Usuario actualizado correctamente']);
    }

    public function updateotro(Request $request) {



        $validate = $this->validate($request, [
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'surname2' => 'max:35',
            'telefono' => 'required|string|max:9',
            'poder' => 'required|string|max:15',
            'activo' => 'required|int|max:1',
        ]);


        $name = $request->input('name');
        $id = $request->input('id');
        $surname = $request->input('surname');
        $surname2 = $request->input('surname2');
        $telefono = $request->input('telefono');
        $poder = $request->input('poder');
        $activo = $request->input('activo');

        $user = User::where('id', $id)->first();

        $user->name = $name;
        $user->surname = $surname;
        $user->surname2 = $surname2;
        $user->telefono = $telefono;
        $user->poder = $poder;
        $user->activo = $activo;
        $timestamp = new DateTime();

        DB::table('logs')->insert(['tipo' => 'UPDATE', 'tabla' => 'users', 'id_hechopor' => \Auth::user()->id, 'id_cambiado' => $user->id,'explicativo'=>' han cambiado su perfil', 'created_at' => $timestamp, 'updated_at' => $timestamp]);

        $user->update();

        return redirect()->route('config', ['perfil' => $user])
                        ->with(['message' => 'Usuario actualizado correctamente']);
    }

    public function getImage($filename) {
        $file = Storage::disk('users')->get($filename);

        return new Response($file, 200);
    }

    public function user_delete($id) {
        $perfil = User::find($id);
        $timestamp = new DateTime();
        if (!empty($id)) {


            $user = \Auth::user();
            $enviados = Mensajes::where('id_autor', $id)
                    ->get();

            $recibidos = Mensajes::where('id_destinatario', $id)
                    ->get();


            if ($user->poder == "admin" || $user->id == $perfil->id) {

                //eliminar mensajes enviados
                if ($enviados && count($enviados) >= 1) {
                    foreach ($enviados as $enviados) {
                        $enviados->delete();
                    }
                }

                //eliminar mensajes recibidos por
                if ($recibidos && count($recibidos) >= 1) {
                    foreach ($recibidos as $recibidos) {
                        $recibidos->delete();
                    }
                }

                //  eliminar foto  del storage
                if ($perfil->image_path != "perfil.jpg") {

                    Storage::disk('users')->delete($perfil->image_path);
                }

                DB::table('logs')->insert(['tipo' => 'DELETE', 'tabla' => 'users', 'id_hechopor' => \Auth::user()->id, 'id_cambiado' => $perfil->id, 'explicativo' => ' <-Id del usuario; Eliminado -> Name: ' . $perfil->name . ' Surname: ' . $perfil->surname . ' ' . $perfil->surname2 ,'created_at' => $timestamp, 'updated_at' => $timestamp]);

                DB::table('users_deleted')->insert(['id' => $perfil->id, 'name' => $perfil->name, 'surname' => $perfil->surname, 'surname2' => $perfil->surname2, 'telefono' => $perfil->telefono, 'email' => $perfil->email, 'poder' => $perfil->poder, 'created_at' => $perfil->created_at, 'updated_at' => $timestamp]);

                //elimianr registro
                $perfil->delete();

                return redirect()->route('ver_usuarios_eliminados')
                                ->with(['message' => 'El usuario se ha borrado junto a sus datos y mensajes']);
            } else {
                
            }return redirect()->route('home')
                            ->with(['error' => 'El usuario no ha sido borrado']);
        } else {


            return redirect()->route('home')
                            ->with(['error' => 'No se ha podido eliminar a nadie']);
        }
    }

    public function pdf($activo) {
        $users = User::where('activo', $activo)->get();

        $pdf = PDF::loadView('pdf.listados', compact('users'));
        if ($activo == 1) {

            return $pdf->download('listado-usuarios-activos.pdf');
        } else {
            return $pdf->download('listado-usuarios-inactivos.pdf');
        }
    }

    public function pdf_logs() {
        $logs = Logs::all();
        $pdf = PDF::loadView('pdf.pdf_logs', compact('logs'));

        return $pdf->download('logs.pdf');
    }
    
     public function pdf_ckedit($id) {
       
         
          $contenido = Ckeditor::where('id', $id)->get();

        if (count($contenido) == 0) {
            
            return redirect()->route('home')
                            ->with(['error' => 'No se ha encontrado ningun  curriculum guardado']);
            
        } else {
            
        $user=User::find($id);
        
        $pdf_ckeditor = Ckeditor::where('id', $id)->first();
       
        $pdf = PDF::loadView('pdf.pdfckeditor', compact('pdf_ckeditor'));

        return $pdf->download('curriculum_'. $user->name.'_'. $user->surname.'.pdf');
        }
       
    }

    public function verlogs() {

        $user = \Auth::user();

        if ($user->poder == "admin") {

            $logs = Logs::paginate(6);

            return view('user.logs', ['logs' => $logs]);
        } else {

            return redirect()->route('home')
                            ->with(['error' => 'No puedes acceder a esta pagina']);
        }
    }

    public function ver_usuarios_eliminados() {

        $user = \Auth::user();

        if ($user->poder == "admin") {

            $delete = DB::table('users_deleted')->paginate(6);

            return view('admin.usuarioseliminados', ['users' => $delete]);
        } else {

            return redirect()->route('home')
                            ->with(['error' => 'No puedes acceder a esta pagina']);
        }
    }

}
