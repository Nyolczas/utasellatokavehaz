<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kave;

class WelcomeController extends Controller
{
    public function index()
    {
        $kave = Kave::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        return view('welcome', ['kave' => $kave]);
    }
}
