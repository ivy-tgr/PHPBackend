<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
    

class FilmController extends Controller
{
    public function create(Request $request)
    {
        $name = $request->input('name');
        $altersfreigabe = $request->input('altersfreigabe');
        $bewertung = $request->input('bewertung');
    
        $create = DB::table('film')->insert([
            'name' => $name,
            'altersfreigabe' => $altersfreigabe,
            'bewertung' => $bewertung,
        ]);
    
        if($create == true)
        {
            return response('erfolgreich gespeichert');
        }
        else
        {
            return response('speicherung fehlgeschlagen');
        }
    }

    public function read()
    {
        $read = DB::select('select * from film');

        return response()->json($read);
    }

    public function readone($id)
    {
        $read = DB::select('select * from film where id = ?', [$id]);

        return response()->json($read);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $altersfreigabe = $request->input('altersfreigabe');
        $bewertung = $request->input('bewertung');

        $update = DB::table('film')->where('id', $id)->update([
            'name' => $name,
            'altersfreigabe' => $altersfreigabe,
            'bewertung' => $bewertung,
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

        $delete = DB::table('film')->where('id', $id)->delete();

        if($delete == true)
        {
            return response('erfolgreich gelöscht');
        }
        else
        {
            return response('Löschung fehlgeschlagen');
        }
    }
        public function Lieblingsfilm()
    {
        $besteBewertung = DB::table('film')->max('bewertung');
        $besterfilm = DB::table('film')->where('bewertung', $besteBewertung)->get();
        return response()->json($besterfilm);
    }


}