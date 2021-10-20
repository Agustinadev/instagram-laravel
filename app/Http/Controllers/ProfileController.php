<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Requests\StoreBlogPost;
use App\Models\Follow;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update (Request $request) {
        $id = auth()->user()->id;
        $user = User::find($id);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->nick = $request->nick;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        //IMÁGENES
        if($request->hasFile('image')){
            $file = $request->file('image');
            $destinationPath = 'storage/avatar/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess =$request->file('image')->move($destinationPath, $fileName);
            $user->image = $destinationPath . $fileName;
        }




       //CONTRASEÑA
        $password = $request->input('password');
        if ($password) {
            $user->password = Hash::make($request->password);
        }


         //GUARDAR
        $user->save();
        return redirect()->route('profile')->with('message', 'Profile saved successfully');
    }

    public function config () {
        $image = auth()->user()->image;
        return view('profile.profile', compact('image'));
    }


    public function index ($nick) {
        $user_table = User::where('nick', $nick)->get();
        if ($user_table) {
            //user_id es quien sigue, follow_id es a quien
            foreach ($user_table as $user) {
                $id = auth()->user()->id;
                //si el usuario autentificado sigue a la persona que estoy pidiendo ver

                //yo como usuario autentificado quiero ver los seguidores de los otros ( o los mios). Entonces tengo que agarrar la columna follow_id que almacena a las personas que fueron seguidas (que tienen seguidores) y buscar ahi adentro cuantas veces aparece (o si aparece) la persona que estoy pidiendo ver. Por ejemplo, fiona quiere ver a obrasdearte, entonces me fijo cuantas veces sale (o si sale) obrasdearte en follow_id, lo cuento con el metodo count y lo imprimo. Eso seria la cantidad de seguidores








                $if_follow = Follow::where('user_id', $id)->where('follow_id', $user->id)->get();


























                
                //seguidos donde los que sigan sean iguales al usuario que quiero ver,
                //si fiona aparece en la columna "user_id", significa que esta siguiendo a gente, y lo que yo quiero agarrar en la consulta es a la gente que fiona sigue.

                //tengo que mostrar a la gente que sigue fiona (la persona que yo quiero ver) NO IMPORTA SI ESTA AUTENTIFICADA O NO. Entonces, tengo que buscar cuantas veces sale fiona en la columna user_id, porque eso seria la cantidad de veces que fiona siguio a alguien












                $followed = Follow::where('user_id', $user->id)->get();
            }

            return view('profile.index', ['nick' => $nick, 'user_table' => $user_table, 'if_follow' => $if_follow, 'followed' => $followed]);
        }
    }


}
