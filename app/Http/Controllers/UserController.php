<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Session;

class UserController extends Controller
{
    //Index
    protected function index() {
        $halaman = 'user';
        $user_list = User::all();
        return view('user.index', compact('halaman', 'user_list',));
    }

    //Create
    protected function create() {
    	return view('user.create');
    }

    //Create
    protected function store(Request $request) {
        $data =  $request->all();

        //Validator
        $validasi = Validator::make($data, [
            'name'		=> 'required|max:255',
            'email'     => 'required|email|max:100|unique:users',
            'password'  => 'required|confirmed|min:8',
            'level'     => 'required|in:admin,operator',
        ]);

        if ($validasi->fails()) {
            return redirect('user/create')
            ->withInput()
            ->withErrors($validasi);
        }

        //Hash Password
        $data['password'] = bcrypt($data['password']);

        //Create data user
        User::create($data);
        Session::flash('flash_message', 'Data user berhasil disimpan');

        return redirect('user');
    }


    public function show($id) {
        return redirect('user');
    }

    //Edit user
    protected function edit($id) {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    //Update user
    public function update($id, Request $request) {
        $user = User::findOrFail($id);
        $data = $request->all();

        $validasi = Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:100|unique:users,email,' . $data['id'],
            'password' => 'sometimes|nullable|confirmed|min:8',
            'level'    => 'required|in:admin,operator'
        ]);

        if ($validasi->fails()) {
            return redirect("user/$id/edit")
                    ->withErrors($validasi)
                    ->withInput();
        }

        if ($request->filled('password')) {
            // Hash password.
            $data['password'] = bcrypt($data['password']);
        }
        else {
            // Hapus password (password tidak diupdate).
            $data = array_except($data, ['password']);
        }

        $user->update($data);
        Session::flash('flash_message', 'Data user berhasil diupdate.');

        return redirect('user');
    }

    //Hapus user
    protected function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('flash_message', 'Data user berhasil dihapus.');
        Session::flash('penting', true);
        return redirect('user');
    }
}