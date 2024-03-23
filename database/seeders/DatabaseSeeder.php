<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DoctorProfile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $doctorRole= Role::create(['name' => 'doctor']);
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);


        $admin = User::factory()->create(["email"=>"phyu24655@gmail.com",'password'=>"12345678"]);
        $user = User::factory()->create(['password'=>"12345678"]);

      User::factory(5)->create(['password'=>"12345678"])->each(function ($user) use ($doctorRole) {
        DoctorProfile::factory()->create([
            'user_id' => $user->id,
        ]);
            $user->assignRole($doctorRole);
        });

       


        $admin->assignRole($adminRole);
        $user->assignRole($userRole);
    }
}
