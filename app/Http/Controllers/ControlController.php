<?php

namespace App\Http\Controllers;

use App\Control;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControlController extends Controller
{
    public function get(Request $req){
        if($req->has('tabla')){
            $controls = Control::
            where('tabla', $req->tabla)->
            orderBy('id', 'desc')->first();
        }

        if($controls == null){
            return response()->json($controls, 404);
        }

        return response()->json($controls, 200);
    }

    public function getAll(Request $req){
        $controls = DB::table('controls')->groupBy('tabla')->get(['tabla', DB::raw('MAX(id) as id')]);

        if($controls == null){
            return response()->json($controls, 404);
        }

        return response()->json($controls, 200);

    }
}
