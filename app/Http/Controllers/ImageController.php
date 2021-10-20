<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Like;
use App\Models\Save;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as File;

class ImageController extends Controller
{
   public function create (){
       return view('images.create');
   }

   public function store (Request $request){
       $id = auth()->user()->id;


       $file = $request->file('image');
       $fileName = time() .  '-' . $file->getClientOriginalName();
       $storage = storage_path() . '\app\public\images/' .$fileName;
       //guardando en el servidor local
       $img = File::make($file)->save($storage);
       $img->resize(400, 400, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    });
       //guardando en la base de datos
        $images = new Image();
        $images->user_id = $id;
        $images->image_path = 'storage/images/'. $fileName;
        $images->description  = $request->description;

        $images->save();
        $images::all();

        return redirect()->route('index');
    }

    public function delete($image_id){
        $images = Image::where('id', $image_id)->first();
       $comments = Comment::where('image_id', $image_id)->delete();
       $likes = Like::where('image_id', $image_id)->delete();
       $saves = Save::where('image_id', $image_id)->delete();


           $images->delete();
           $url = str_replace('storage', 'public', $images->image_path);
           Storage::delete($url);

        return redirect()->route('index');
    }
}
