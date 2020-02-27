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

      $inputVegan = false;
      if($request->input('is_vegan') == "true"){
          $inputVegan = true;
      }
      $inputGluten = false;
      if($request->input('contains_gluten') == "true"){
          $inputGluten = true;
      }
      $inputLactose = false;
      if($request->input('contains_lactose') == "true"){
          $inputLactose = true;
      }
      $inputEggs = false;
      if($request->input('contains_eggs') == "true"){
          $inputEggs = true;
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
