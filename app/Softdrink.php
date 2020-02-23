<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Softdrink extends Model
{
    protected $table = 'softdrink';
    protected $fillable = ['name', 'description', 'price', 'rank'];

    public function saveSoftdrink($request, $softdrink)
    {
      $softdrink->name = $request->input('name');
      $inputDesc = $request->input('description');
      if($inputDesc == null) {
          $inputDesc = " ";
      }
      $softdrink->description = $inputDesc;
      $softdrink->price = $request->input('price');
      $softdrink->rank = $request->input('rank');
      $softdrink->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
