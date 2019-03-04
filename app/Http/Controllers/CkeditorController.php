<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Ckeditor;

class CkeditorController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function curriculum($id = null) {

        $contenido = Ckeditor::find($id);

        if (empty($contenido)) {
            $content = Ckeditor::where('id', 1)->first();
            $comprobar = null;
            return view('ckeditor.ckeditor', ['content' => $content, 'comprobar' => $comprobar]);
        } else {

            $comprobar = "si";
            $content = Ckeditor::where('id', $id)->first();
            return view('ckeditor.ckeditor', ['content' => $content, 'comprobar' => $comprobar]);
        }
    }

    public function save(Request $request) {
        $timestamp = new DateTime();

        $content = $request->input("contenido");

        DB::table("ckeditor")->insert(['id' => \Auth::user()->id, 'contenido' => $content, 'created_at' => $timestamp, 'updated_at' => $timestamp]);

        return redirect()->route('home')->with(['message' => 'Su curriculum se ha creado ']);
    }

    public function update(Request $request) {
        $user = \Auth::user();

        $validate = $this->validate($request, [
            'contenido' => 'required|max:9999',
        ]);

        $content = $request->input('contenido');

        $ckeditor = Ckeditor::find($user->id);
        $ckeditor->id = $user->id;
        $ckeditor->contenido = $content;

        $ckeditor->update();

        return redirect()->route('ck.contenido', ['id' => $user->id]);
    }

    public function getContenido($id) {

        $contenido = Ckeditor::where('id', $id)->get();

        if (count($contenido) == 0) {
            return redirect()->route('home')
                            ->with(['error' => 'No has guardado ningun curriculum']);
        } else {
            $fila = Ckeditor::where('id', \Auth::user()->id)->first();

            return view('ckeditor.verckeditor', ['fila' => $fila]);
        }
    }

}
