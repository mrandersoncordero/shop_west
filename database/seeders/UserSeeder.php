<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // crear usuario Joe
        $user =User::create([
            'role_id' => 1,
            'name' => 'Joe',
            'email' => 'joe@example.com',
            'password' => bcrypt('v-123456')
        ]);
        // crear perfil
        Profile::create([
            'user_id' => $user->id,
            'dni' => '123456789',
            'first_name' => 'Johan',
            'last_name' => 'GG',
            'address' => 'la zona 0',
            'phone_number' => '04121234567',
            'birthday_date' => now()->subYears(25),
            'withholding_tax' => 0,
        ]);

        // crear usuario Administrador 1
        $user = User::create([
            'role_id' => 2,
            'name' => 'Administrador1',
            'email' => 'admin1@example.com',
            'password' => bcrypt('v-123456')
        ]);
        // crear perfil
        Profile::create([
            'user_id' => $user->id,
            'dni' => '123456788',
            'first_name' => 'admin1',
            'last_name' => 'trator1',
            'address' => 'la zona 1',
            'phone_number' => '04121234567',
            'birthday_date' => now()->subYears(25),
            'withholding_tax' => 0,
        ]);


        // crear usuario Administrador 2
        $user = User::create([
            'role_id' => 2,
            'name' => 'Administrador2',
            'email' => 'admin2@example.com',
            'password' => bcrypt('v-123456')
        ]);
        // crear perfil
        Profile::create([
            'user_id' => $user->id,
            'dni' => '123456787',
            'first_name' => 'admin2',
            'last_name' => 'trator2',
            'address' => 'la zona 2',
            'phone_number' => '04121234567',
            'birthday_date' => now()->subYears(25),
            'withholding_tax' => 0,
        ]);

        // crear usuario cliente
        $user = User::create([
            'role_id' => 3,
            'name' => 'ancord',
            'email' => 'acordero.dev@gmail.com',
            'password' => bcrypt('v-123456')
        ]);
        // crear perfil
        Profile::create([
            'user_id' => $user->id,
            'dni' => '30325069',
            'first_name' => 'Anderson',
            'last_name' => 'Cordero',
            'address' => 'la zona 2',
            'phone_number' => '04129062253',
            'birthday_date' => now()->subYears(25),
            'withholding_tax' => 0,
        ]);
    }
}
