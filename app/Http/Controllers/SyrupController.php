<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mineral;
use App\Syrup;

class SyrupController extends Controller
{
    public function __construct(Syrup $syrup)
    {
        $this->syrup = $syrup;
    }

    public function index()
    {

        $syrup = Syrup::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $mineral = Mineral::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        return view('pages.admineralsyrup', ['syrup' => $syrup, 'mineral' => $mineral]);
    }

    public function show(Request $request, $id)
    {
        $syrup = Syrup::findOrFail($id);
        $syrup->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/admineralsyrup');
    }

    public function store(Request $request)
    {
        $syrup = new Syrup();

        //dd($request);
        $this->syrup->saveSyrup($request, $syrup);
        $request->session()->flash('status', 'Az új szörpöt sikeresen hozzáadtad!');
        return redirect('/admineralsyrup');
    }

    public function update(Request $request, $id)
    {
        $syrup = Syrup::findOrFail($id);

        $this->syrup->saveSyrup($request, $syrup);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/admineralsyrup');

    }

    public function destroy(Request $request, $id)
    {
        $syrup = Syrup::findOrFail($id);
        $syrup->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/admineralsyrup');
    }
}
