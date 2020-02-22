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

    public function store(Request $request)
    {
        $kave = new Kave();

        //dd($request);
        $this->kave->saveKave($request, $kave);
        $request->session()->flash('status', 'Az új kávé különlegességet sikeresen hozzáadtad!');
        return redirect('/admenu');
    }

    public function update(Request $request, $id)
    {
        $kave = Kave::findOrFail($id);

        $this->kave->saveKave($request, $kave);
        return redirect('/admenu');

    }
    public function destroy($id)
    {
        //
    }
}
