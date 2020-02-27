<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foodunique;

class FooduniqueController extends Controller
{
    public function __construct(Foodunique $foodunique)
    {
        $this->foodunique = $foodunique;
    }

    public function show(Request $request, $id)
    {
        $foodunique = Foodunique::findOrFail($id);
        $foodunique->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adfood');
    }

    public function store(Request $request)
    {
        $foodunique = new Foodunique();

        //dd($request);
        $this->foodunique->saveFoodunique($request, $foodunique);
        $request->session()->flash('status', 'Az új ételt sikeresen hozzáadtad!');
        return redirect('/adfood');
    }

    public function update(Request $request, $id)
    {
        $foodunique = Foodunique::findOrFail($id);

        $this->foodunique->saveFoodunique($request, $foodunique);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/adfood');

    }

    public function destroy(Request $request, $id)
    {
        $foodunique = Foodunique::findOrFail($id);
        $foodunique->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adfood');
    }
}
