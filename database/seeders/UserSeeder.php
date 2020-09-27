<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $UserId=(string) Str::uuid();
        DB::table('users')->insert([
            'id' => $UserId,
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123mudar'),
            'created_at' => date("Y-m-d H:i:s")
        ]);

/*        $RoleId=(string) Str::uuid();
        DB::table('roles')->insert([
            'id' => $RoleId,
            'name' => 'Admin',
            'label' => 'Administrador',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('role_user')->insert([
            'id' => (string) Str::uuid(),
            'role_id' => $RoleId,
            'user_id' => $UserId,
            'created_at' => date("Y-m-d H:i:s")
        ]);*/
    }
}
