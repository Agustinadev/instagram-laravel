<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class SearchController extends Controller
{
    public function search ($nick) {
        $search = User::where('nick', 'like', $nick . '%')->take(7)->get();

        if (!$search->isEmpty()) {
            return view('search.profile', compact("search"));
        } else {
            return view('search.profile', ["search" => "No se encuentran resultados"]);
        }

    }

}
