<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kave;
use App\Hotdrinks;
use App\Softdrink;
use App\Fruit;

class WelcomeController extends Controller
{
    public function index()
    {
        $hotdrinks = Hotdrinks::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $kave = Kave::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $softdrink = Softdrink::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $fruit = Fruit::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        return view(
            'welcome', [
                'kave' => $kave,
                'hotdrinks' => $hotdrinks,
                'softdrink' => $softdrink,
                'fruit' => $fruit
                ]);
    }
}
