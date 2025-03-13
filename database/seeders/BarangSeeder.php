<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
               $data = [
            // Supplier 1
            ['kategori_id' => 1, 'barang_kode' => 'BRG001', 'barang_nama' => 'Laptop', 'harga_beli' => 5000000, 'harga_jual' => 7000000, 'created_at' => NOW()],
            ['kategori_id' => 1, 'barang_kode' => 'BRG002', 'barang_nama' => 'Smartphone', 'harga_beli' => 3000000, 'harga_jual' => 4500000, 'created_at' => NOW()],
            ['kategori_id' => 1, 'barang_kode' => 'BRG003', 'barang_nama' => 'TWS', 'harga_beli' => 250000, 'harga_jual' => 300000, 'created_at' => NOW()],
            ['kategori_id' => 1, 'barang_kode' => 'BRG004', 'barang_nama' => 'Keyboard', 'harga_beli' => 670000, 'harga_jual' => 750000, 'created_at' => NOW()],
            ['kategori_id' => 1, 'barang_kode' => 'BRG005', 'barang_nama' => 'Mouse', 'harga_beli' => 450000, 'harga_jual' => 650000, 'created_at' => NOW()],
            // Supplier 2
            ['kategori_id' => 2, 'barang_kode' => 'BRG006', 'barang_nama' => 'Kemeja', 'harga_beli' => 100000, 'harga_jual' => 150000, 'created_at' => NOW()],
            ['kategori_id' => 2, 'barang_kode' => 'BRG007', 'barang_nama' => 'Celana Jeans', 'harga_beli' => 200000, 'harga_jual' => 300000, 'created_at' => NOW()],
            ['kategori_id' => 2, 'barang_kode' => 'BRG008', 'barang_nama' => 'Sweater', 'harga_beli' => 135000, 'harga_jual' => 150000, 'created_at' => NOW()],
            ['kategori_id' => 2, 'barang_kode' => 'BRG009', 'barang_nama' => 'Jacket', 'harga_beli' => 100000, 'harga_jual' => 130000, 'created_at' => NOW()],
            ['kategori_id' => 2, 'barang_kode' => 'BRG010', 'barang_nama' => 'Hoodie', 'harga_beli' => 180000, 'harga_jual' => 200000, 'created_at' => NOW()],
            // Supplier 3
            ['kategori_id' => 3, 'barang_kode' => 'BRG011', 'barang_nama' => 'Pensil', 'harga_beli' => 2000, 'harga_jual' => 5000, 'created_at' => NOW()],
            ['kategori_id' => 3, 'barang_kode' => 'BRG012', 'barang_nama' => 'Buku Tulis', 'harga_beli' => 5000, 'harga_jual' => 10000, 'created_at' => NOW()],
            ['kategori_id' => 3, 'barang_kode' => 'BRG013', 'barang_nama' => 'Kotak Pensil', 'harga_beli' => 10000, 'harga_jual' => 12000, 'created_at' => NOW()],
            ['kategori_id' => 3, 'barang_kode' => 'BRG014', 'barang_nama' => 'Bolpoin', 'harga_beli' => 3000, 'harga_jual' => 6000, 'created_at' => NOW()],
            ['kategori_id' => 3, 'barang_kode' => 'BRG015', 'barang_nama' => 'Penghapus', 'harga_beli' => 500, 'harga_jual' => 1000, 'created_at' => NOW()],
        ];

        DB::table('m_barang')->insert($data);
    }
}
