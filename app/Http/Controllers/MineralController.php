<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mineral;
use App\Syrup;

class MineralController extends Controller
{
    public function __construct(Mineral $mineral)
    {
        $this->mineral = $mineral;
    }

    public function index()
    {
        $syrup = Syrup::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $mineral = Mineral::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        return view('pages.admin.admineralsyrup', ['syrup' => $syrup, 'mineral' => $mineral]);
    }

    public function show(Request $request, $id)
    {
        $mineral = Mineral::findOrFail($id);
        $mineral->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/admineralsyrup');
    }

    public function store(Request $request)
    {
        $mineral = new Mineral();

        //dd($request);
        $this->mineral->saveMineral($request, $mineral);
        $request->session()->flash('status', 'Az új ásványvizet sikeresen hozzáadtad!');
        return redirect('/admineralsyrup');
    }

    public function update(Request $request, $id)
    {
        $mineral = Mineral::findOrFail($id);

        $this->mineral->saveMineral($request, $mineral);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/admineralsyrup');

    }

    public function destroy(Request $request, $id)
    {
        $mineral = Mineral::findOrFail($id);
        $mineral->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/admineralsyrup');
    }
}
