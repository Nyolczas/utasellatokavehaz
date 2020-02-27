<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foodunique extends Model
{
    protected $table = 'foodunique';
    protected $fillable = ['name', 'description', 'price', 'rank', 'is_vegan', 'contains_gluten', 'contains_lactose', 'contains_eggs'];

    public function saveFoodunique($request, $foodunique)
    {
      $foodunique->name = $request->input('name');
      $inputDesc = $request->input('description');
      if($inputDesc == null) {
          $inputDesc = " ";
      }
      $foodunique->description = $inputDesc;
      $foodunique->price = $request->input('price');
      $foodunique->rank = $request->input('rank');
      $foodunique->is_vegan = $request->input('is_vegan');
      $foodunique->contains_gluten = $request->input('contains_gluten');
      $foodunique->contains_lactose = $request->input('contains_lactose');
      $foodunique->contains_eggs = $request->input('contains_eggs');
      $foodunique->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
