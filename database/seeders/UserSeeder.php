<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Foreach_;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
        [
                [
                "name" => "ahmed",
                "email" => "admin@admin.com",
                'administration_level' => 1,
                'password' => Hash::make('password'),
                'profile_photo_path' => 'profile-photos/teacher1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                "name" => "Karem",
                "email" => "karem@admin.com",
                'administration_level' => 1,
                'password' => Hash::make('password'),
                'profile_photo_path' => 'profile-photos/teacher2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                "name" => "Osame",
                "email" => "osame@admin.com",
                'administration_level' => 1,
                'password' => Hash::make('password'),
                'profile_photo_path' => 'profile-photos/teacher3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                "name" => "Mahmmod",
                "email" => "mahmmod@teacher.com",
                'administration_level' => 1,
                'password' => Hash::make('password'),
                'profile_photo_path' => 'profile-photos/teacher4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                ],

                [
                "name" => "aml",
                "email" => "aml@teacher.com",
                'administration_level' => 1,
                'password' => Hash::make('password'),
                'profile_photo_path' => 'profile-photos/teacher5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                ],

                [
                "name" => "ali",
                "email" => "ali@teacher.com",
                'administration_level' => 1,
                'password' => Hash::make('password'),
                'profile_photo_path' => 'profile-photos/teacher8.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                ],

                [
                "name" => "zakra",
                "email" => "zakra@teacher.com",
                'administration_level' => 1,
                'password' => Hash::make('password'),
                'profile_photo_path' => 'profile-photos/teacher6.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                "name" => "Farex",
                "email" => "farex@teacher.com",
                'administration_level' => 1,
                'password' => Hash::make('password'),
                'profile_photo_path' => 'profile-photos/teacher7.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                "name" => "mona",
                "email" => "mona@teacher.com",
                'administration_level' => 1,
                'password' => Hash::make('password'),
                'profile_photo_path' => 'profile-photos/teacher.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                ],
            ]

    );

        $users = User::all();

        foreach($users as $user) {
            $user->alert()->create();
        }
    }
}
