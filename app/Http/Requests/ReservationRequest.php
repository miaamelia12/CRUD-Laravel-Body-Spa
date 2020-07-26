<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Cek apakah CREATE atau UPDATE
        if ($this->method() == 'PATCH') {
            $id_reservation_rules    = 'required|string|size:4|unique:reservation,id_reservation,' . $this->get('id');
        } else {
            $id_reservation_rules    = 'required|string|size:4|unique:reservation,id_reservation';
            
        }

        return [
            'id_reservation'    => $id_reservation_rules,
            'nama_customer'     => 'required|string|max:50',
            'id_store'          => 'required',
            'id_treatment'      => 'required',
            'date_book'         => 'required|date',
            'alamat'            => 'required|string|max:50',
            'email'             => 'required|email|max:100',
            'foto'              => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:500|dimensions:width=150,height:180',
        ];
    }
}
