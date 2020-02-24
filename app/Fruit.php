<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    protected $table = 'fruit';
    protected $fillable = ['name', 'description', 'price', 'rank'];

    public function saveFruit($request, $fruit)
    {
      $fruit->name = $request->input('name');
      $inputDesc = $request->input('description');
      if($inputDesc == null) {
          $inputDesc = " ";
      }
      $fruit->description = $inputDesc;
      $fruit->price = $request->input('price');
      $fruit->rank = $request->input('rank');
      $fruit->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
