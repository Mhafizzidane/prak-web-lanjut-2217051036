<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserModel;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusanData = [
            'Teknik Informatika',
            'Sistem Informasi',
            'Teknik Komputer',
            'Teknik Elektro',
        ];

        $users = UserModel::all();

        foreach ($users as $user) {
            // Randomly assign a jurusan and semester to each user
            $user->update([
                'jurusan' => $jurusanData[array_rand($jurusanData)],
                'semester' => rand(1, 8), // Random semester between 1 and 8
            ]);
        }
    }
}
