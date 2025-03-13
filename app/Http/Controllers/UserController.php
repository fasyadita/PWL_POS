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
        //     'level_id' => 5,
        //     'username' => 'customer1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::insert($data); // menambahkan data ke tabel m_user
        
        $data =[
            'nama' => 'Pelanggan Pertama'
        ];
        UserModel::where('username', 'customer1')->update($data);
        // coba akses model UserModel
        $user = UserModel::all(); //ambil semua data dari tabel m_user
        return view('user',['data' => $user]);
    }
}
