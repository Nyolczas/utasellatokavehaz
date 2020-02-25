<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    protected $table = 'wine';
    protected $fillable = ['name', 'description', 'price', 'rank'];

    public function saveWine($request, $wine)
    {
      $wine->name = $request->input('name');
      $inputDesc = $request->input('description');
      if($inputDesc == null) {
          $inputDesc = " ";
      }
      $wine->description = $inputDesc;
      $wine->price = $request->input('price');
      $wine->rank = $request->input('rank');
      $wine->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
