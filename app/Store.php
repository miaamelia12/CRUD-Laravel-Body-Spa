<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';

    protected $fillable = ['nama_store'];

    public function reservation() {
    	return $this->hasMany('App\Reservation', 'id_store');
    }

}
