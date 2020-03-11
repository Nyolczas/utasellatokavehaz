<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actual extends Model
{
    protected $table = 'actual';
    protected $fillable = ['is_active', 'title', 'text'];

    public function saveActual($request, $actual)
    {
      $inputActive = 0;
      if($request->input('is_active') == "true"){
          $inputActive = 1;
      }
      $actual->is_active = $request->$inputActive;
      $actual->title = $request->input('title');
      $actual->text = $request->input('text');
      $actual->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
