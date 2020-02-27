<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Salad;

class SaladController extends Controller
{
    public function __construct(Salad $salad)
    {
        $this->salad = $salad;
    }

    public function show(Request $request, $id)
    {
        $salad = Salad::findOrFail($id);
        $salad->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adfood');
    }

    public function store(Request $request)
    {
        $salad = new Salad();

        //dd($request);
        $this->salad->saveSalad($request, $salad);
        $request->session()->flash('status', 'Az új ételt sikeresen hozzáadtad!');
        return redirect('/adfood');
    }

    public function update(Request $request, $id)
    {
        $salad = Salad::findOrFail($id);

        $this->salad->saveSalad($request, $salad);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/adfood');

    }

    public function destroy(Request $request, $id)
    {
        $salad = Salad::findOrFail($id);
        $salad->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adfood');
    }
}
