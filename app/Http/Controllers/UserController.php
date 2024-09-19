<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index()
    // {
    //     // $user = UserModel::all();
    //     // return view('user', ['data' => $user]);
    //     // Tambah data user dengan Eloquent Model
    //     // $data = [
    //     //     'username' => 'Customer-1',
    //     //     'nama' => 'Pelanggan',
    //     //     'password' => Hash::make('12345'),
    //     //     'level_id' => 3
    //     // ];
    //     // UserModel::insert($data);

    //     // Coba akses model UserModel
    //     // $user = UserModel::all();
    //     // return view('user', ['data' => $user]);

    //     // $data = [
    //     //     'nama' => 'Pelanggan Pertama',
    //     // ];
    //     // UserModel::where('username', 'Customer-1')->update($data);

    //     //Jobsheet 4 Praktikum 1
    //     // $data = [
    //     //     'level_id' => 2,
    //     //     'username' => 'manager_tiga',
    //     //     'nama' => 'Manager 3',
    //     //     'password' => Hash::make('12345')
    //     // ];
    //     // UserModel::create($data);
        
    //     // $user = UserModel::all();
    //     // return view('user', ['data' => $user]);

    //     //jobsheet 4-Prartikum 2.1
    //     //$user = UserModel::find(1);
    //     // $user = UserModel::where('level_id', 1)->first();
    //     // $user = UserModel::firstWhere('level_id', 1);
    //     //     $user = UserModel::findOr(20, ['username', 'nama'], function(){
    //     //         abort(404);
    //     //     });
    //     // return view('user',['data' => $user]);

    //     //Jobsheet 4 - Praktikum 2.2
    //     // $user = UserModel::findOrFail(1);
    //     // $user = UserModel::where('username', 'manager9')->firstOrFail();
    //     // return view('user',['data' => $user]);

    //     //Jobsheet 4 - Praktikum 2.3 
    //     // $user = UserModel::where('level_id', 2)->count();
    //     // dd($user);
    //     // $user = UserModel::where('level_id', 2)->count(); 
    //     // return view('user',['data' => $user]);

    //     //Jobsheet 4 - Praktikum 2.4 
    //     // $user = UserModel::firstOrNew(
    //     //     [
    //     //         'username' => 'manager33',
    //     //         'nama' => 'Manager Tiga Tiga',
    //     //         'password' => Hash::make('12345'),
    //     //         'level_id' => 2
    //     //     ],
    //     // );
    //     // $user -> save();

    //     // return view('user',['data' => $user]);

    // }

    //Jobsheet 4 - Praktikum 2.5
    // public function index() {
    //         $user = UserModel::create([
    //             'username' => 'manager55',
    //             'nama' => 'Manager55',
    //             'password' => Hash::make(12345),
    //             'level_id' => 2,
    //     ]);
        
    //     $user->username = 'manager56';
        
    //     $user->isDirty(); // true
    //     $user->isDirty('username'); // true
    //     $user->isDirty('nama'); // false
    //     $user->isDirty(['nama', 'username']); // true
        
    //     $user->isClean(); // false
    //     $user->isClean('username'); // false
    //     $user->isClean('nama'); // true
    //     $user->isClean(['nama', 'username']); // false
        
    //     $user->save();
        
    //     $user->isDirty(); // false
    //     $user->isClean(); // true
    //     dd($user->isDirty());
    // }

        //Modifikasi 
        // $user = UserModel::create([
        //     'username' => 'manager11',
        //     'nama' => 'Manager11',
        //     'password' => Hash::make(12345),
        //     'level_id' => 2,
        // ]);
        
        // $user->username = 'manager12';
        
        // $user->save();
        
        // $user->wasChanged(); // true
        // $user->wasChanged('username'); // true
        // $user->wasChanged(['username', 'level_id']); // true
        // $user->wasChanged('nama'); // false
        // dd($user->wasChanged(['nama', 'username'])); //true


    //Praktikum 2.6
    public function index() {
            
        $user = UserModel::all();
            return view('user', ['data' => $user]);
        }

        public function tambah() {
            return view('user_tambah');
        }

        public function tambah_simpan(Request $request){
            UserModel::create([
                'username' => $request->username,
                'nama' => $request->nama,
                'password' => Hash::make($request->password),
                'level_id' => $request->level_id
            ]);
        
            return redirect('/user');
        }

        public function ubah($id){
            $user = UserModel::where('user_id', $id)->first(); // Gunakan user_id
            return view('user_ubah', ['data' => $user]);
        }

        public function ubah_simpan($id, Request $request){
            // Cari user berdasarkan user_id
            $user = UserModel::find($id); // Laravel sekarang menggunakan user_id sebagai primary key
        
            // Update field yang diubah
            $user->username = $request->username;
            $user->nama = $request->nama;
        
            // Hashing password baru hanya jika diubah
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
        
            $user->level_id = $request->level_id;
        
            // Simpan perubahan
            $user->save();
        
            return redirect('/user');
        }

        public function hapus($id){
            $user = UserModel::find($id);
            $user->delete();

            return redirect('/user');
        }
}
