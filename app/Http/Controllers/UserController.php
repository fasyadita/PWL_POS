<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        //tambah user dengan Eloquent Model
        $data = [
            'level_id' => 2,
            'username' => 'manager_tiga',
            'nama' => 'Manager 3',
            'password' => Hash::make('12345')
        ];
        UserModel::create($data); // menambahkan data ke tabel m_user
        
        // $data =[
        //     'nama' => 'Pelanggan Pertama'
        // ];
        // UserModel::where('username', 'customer1')->update($data);
        
        // coba akses model UserModel
        $user = UserModel::all(); //ambil semua data dari tabel m_user
        return view('user',['data' => $user]);
    }
}
