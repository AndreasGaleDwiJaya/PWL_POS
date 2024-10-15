<?php

namespace Database\Seeders;

use App\Models\m_supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Supplier untuk kategori Sembako (SBK)
            [
                'supplier_id' => 1,
                'supplier_kode' => 'SP001',
                'supplier_nama' => 'Toko Sembako Si Makmur',
                'supplier_alamat' => 'Yogyakarta, Indonesia',
            ],
            [
                'supplier_id' => 2,
                'supplier_kode' => 'SP002',
                'supplier_nama' => 'PT Mutiara Harapan',
                'supplier_alamat' => 'Mojokerto, Indonesia',
            ],

            // Supplier untuk kategori Makanan ringan (SNK)
            [
                'supplier_id' => 3,
                'supplier_kode' => 'SP003',
                'supplier_nama' => 'Toko Jajanan Ringan Si Udin',
                'supplier_alamat' => 'Pasuruan, Indonesia',
            ],

            // Supplier untuk kategori Peralatan Mandi (MND)
            [
                'supplier_id' => 4,
                'supplier_kode' => 'SP004',
                'supplier_nama' => 'CV Alat Mandi Si Jajang',
                'supplier_alamat' => 'Surabaya, Indonesia',
            ],

            // Supplier untuk kategori Minuman (MNM)
            [
                'supplier_id' => 5,
                'supplier_kode' => 'SP005',
                'supplier_nama' => 'PT Segar Minum',
                'supplier_alamat' => 'Malang, Indonesia',
            ],
        ];
        DB::table('m_suppliers') -> insert($data);
    }
}