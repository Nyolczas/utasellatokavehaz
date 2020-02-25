<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syrup extends Model
{
    protected $table = 'syrup';
    protected $fillable = ['name', 'description', 'price', 'rank'];

    public function saveSyrup($request, $syrup)
    {
      $syrup->name = $request->input('name');
      $inputDesc = $request->input('description');
      if($inputDesc == null) {
          $inputDesc = " ";
      }
      $syrup->description = $inputDesc;
      $syrup->price = $request->input('price');
      $syrup->rank = $request->input('rank');
      $syrup->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
