<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';

    protected $fillable = [
    	'id_reservation',
    	'nama_customer',
    	'id_store',
    	'id_treatment',
    	'date_book',
    	'alamat',
    	'email',
    	'foto'

    ];

	protected $dates = ['date_book'];

    //Accessor
    public function getNamaCustomerAttribute($nama_customer){
 	    return ucwords($nama_customer);
 	}


    //Mutator
 	public function setNamaCustomerAttribute($nama_customer){
 	    $this->attributes['nama_customer'] = strtolower($nama_customer);
 	}

	public function store() {
        return $this->belongsTo('App\Store', 'id_store');
    }

 	public function treatment() {
    	return $this->belongsTo('App\Treatment', 'id_treatment');
    }

}
