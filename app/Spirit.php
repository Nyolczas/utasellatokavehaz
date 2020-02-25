<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spirit extends Model
{
    protected $table = 'spirit';
    protected $fillable = ['name', 'description', 'price', 'rank'];

    public function saveSpirit($request, $spirit)
    {
      $spirit->name = $request->input('name');
      $inputDesc = $request->input('description');
      if($inputDesc == null) {
          $inputDesc = " ";
      }
      $spirit->description = $inputDesc;
      $spirit->price = $request->input('price');
      $spirit->rank = $request->input('rank');
      $spirit->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
