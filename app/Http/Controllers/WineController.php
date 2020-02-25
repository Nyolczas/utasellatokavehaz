<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Beer;
use App\Wine;
use App\Spirit;

class WineController extends Controller
{
    public function __construct(Wine $wine)
    {
        $this->wine = $wine;
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
        $wine = Wine::findOrFail($id);
        $wine->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adalcohol');
    }

    public function store(Request $request)
    {
        $wine = new Wine();

        //dd($request);
        $this->wine->saveWine($request, $wine);
        $request->session()->flash('status', 'Az új bort sikeresen hozzáadtad!');
        return redirect('/adalcohol');
    }

    public function update(Request $request, $id)
    {
        $wine = Wine::findOrFail($id);

        $this->wine->saveWine($request, $wine);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/adalcohol');

    }

    public function destroy(Request $request, $id)
    {
        $wine = Wine::findOrFail($id);
        $wine->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adalcohol');
    }
}
