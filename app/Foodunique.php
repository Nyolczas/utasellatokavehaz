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

      $inputVegan = 0;
      if($request->input('is_vegan') == "true"){
          $inputVegan = 1;
      }
      $inputGluten = 0;
      if($request->input('contains_gluten') == "true"){
          $inputGluten = 1;
      }
      $inputLactose = 0;
      if($request->input('contains_lactose') == "true"){
          $inputLactose = 1;
      }
      $inputEggs = 0;
      if($request->input('contains_eggs') == "true"){
          $inputEggs = 1;
      }

      $foodunique->is_vegan = $inputVegan;
      $foodunique->contains_gluten = $inputGluten;
      $foodunique->contains_lactose = $inputLactose;
      $foodunique->contains_eggs = $inputEggs;
      $foodunique->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
