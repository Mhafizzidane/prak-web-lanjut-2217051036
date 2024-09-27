<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'A',
            'B',
            'C',
            'D',
        ];

        foreach ($data as $kelas){
            Kelas::create([
                'nama_kelas'=> $kelas,
            ]);
        }
    }
}
