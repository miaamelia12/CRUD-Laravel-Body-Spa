<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use Validator;
use App\Store;
use App\Treatment;
use Storage;
use Session;



class ReservationController extends Controller
{

    public function index() {
        $halaman = 'reservation';
        $reservation_list = Reservation::orderBy('id_reservation','asc')->Paginate('5');      
        $jumlah_reservation = Reservation::count();
        return view('reservation.index', compact('halaman', 'reservation_list', 'jumlah_reservation'));
    }


    public function show($id) {
        $reservation = Reservation::findOrFail($id);
        return view('reservation.show', compact('reservation'));
    }


    public function create() {
        $list_store = Store::pluck('nama_store', 'id');
        $list_treatment = Treatment::pluck('nama_treatment', 'id');
        return view('reservation.create', compact('list_store', 'list_treatment'));
    }

    public function store(Request $request) {
        $input =  $request->all();

        $validator = Validator::make($input, [
            'id_reservation'    => 'required|string|size:4|unique:reservation,id_reservation',
            'nama_customer'     => 'required|string|max:50',
            'id_store'          => 'required',
            'id_treatment'      => 'required',
            'date_book'         => 'required|date',
            'alamat'            => 'required|string|max:50',
            'email'             => 'required|email|max:100',
            'foto'              => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:500|dimensions:width=150,height:180',
        ]);

        if ($validator->fails()) {
            return redirect('reservation/create')
            ->withInput()
            ->withErrors($validator);
        }

        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request);
        }

        $reservation = Reservation::create($input);

        return redirect('reservation');
    }


    public function edit($id) {
        $reservation = Reservation::findOrFail($id);
        $list_store = Store::pluck('nama_store', 'id');
        $list_treatment = Treatment::pluck('nama_treatment', 'id');
        return view('reservation.edit', compact('reservation', 'list_store', 'list_treatment'));
    }


    public function update($id, Request $request) {
        $reservation = Reservation::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_reservation'    => 'required|string|size:4|unique:reservation,id_reservation,'.$request->input('id'),
            'nama_customer'     => 'required|string|max:50',
            'id_store'          => 'required',
            'id_treatment'      => 'required',
            'date_book'         => 'required|date',
            'alamat'            => 'required|string|max:50',
            'email'             => 'required|email|max:100',
            'foto'              => 'sometimes|nullable|image|mimes:jpeg,jpg,png|max:500|dimensions:width=150,height:180',
        ]);

        if ($validator->fails()) {
                return redirect('reservation/' .$id. '/edit')
                ->withInput()
                ->withErrors($validator);
            }

        if ($request->hasFile('foto')) {
            $input['foto'] = $this->updateFoto($id, $request);
        }


        $reservation->update($input);

        return redirect('reservation');
    }


    public function destroy($id) {
        $reservation = Reservation::findOrFail($id);

        $this->hapusFoto($id);
        $reservation->delete();
        return redirect('reservation');
    }

    private function uploadFoto(Request $request) {
        $foto = $request->file('foto');
        $ext  = $foto->getClientOriginalExtension();

        if ($request->file('foto')->isValid()) {
            $foto_name = date('YmdHis'). ".$ext";
            $foto->move('fotoupload', $foto_name);
            return $foto_name;
        }
        return false;
    }


    private function updateFoto($id, Request $request) {
        $reservation = Reservation::findOrFail($id);

        if ($request->hasFile('foto')) {

            $exist = Storage::disk('foto')->exists($reservation->foto);
            if (isset($reservation->foto) && $exist) {
                $delete = Storage::disk('foto')->delete($reservation->foto);
            }

            $foto = $request->file('foto');
            $ext  = $foto->getClientOriginalExtension();
            if ($request->file('foto')->isValid()) {
                $foto_name = date('YmdHis'). ".$ext";
                $foto->move('fotoupload', $foto_name);
                return $foto_name;
            }
        }
    }

    private function hapusFoto($id) {
        $reservation = Reservation::findOrFail($id);
        $is_foto_exist = Storage::disk('foto')->exists($reservation->foto);

        if ($is_foto_exist) {
            Storage::disk('foto')->delete($reservation->foto);
        }
    }
}
