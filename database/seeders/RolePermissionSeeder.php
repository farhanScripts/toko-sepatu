<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $pembeli = Role::create(['name' => 'pembeli']);
        $vendor = Role::create(['name' => 'vendor']);

        //buat akun default untuk admin
        $user = User::create(['name' => 'Farhan Admin', 'email' => 'farhanputra123410@gmail.com', 'password' => bcrypt('123123123')]);

        $user->assignRole($admin);
    }
}
