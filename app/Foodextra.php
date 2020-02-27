<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foodextra extends Model
{
    protected $table = 'foodextra';
    protected $fillable = ['name', 'price'];

    public function saveFoodextra($request, $foodextra)
    {
      $foodextra->name = $request->input('name');
      $foodextra->price = $request->input('price');
      $foodextra->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
