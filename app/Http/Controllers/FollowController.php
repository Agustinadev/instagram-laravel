<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;

class FollowController extends Controller
{
    public function follow ($follow_id){
        $user_id = auth()->user()->id;

        //para las consultas no hacee falta instanciar pero cuando tenemos que acceder a las propiedades, si
        $follow = new Follow();
        $isset_follow = Follow::where('user_id', $user_id)->where('follow_id', (int) $follow_id)->count();
        if ($isset_follow == 0) {
            $follow->user_id = $user_id;
            $follow->follow_id = (int) $follow_id;
            $follow->save();
            return response()->json(['follow' => $follow]);

        } else {
            $error_follow = 'Error al hacer la consulta';
            return response()->json(['follow' => $error_follow]);
        }
    }

    public function unfollow ($follow_id) {
        $user_id = auth()->user()->id;
        $follow = Follow::where('user_id', $user_id)->where('follow_id', (int) $follow_id)->delete();
    }
}
