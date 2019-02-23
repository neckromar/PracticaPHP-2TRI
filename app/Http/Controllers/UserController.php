<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use App\Mensajes;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {

    //
    //prevenir rutas si estas logout
    public function __construct() {
        $this->middleware('auth');
    }

    public function config() {
        return view('user.config');
    }

    public function send($search = null) {

        if (!empty($search)) {
            $totusers = User::where('nick', $search)->get();

            return view('user.messageview', ['totusers' => $totusers]);
        } else {

            $totusers = User::all();
            return view('user.messageview', ['totusers' => $totusers]);
        }
    }

    public function messages($id) {

        $user = \Auth::user();
        
        if ($user->id == $id) {
            $mensajes = Mensajes::where('id_autor', $user->id)->get();

            return view('user.bandeja', ['mensajes' => $mensajes]);
        } else {
            $mensajes = Mensajes::where('id_autor', $user->id)->get();

            return redirect()->route('user.messages',$user->id)
                            ->with(['error' => 'No puedes acceder a los mensajes de otro usuario']);
        }
    }

    public function recived($id) {

        $user = \Auth::user();

        $mensajes = Mensajes::where('id_destinatario', $user->id)->get();

        return view('user.recived', ['mensajes' => $mensajes]);
    }

    public function profile($id) {
        $user = User::find($id);
        
        if($user != NULL)
        {
             return view('user.profile', [
            'user' => $user
        ]);
        }
        else{
              return redirect()->route('profile',\Auth::user()->id);
        }
       
    }

    public function update(Request $request) {

        $user = \Auth::user();
        $id = $user->id;

        $validate = $this->validate($request, [
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:50',
            'telefono' => 'required|string|max:9',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'image_path' => 'image'
        ]);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $telefono= $request->input('telefono');
        $email = $request->input('email');

        
        $user->name = $name;
        $user->surname = $surname;
        $user->telefono = $telefono;
        $user->email = $email;

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

        $user->update();

        return redirect()->route('config')
                        ->with(['message' => 'Usuario actualizado correctamente']);
    }

    public function getImage($filename) {
        $file = Storage::disk('users')->get($filename);

        return new Response($file, 200);
    }

}
