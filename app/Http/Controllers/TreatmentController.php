<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;
use Validator;
use Session;

class TreatmentController extends Controller
{
    protected function index() {
    	$treatment_list = Treatment::all();
    	return view('treatment.index', compact('treatment_list'));
    }

    protected function create() {
    	return view('treatment.create');
    }

    public function store(Request $request) {
    	$data = $request->all();

    	$validasi = Validator::make($data, [
    		'nama_treatment' => 'required|max:50',
    	]);

    	if ($validasi->fails()) {
    		return redirect('treatment/create')
    		->withInput()
    		->withErrors($validasi);
    	}

    	Treatment::create($data);
    	Session::flash('flash_message', 'Data Treatment Berhasil Disimpan');

    	return redirect('treatment');
    }

    public function show($id) {
    	return redirect('treatment');
    }

    protected function edit($id) {
    	$treatment = Treatment::findOrfail($id);
    	return view('treatment.edit', compact('treatment'));
    }

    public function update($id, Request $request) {
    	$treatment = Treatment::findOrfail($id);
    	$data = $request->all();

    	$validasi = Validator::make($data, [
    		'nama_treatment' => 'required|max:50',
    	]);

    	if ($validasi->fails()) {
    		return redirect('treatment/create')
    		->withInput()
    		->withErrors($validasi);
    	}

    	$treatment->update($data);
    	Session::flash('flash_message', 'Data Treatment Berhasil Diupdate');

    	return redirect('treatment');
    }

    protected function destroy($id) {
    	$treatment = Treatment::findOrfail($id);
    	$treatment->delete();

    	Session::flash('flash_message', 'Data Treatment Berhasil Dihapus');
    	Session::flash('penting', true);

    	return redirect('treatment');

    }
}
