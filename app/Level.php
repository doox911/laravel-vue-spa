<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'name',
    'level_type',
  ];

  protected $hidden = [
    'deleted_at',
  ];

  protected $dates = [
    'deleted_at'
  ];

}
