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
        return view('admenu', ['kave' => Kave::all()]);
    }

    public function store(Request $request)
    {
        $kave = new Kave();

        //dd($request);

       if($this->kave->saveKave($request, $kave)){
        return redirect('kave.index');
      }
    }
}
