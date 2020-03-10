<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opening;

class OpeningController extends Controller
{
    public function __construct(Opening $opening)
    {
        $this->opening = $opening;
    }

    public function index()
    {
        $opening = Opening::all();

        return view('pages.admin.opening', ['opening' => $opening]);
    }

    public function update(Request $request, $id)
    {
        $opening = Opening::findOrFail($id);

        $this->opening->saveOpening($request, $opening);
        $request->session()->flash('status', 'Sikeres módosítás!');
        return redirect('/opening');
    }
}
