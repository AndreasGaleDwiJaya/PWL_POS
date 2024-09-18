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
        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'Customer-1')->update($data);

        //Jobsheet 4 Praktikum 1
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data);
        
        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        //jobsheet 4-Prartikum 2.1
        //$user = UserModel::find(1);
        // $user = UserModel::where('level_id', 1)->first();
        // $user = UserModel::firstWhere('level_id', 1);
        //     $user = UserModel::findOr(20, ['username', 'nama'], function(){
        //         abort(404);
        //     });
        // return view('user',['data' => $user]);

        //Jobsheet 4 - mPraktikum 2.2
        // $user = UserModel::findOrFail(1);
        $user = UserModel::where('username', 'manager9')->firstOrFail();
        return view('user',['data' => $user]);
    }
}
