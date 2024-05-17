<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasion;

class ReservasionController extends Controller
{
    //
    public function insertReservasion(Request $request)
    {
        $reservasion = new Reservasion();
        $reservasion->name = $request->input('name');
        $reservasion->email = $request->input('email');
        $reservasion->date = $request->input('date');
        $reservasion->time = $request->input('time');
        $reservasion->person = $request->input('person');
        $reservasion->save();
        return redirect('/reservation');
    } 

    public function getReservationTransactions()
    {
        $reservasion = Reservasion::all();
        return view('admin.reservasion', ['reservasions' => $reservasion]);
    }
}
