<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foodunified extends Model
{
    protected $table = 'foodunified';
    protected $fillable = ['name', 'description', 'price', 'rank', 'is_vegan', 'contains_gluten', 'contains_lactose', 'contains_eggs'];

    public function saveFoodunified($request, $foodunified)
    {
      $foodunified->name = $request->input('name');

      $inputDesc = $request->input('description');
      if($inputDesc == null) {
          $inputDesc = " ";
      }
      $foodunified->description = $inputDesc;
      $foodunified->price = $request->input('price');
      $foodunified->rank = $request->input('rank');

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

      $foodunified->is_vegan = $inputVegan;
      $foodunified->contains_gluten = $inputGluten;
      $foodunified->contains_lactose = $inputLactose;
      $foodunified->contains_eggs = $inputEggs;
      $foodunified->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
