<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mineral extends Model
{
    protected $table = 'mineral';
    protected $fillable = ['name', 'description', 'price', 'rank'];

    public function saveMineral($request, $mineral)
    {
      $mineral->name = $request->input('name');
      $inputDesc = $request->input('description');
      if($inputDesc == null) {
          $inputDesc = " ";
      }
      $mineral->description = $inputDesc;
      $mineral->price = $request->input('price');
      $mineral->rank = $request->input('rank');
      $mineral->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
