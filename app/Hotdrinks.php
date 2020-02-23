<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotdrinks extends Model
{
    protected $table = 'hotdrinks';
    protected $fillable = ['name', 'description', 'price', 'rank'];

    public function saveHotdrinks($request, $hotdrink)
    {
      $hotdrink->name = $request->input('name');
      $inputDesc = $request->input('description');
      if($inputDesc == null) {
          $inputDesc = " ";
      }
      $hotdrink->description = $inputDesc;
      $hotdrink->price = $request->input('price');
      $hotdrink->rank = $request->input('rank');
      $hotdrink->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
