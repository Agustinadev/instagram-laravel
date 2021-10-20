<?php

namespace App\Http\Controllers;

use App\Models\Save;
use Illuminate\Http\Request;

class SaveController extends Controller
{
    public function save ($image_id) {
        //instancia para acceder a las propiedades
        $save = new Save();
        //usuario autentificado
        $user_auth = auth()->user()->id;
        //consulta: donde el usuario autentificado sea el que esta pidiendo, y donde image_id sea la imagen que estoy queriendo guardar
        $isset_save = Save::where('user_id', $user_auth)->where('image_id', $image_id)->count();

        //si la publicacion no ha sido guardada, la guardo. Se igualan propiedades
        if ($isset_save == 0) {
           $save->user_id = $user_auth;
           $save->image_id = $image_id;
           $save->save();
        } else {
            //y sino, retorno una respuesta de json
            $error_save = 'Ocurrió un error al guardar la publicación';
            return response()->json(['save'=>$error_save]);
        }
    }


    public function removeSave ($image_id) {
        //usuario autentificado
        $user_auth = auth()->user()->id;
        //consulta:: la misma lógica que la de guardar
        $remove_save = Save::where('user_id', $user_auth)->where('image_id', $image_id)->delete();
    }
}
