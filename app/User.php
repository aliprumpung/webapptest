<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	public $table = "user";
	protected $primaryKey = 'uuid';
	public $incrementing = false;
	protected $fillable = ['uuid', 'nama', 'alamat',];
    
}
