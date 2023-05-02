<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Role;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



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
        \App\Models\User::factory(20)->create();
        \App\Models\Company::factory(20)->create();
        \App\Models\Job::factory(20)->create();
        
        $categories = [
            'Мэдээллийн технологи ',
            'Мэдээллийн систем ',
            'Програм хангамж',
            'Электроник',
            'Аюулгүй байдал',
            'Хиймэл оюун ухаан',
            'Төсөл',

           
        ];
        foreach($categories as $category){
            Category::create(['name'=> $category]);
           }
        \App\Models\Category::factory(20)->create();

        $adminRole = Role::create(['name' => 'admin']);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            
        ]);
        $admin->roles()->attach($adminRole);
    }
}
