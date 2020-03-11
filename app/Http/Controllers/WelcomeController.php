<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kave;
use App\Hotdrinks;
use App\Softdrink;
use App\Fruit;
use App\Mineral;
use App\Syrup;
use App\Beer;
use App\Wine;
use App\Spirit;
use App\Foodunified;
use App\Foodunique;
use App\Foodextra;
use App\Salad;
use App\Opening;
use App\Actual;

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

        $mineral = Mineral::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $syrup = Syrup::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $beer = Beer::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $wine = Wine::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $spirit = Spirit::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $foodunified = Foodunified::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $foodunique = Foodunique::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $foodextra = Foodextra::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $salad = Salad::all()->sort(function ($a,$b) {
            return $a->rank <=> $b->rank;
        });

        $actual = Actual::all();

        $opening = Opening::all();

        return view(
            'welcome', [
                'kave' => $kave,
                'hotdrinks' => $hotdrinks,
                'softdrink' => $softdrink,
                'fruit' => $fruit,
                'mineral' => $mineral,
                'syrup' => $syrup,
                'beer' => $beer,
                'wine' => $wine,
                'spirit' => $spirit,
                'foodunified' => $foodunified,
                'foodunique' => $foodunique,
                'foodextra' => $foodextra,
                'salad' => $salad,
                'actual' => $actual,
                'opening' => $opening,
                ]);
    }
}
