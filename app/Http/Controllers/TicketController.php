<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create(Request $request)
{
    $preis = $request->input('preis');
    $reihe = $request->input('reihe');
    $sitz = $request->input('sitz');
    $kaufdatum = $request->input('kaufdatum');
    $sprache = $request->input('sprache');
    $dimension = $request->input('dimension');
    $filmstart = $request->input('filmstart');
    
    $create = DB::table('ticket')->insert([
        'preis' => $preis,
        'reihe' => $reihe,
        'sitz' => $sitz,
        'kaufdatum' => $kaufdatum,
        'sprache' => $sprache,
        'dimension' => $dimension,
        'filmstart' => $filmstart,
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
        $read = DB::select('select * from ticket');

        return response()->json($read);
    }

    public function readone($id)
    {
        $read = DB::select('select * from ticket where id = ?', [$id]);

        return response()->json($read);
    }

    public function update(Request $request) 
    {
        $id = $request->input('preis');
        $preis = $request->input('preis');
        $reihe = $request->input('reihe');
        $sitz = $request->input('sitz');
        $kaufdatum = $request->input('kaufdatum');
        $sprache = $request->input('sprache');
        $dimension = $request->input('dimension');
        $filmstart = $request->input('filmstart');
        
        $update = DB::table('ticket')->where('id', $id)->update([
            'preis' => $preis,
            'reihe' => $reihe,
            'sitz' => $sitz,
            'kaufdatum' => $kaufdatum,
            'sprache' => $sprache,
            'dimension' => $dimension,
            'filmstart' => $filmstart,
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

        $delete = DB::table('ticket')->where("id", $id)->delete();
        if($delete == true)
        {
            return response('erfolgreich gelöscht');
        }
        else
        {
            return response('Löschung fehlgeschlagen');
        }
    }

    public function Sprache()
    {
        $AnzahlSprache = DB::table('ticket')
            ->select('sprache', DB::raw('count(*) as total'))
            ->groupBy('sprache')
            ->orderByDesc('total')
            ->get();

        return response()->json($AnzahlSprache);
    }
}