<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hotdrinks;

class HotdrinkController extends Controller
{
    public function __construct(Hotdrinks $hotdrinks)
    {
        $this->hotdrinks = $hotdrinks;
    }

    public function index()
    {

        $hotdrinks = Hotdrinks::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        return view('pages.admin.adhotdrinks', ['hotdrinks' => $hotdrinks]);
    }

    public function show(Request $request, $id)
    {
        $hotdrinks = Hotdrinks::findOrFail($id);
        $hotdrinks->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adhotdrinks');
    }

    public function store(Request $request)
    {
        $hotdrinks = new Hotdrinks();

        //dd($request);
        $this->hotdrinks->saveHotdrinks($request, $hotdrinks);
        $request->session()->flash('status', 'Az új meleg italt sikeresen hozzáadtad!');
        return redirect('/adhotdrinks');
    }

    public function update(Request $request, $id)
    {
        $hotdrinks = Hotdrinks::findOrFail($id);

        $this->hotdrinks->saveHotdrinks($request, $hotdrinks);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/adhotdrinks');

    }

    public function destroy(Request $request, $id)
    {
        $hotdrinks = Hotdrinks::findOrFail($id);
        $hotdrinks->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adhotdrinks');
    }
}
