<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;

class UserController extends Controller
{
    //
     //prevenir rutas si estas logout
     public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function config()
    {
        return view('user.config');
    }
    
      public function update(Request $request)
    {
        
         $user=\Auth::user();
         $id =$user->id;
         
        $validate=$this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id 
        ]);
       
        $name=$request->input('name');
        $email=$request->input('email');
        
        $user->name=$name;
        $user->email=$email;
        
         //subir imagen
        $image_path=$request->file('image_path');
        if($image_path)
        {
            //poner nombre unico
            $image_path_name = time().$image_path->getClientOriginalName();
            
            //guardar en la carpeta storage
            Storage::disk('users')->put($image_path_name, File::get($image_path));
            
            // seteo el nombre de la imagen en el objeto
            $user -> image_path =$image_path_name;
        }
        
        $user->update();
        
        return redirect()->route('config')
    ->with(['message'=>'Usuario actualizado correctamente']);
        
    }
    
    public function getImage($filename)
    {
        $file= Storage::disk('users')->get($filename);
        
        return new Response($file,200);
    }
}
