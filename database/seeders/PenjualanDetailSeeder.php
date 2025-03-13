<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_penjualan_detail')->insert([
            //penjualan id 1
            ['penjualan_id' => 1, 'barang_id' => 1, 'harga' => 7000000, 'jumlah' => 1, 'created_at' => NOW()],
            ['penjualan_id' => 1, 'barang_id' => 2, 'harga' => 45000, 'jumlah' => 4, 'created_at' => NOW()],
            ['penjualan_id' => 1, 'barang_id' => 3, 'harga' => 34000, 'jumlah' => 1, 'created_at' => NOW()],
            //pejualan id 2
            ['penjualan_id' => 2, 'barang_id' => 4, 'harga' => 150000, 'jumlah' => 3, 'created_at' => NOW()],
            ['penjualan_id' => 2, 'barang_id' => 5, 'harga' => 145000, 'jumlah' => 8, 'created_at' => NOW()],
            ['penjualan_id' => 2, 'barang_id' => 6, 'harga' => 7000, 'jumlah' => 2, 'created_at' => NOW()],
            //penjualan id 3
            ['penjualan_id' => 3, 'barang_id' => 7, 'harga' => 45000, 'jumlah' => 1, 'created_at' => NOW()],
            ['penjualan_id' => 3, 'barang_id' => 8, 'harga' => 32100, 'jumlah' => 7, 'created_at' => NOW()],
            ['penjualan_id' => 3, 'barang_id' => 9, 'harga' => 80000, 'jumlah' => 1, 'created_at' => NOW()],
            //penjualan id 4
            ['penjualan_id' => 4, 'barang_id' => 2, 'harga' => 4500000, 'jumlah' => 1, 'created_at' => NOW()],
            ['penjualan_id' => 4, 'barang_id' => 5, 'harga' => 500000, 'jumlah' => 2, 'created_at' => NOW()],
            ['penjualan_id' => 4, 'barang_id' => 9, 'harga' => 1250000, 'jumlah' => 1, 'created_at' => NOW()],
            //penjualan id 5
            ['penjualan_id' => 5, 'barang_id' => 1, 'harga' => 7000000, 'jumlah' => 1, 'created_at' => NOW()],
            ['penjualan_id' => 5, 'barang_id' => 6, 'harga' => 1200000, 'jumlah' => 1, 'created_at' => NOW()],
            ['penjualan_id' => 5, 'barang_id' => 10, 'harga' => 900000, 'jumlah' => 2, 'created_at' => NOW()],
            //penjualan id 6
            ['penjualan_id' => 6, 'barang_id' => 2, 'harga' => 4500000, 'jumlah' => 1, 'created_at' => NOW()],
            ['penjualan_id' => 6, 'barang_id' => 4, 'harga' => 150000, 'jumlah' => 2, 'created_at' => NOW()],
            ['penjualan_id' => 6, 'barang_id' => 8, 'harga' => 2000000, 'jumlah' => 1, 'created_at' => NOW()],
            //penjualan id 7
            ['penjualan_id' => 7, 'barang_id' => 1, 'harga' => 7000000, 'jumlah' => 1, 'created_at' => NOW()],
            ['penjualan_id' => 7, 'barang_id' => 3, 'harga' => 300000, 'jumlah' => 1, 'created_at' => NOW()],
            ['penjualan_id' => 7, 'barang_id' => 7, 'harga' => 750000, 'jumlah' => 2, 'created_at' => NOW()],
            //penjualan id 8
            ['penjualan_id' => 8, 'barang_id' => 5, 'harga' => 500000, 'jumlah' => 2, 'created_at' => NOW()],
            ['penjualan_id' => 8, 'barang_id' => 6, 'harga' => 1200000, 'jumlah' => 1, 'created_at' => NOW()],
            ['penjualan_id' => 8, 'barang_id' => 9, 'harga' => 1250000, 'jumlah' => 1, 'created_at' => NOW()],
            //penjualan id 9
            ['penjualan_id' => 9, 'barang_id' => 3, 'harga' => 300000, 'jumlah' => 1, 'created_at' => NOW()],
            ['penjualan_id' => 9, 'barang_id' => 4, 'harga' => 150000, 'jumlah' => 2, 'created_at' => NOW()],
            ['penjualan_id' => 9, 'barang_id' => 10, 'harga' => 900000, 'jumlah' => 2, 'created_at' => NOW()],
            //penjualan id 10
            ['penjualan_id' => 10, 'barang_id' => 1, 'harga' => 7000000, 'jumlah' => 1, 'created_at' => NOW()],
            ['penjualan_id' => 10, 'barang_id' => 2, 'harga' => 4500000, 'jumlah' => 1, 'created_at' => NOW()],
            ['penjualan_id' => 10, 'barang_id' => 6, 'harga' => 1200000, 'jumlah' => 1, 'created_at' => NOW()],
        ]);
    }
}
