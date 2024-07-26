<?php

namespace Database\Seeders;

use App\Models\Pemohon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        $permissionAdmin = [
            'Data Pemohon',
            'Tambah Data Pemohon',
            'Edit Data Pemohon',
            'Hapus Data Pemohon',
            'Data Kriteria',
            'Tambah Data Kriteria',
            'Edit Data Kriteria',
            'Hapus Data Kriteria',
            'Tabel Kriteria',
            'Tambah Tabel Kriteria',
            'Edit Tabel Kriteria',
            'Hapus Tabel Kriteria',
            'Hasil Perhitungan',
            'Proses Perhitungan',
            'Nilai Preferensi',
            'Perhitungan',
        ];
        
        foreach ($permissionAdmin as $key => $value) {
            Permission::create(['name' => $value]);
        }

        $permissionUser = [
            'Data Pemohon',
            'Tambah Data Pemohon',
            'Edit Data Pemohon',
            'Hapus Data Pemohon',
            'Data Kriteria',
            'Tambah Data Kriteria',
            'Edit Data Kriteria',
            'Hapus Data Kriteria',
            'Hasil Perhitungan',
            'Nilai Preferensi',
        ];

        foreach ($permissionAdmin as $key => $value) {
            $roleAdmin->givePermissionTo($value);
        }

        foreach ($permissionUser as $key => $value) {
            $roleUser->givePermissionTo($value);
        }

        $admin = User::Create([
            'name' => 'deazuri',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('deazuri'),
        ]);

        $admin->assignRole('admin');

        
        $user = User::Create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');

        $this->call(BobotSeeder::class);

    }
}
  
