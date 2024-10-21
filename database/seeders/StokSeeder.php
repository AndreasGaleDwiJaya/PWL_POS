<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'stok_id' => 1,
                'barang_id' => 1,
                'supplier_id' => 1,
                'stok_tanggal' => '2024-09-01 08:00:00',
                'stok_jumlah' => 50,
                'user_id' => 1, // Sesuaikan dengan user_id yang ada
            ],
            [
                'stok_id' => 2,
                'barang_id' => 2,
                'supplier_id' => 1,
                'stok_tanggal' => '2024-09-01 08:00:00',
                'stok_jumlah' => 40,
                'user_id' => 1, // Sesuaikan dengan user_id yang ada
            ],
            [
                'stok_id' => 3,
                'barang_id' => 3,
                'supplier_id' => 1,
                'stok_tanggal' => '2024-09-01 08:00:00',
                'stok_jumlah' => 60,
                'user_id' => 1, // Sesuaikan dengan user_id yang ada
            ],
            [
                'stok_id' => 4,
                'barang_id' => 4,
                'supplier_id' => 2,
                'stok_tanggal' => '2024-09-01 08:00:00',
                'stok_jumlah' => 70,
                'user_id' => 2, // Sesuaikan dengan user_id yang ada
            ],
            [
                'stok_id' => 5,
                'barang_id' => 5,
                'supplier_id' => 2,
                'stok_tanggal' => '2024-09-01 08:00:00',
                'stok_jumlah' => 30,
                'user_id' => 2, // Sesuaikan dengan user_id yang ada
            ],
        ];
        DB::table('t_stoks') -> insert($data);        
    }
}
