<?php

namespace App\Models;

use Illuminate\Foundation\Auth\Admin as Authenticatable;


class Admin extends Authenticatable
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'phone',
    'password',
  ];

}