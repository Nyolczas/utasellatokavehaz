<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Foodunified;
use App\Foodunique;

class FoodunifiedController extends Controller
{
    public function __construct(Foodunified $foodunified)
    {
        $this->foodunified = $foodunified;
    }

    public function index()
    {
        $foodunified = Foodunified::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $foodunique = Foodunique::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        return view('pages.admin.adfood', ['foodunified' => $foodunified, 'foodunique' => $foodunique]);
    }

    public function show(Request $request, $id)
    {
        $foodunified = Foodunified::findOrFail($id);
        $foodunified->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adfood');
    }

    public function store(Request $request)
    {
        $foodunified = new Foodunified();

        //dd($request);
        $this->foodunified->saveFoodunified($request, $foodunified);
        $request->session()->flash('status', 'Az új ételt sikeresen hozzáadtad!');
        return redirect('/adfood');
    }

    public function update(Request $request, $id)
    {
        $foodunified = Foodunified::findOrFail($id);

        $this->foodunified->saveFoodunified($request, $foodunified);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/adfood');

    }

    public function destroy(Request $request, $id)
    {
        $foodunified = Foodunified::findOrFail($id);
        $foodunified->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adfood');
    }
}
