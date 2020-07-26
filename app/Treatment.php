<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = 'treatment';

    protected $fillable = ['nama_treatment'];

    public function reservation() {
    	return $this->hasMany('App\Reservation', 'id_treatment');
    }
}
