<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{
    protected $table = 'opening';
    protected $fillable = ['time'];

    public function saveOpening($request, $opening)
    {
      $opening->time = $request->input('time');
      $opening->save();
    }

    public function getAll()
    {
        return self::get();
    }
}
