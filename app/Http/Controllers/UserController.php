<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // $user = UserModel::all();
        // return view('user', ['data' => $user]);
        // Tambah data user dengan Eloquent Model
        // $data = [
        //     'username' => 'Customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 3
        // ];
        // UserModel::insert($data);

        // Coba akses model UserModel
        $user = UserModel::all();
        return view('user', ['data' => $user]);

        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::where('username', 'Customer-1')->update($data);
    }
}