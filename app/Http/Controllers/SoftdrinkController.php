<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Softdrink;

class SoftdrinkController extends Controller
{
    public function __construct(Softdrink $softdrink)
    {
        $this->softdrink = $softdrink;
    }

    public function index()
    {

        $softdrink = Softdrink::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        return view('pages.admin.adsoftdrink', ['softdrink' => $softdrink]);
    }

    public function show(Request $request, $id)
    {
        $softdrink = Softdrink::findOrFail($id);
        $softdrink->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adsoftdrink');
    }

    public function store(Request $request)
    {
        $softdrink = new Softdrink();

        //dd($request);
        $this->softdrink->saveSoftdrink($request, $softdrink);
        $request->session()->flash('status', 'Az új üdítőitalt sikeresen hozzáadtad!');
        return redirect('/adsoftdrink');
    }

    public function update(Request $request, $id)
    {
        $softdrink = Softdrink::findOrFail($id);

        $this->softdrink->saveSoftdrink($request, $softdrink);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/adsoftdrink');

    }

    public function destroy(Request $request, $id)
    {
        $softdrink = Softdrink::findOrFail($id);
        $softdrink->delete();
        $request->session()->flash('status', 'Sikeres törlés!');
        return redirect('/adsoftdrink');
    }
}
