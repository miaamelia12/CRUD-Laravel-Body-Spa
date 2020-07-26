<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use Validator;
use Session;

class StoreController extends Controller
{
    protected function index() {
        $halaman = 'store';
        $store_list = Store::all();
        return view('store.index', compact('halaman', 'store_list',));
    }

    protected function create() {
    	return view('store.create');
    }

    protected function store(Request $request) {
        $data =  $request->all();

        $validasi = Validator::make($data, [
            'nama_store'		=> 'required|max:50',
            
        ]);

        if ($validasi->fails()) {
            return redirect('store/create')
            ->withInput()
            ->withErrors($validasi);
        }

        Store::create($data);
        Session::flash('flash_message', 'Data Store Berhasil Disimpan');

        return redirect('store');
    }


    public function show($id) {
        return redirect('store');
    }

    protected function edit($id) {
        $store = Store::findOrFail($id);
        return view('store.edit', compact('store'));
    }

    public function update($id, Request $request) {
        $store = Store::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'nama_store'     => 'required|max:50',
            
        ]);

        if ($validasi->fails()) {
            return redirect("store/$id/edit")
                    ->withErrors($validasi)
                    ->withInput();
        }

        $store->update($data);
        Session::flash('flash_message', 'Data Store Berhasil Diupdate');

        return redirect('store');
    }

    protected function destroy($id) {
        $store = Store::findOrFail($id);
        $store->delete();
        Session::flash('flash_message', 'Data Store Berhasil Dihapus.');
        Session::flash('penting', true);
        return redirect('store');
    }    
}
