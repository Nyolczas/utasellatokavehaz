<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Beer;
use App\Wine;
use App\Spirit;

class BeerController extends Controller
{
    public function __construct(Beer $beer)
    {
        $this->beer = $beer;
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
        $beer = Beer::findOrFail($id);
        $beer->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adalcohol');
    }

    public function store(Request $request)
    {
        $beer = new Beer();

        //dd($request);
        $this->beer->saveBeer($request, $beer);
        $request->session()->flash('status', 'Az új sört sikeresen hozzáadtad!');
        return redirect('/adalcohol');
    }

    public function update(Request $request, $id)
    {
        $beer = Beer::findOrFail($id);

        $this->beer->saveBeer($request, $beer);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/adalcohol');

    }

    public function destroy(Request $request, $id)
    {
        $beer = Beer::findOrFail($id);
        $beer->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adalcohol');
    }
}
