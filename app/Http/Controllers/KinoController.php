<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;

class KinoController extends Controller
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $kette = $request->input('kette');
        $inbegriffen = $request->input('inbegriffen');
        $art = $request->input('art');

        $create = DB::table('kino')->insert([
            'name' => $name,
            'kette' => $kette,
            'inbegriffen' => $inbegriffen,
            'art' => $art,
        ]);

        if ($create) {
            return response('erfolgreich gespeichert');
        } else {
            return response('speicherung fehlgeschlagen');
        }
    }


    public function read()
    {
        $read = DB::select('select * from kino');

        return response()->json($read);
    }

    public function readone($id)
    {
        $read = DB::select('select * from kino where id = ?', [$id]);

        return response()->json($read);
    }

    public function update(Request $request) 
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $kette = $request->input('kette');
        $inbegriffen = $request->input('inbegriffen');
        $art = $request->input('art');

        $update = DB::table('kino')->where('id', $id)->update([
            'name' => $name,
            'kette' => $kette,
            'inbegriffen' => $inbegriffen,
            'art' => $art,
        
        ]);
        if($update == true)
        {
            return response('erfolgreich gespeichert');
        }
        else
        {
            return response('speicherung fehlgeschlagen');
        }
    }

    public function delete(Request $request, $id) 
    {
        $delete = DB::table('kino')->where("id", $id)->delete();
        if($delete == true)
        {
            return response('erfolgreich gelöscht');
        }
        else
        {
            return response('Löschung fehlgeschlagen');
        }
    }

}