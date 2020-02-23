<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kave;

class KaveController extends Controller
{
    public function __construct(Kave $kave)
    {
        $this->kave = $kave;
    }

    public function index()
    {

        $kave = Kave::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        return view('admin.kave.adkave', ['kave' => $kave]);
    }

    public function show(Request $request, $id)
    {
        $kave = Kave::findOrFail($id);
        $kave->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adkave');
    }

    public function store(Request $request)
    {
        $kave = new Kave();

        //dd($request);
        $this->kave->saveKave($request, $kave);
        $request->session()->flash('status', 'Az új kávé különlegességet sikeresen hozzáadtad!');
        return redirect('/adkave');
    }

    public function update(Request $request, $id)
    {
        $kave = Kave::findOrFail($id);

        $this->kave->saveKave($request, $kave);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/adkave');

    }

    public function destroy(Request $request, $id)
    {
        $kave = Kave::findOrFail($id);
        $kave->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adkave');
    }
}
