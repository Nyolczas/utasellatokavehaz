<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actual;

class ActualController extends Controller
{
    public function __construct(Actual $actual)
    {
        $this->actual = $actual;
    }

    public function index()
    {
        $actual = Actual::all();
        return view('pages.admin.actual', ['actual' => $actual]);
    }

    public function update(Request $request, $id)
    {
        $actual = Actual::findOrFail($id);
        $this->actual->saveActual($request, $actual);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/actual');
    }
}
