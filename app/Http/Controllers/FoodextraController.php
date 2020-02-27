<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Foodextra;

class FoodextraController extends Controller
{
    public function __construct(Foodextra $foodextra)
    {
        $this->foodextra = $foodextra;
    }

    public function show(Request $request, $id)
    {
        $foodextra = Foodextra::findOrFail($id);
        $foodextra->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adfood');
    }

    public function store(Request $request)
    {
        $foodextra = new Foodextra();

        //dd($request);
        $this->foodextra->saveFoodextra($request, $foodextra);
        $request->session()->flash('status', 'Az új ételt sikeresen hozzáadtad!');
        return redirect('/adfood');
    }

    public function update(Request $request, $id)
    {
        $foodextra = Foodextra::findOrFail($id);

        $this->foodextra->saveFoodextra($request, $foodextra);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/adfood');

    }

    public function destroy(Request $request, $id)
    {
        $foodextra = Foodextra::findOrFail($id);
        $foodextra->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adfood');
    }
}
