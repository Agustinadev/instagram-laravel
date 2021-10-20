<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($image_id){
        $user = auth()->user();

        $isset_like = Like::where('user_id', $user->id)
            ->where('image_id', $image_id)->count();


            $like = new Like();
        if($isset_like == 0){

            $like->image_id = (int) $image_id;
            $like->user_id = $user->id;

            $like->save();
            return response()->json([
                'message' => $like
            ]);
        }else{
           return response()->json([
                'message' => 'Ya existe el like'
            ]);
        }

    }


    public function remove($image_id){
        $user_id = auth()->user()->id;
        $delete = Like::where('image_id', $image_id)->where('user_id', $user_id)->delete();
    }
}
