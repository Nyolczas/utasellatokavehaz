<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $table = 'beer';
    protected $fillable = ['name', 'description', 'price', 'rank'];

    public function saveBeer($request, $beer)
    {
      $beer->name = $request->input('name');
      $inputDesc = $request->input('description');
      if($inputDesc == null) {
          $inputDesc = " ";
      }
      $beer->description = $inputDesc;
      $beer->price = $request->input('price');
      $beer->rank = $request->input('rank');
      $beer->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
