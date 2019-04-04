<?php

namespace App\Http\Controllers;

use App\Control;
use Illuminate\Http\Request;

class ControlController extends Controller
{
    public function get(Request $req){
        if($req->has('table')){
            $controls = Control::
            where('table', $req->table)->
            orderBy('id', 'desc')->first();
        }

        if($controls == null){
            return response()->json($controls, 404);
        }

        return response()->json($controls, 200);

    }
}
