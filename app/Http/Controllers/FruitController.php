<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fruit;

class FruitController extends Controller
{
    public function __construct(Fruit $fruit)
    {
        $this->fruit = $fruit;
    }

    public function index()
    {

        $fruit = Fruit::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        return view('pages.adfruit', ['fruit' => $fruit]);
    }

    public function show(Request $request, $id)
    {
        $fruit = Fruit::findOrFail($id);
        $fruit->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adfruit');
    }

    public function store(Request $request)
    {
        $fruit = new Fruit();

        //dd($request);
        $this->fruit->saveFruit($request, $fruit);
        $request->session()->flash('status', 'Az új gyümölcslevet sikeresen hozzáadtad!');
        return redirect('/adfruit');
    }

    public function update(Request $request, $id)
    {
        $fruit = Fruit::findOrFail($id);

        $this->fruit->saveFruit($request, $fruit);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/adfruit');

    }

    public function destroy(Request $request, $id)
    {
        $fruit = Fruit::findOrFail($id);
        $fruit->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adfruit');
    }
}
