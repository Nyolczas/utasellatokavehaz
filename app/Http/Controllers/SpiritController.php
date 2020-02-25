<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Beer;
use App\Wine;
use App\Spirit;

class SpiritController extends Controller
{
    public function __construct(Spirit $spirit)
    {
        $this->spirit = $spirit;
    }

    public function index()
    {
        $beer = Beer::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $wine = Wine::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $spirit = Spirit::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        return view('pages.adalcohol', ['beer' => $beer, 'wine' => $wine, 'spirit' => $spirit]);
    }

    public function show(Request $request, $id)
    {
        $spirit = Spirit::findOrFail($id);
        $spirit->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adalcohol');
    }

    public function store(Request $request)
    {
        $spirit = new Spirit();

        //dd($request);
        $this->spirit->saveSpirit($request, $spirit);
        $request->session()->flash('status', 'Az új rövid italt sikeresen hozzáadtad!');
        return redirect('/adalcohol');
    }

    public function update(Request $request, $id)
    {
        $spirit = Spirit::findOrFail($id);

        $this->spirit->saveSpirit($request, $spirit);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/adalcohol');

    }

    public function destroy(Request $request, $id)
    {
        $spirit = Spirit::findOrFail($id);
        $spirit->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adalcohol');
    }
}
