<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        //tambah user dengan Eloquent Model
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        //UserModel::create($data); // menambahkan data ke tabel m_user
        
        // $data =[
        //     'nama' => 'Pelanggan Pertama'
        // ];
        // UserModel::where('username', 'customer1')->update($data);
        
        // coba akses model UserModel
        // $user = UserModel::all(); //ambil semua data dari tabel m_user
        // return view('user',['data' => $user]);

        // $user = UserModel::find(1); //melakukan pencarian sdata dari tabel m_user
        // return view('user',['data' => $user]);

        // $user = UserModel::where('level_id',1)->first(); //melakukan pencarian data dari tabel m_user
        // return view('user',['data' => $user]);

        // $user = UserModel::firstwhere('level_id',1); //melakukan pencarian data dari tabel m_user
        // return view('user',['data' => $user]);

        // $user = UserModel::findOr(1, ['username', 'nama'], function(){
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);

        $user = UserModel::findOr(20, ['username', 'nama'], function(){
            abort(404);
        });
        return view('user', ['data' => $user]);
    }
}
