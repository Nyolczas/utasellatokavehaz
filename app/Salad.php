<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salad extends Model
{
    protected $table = 'salad';
    protected $fillable = ['name', 'price'];

    public function saveSalad($request, $salad)
    {
      $salad->name = $request->input('name');
      $salad->price = $request->input('price');
      $salad->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
