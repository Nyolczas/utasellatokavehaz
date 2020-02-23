<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kave extends Model
{
    protected $table = 'kave';
    protected $fillable = ['name', 'description', 'price', 'rank'];

    public function saveKave($request, $kave)
    {
      $kave->name = $request->input('name');
      $inputDesc = $request->input('description');
      if($inputDesc == null) {
          $inputDesc = " ";
      }
      $kave->description = $inputDesc;
      $kave->price = $request->input('price');
      $kave->rank = $request->input('rank');
      $kave->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
