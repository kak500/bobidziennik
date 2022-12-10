<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        
        $user = new User();
        $user->name = "Admin";
        $user->surname = "Adminowski";
        $user->email = 'admin@mail.com';
        $user->password = Hash::make('admin');
        $user->role = 3;
        $user->save();

        // DB::table('users')->insert([
        //     'surname' => "Admin",
        //     'name' => "Adminowski",
        //     'email' => 'admin@mail.com',
        //     'password' => Hash::make('admin'),
        //     'role' => 3
        // ]);

        DB::table('roles')->insert([
            [ 'id' => 1, 'role_name' => "Uczeń"],
            [ 'id' => 2, 'role_name' => "Nauczyciel"],
            [ 'id' => 3, 'role_name' => "Admin"],
        ]);

        $this->call([
            SubjectSeeder::class
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

