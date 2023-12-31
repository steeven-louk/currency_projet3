<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $admin = new User();
            $admin->name = 'admin';
            $admin->email = 'admin@admin.com';
            $admin->password = Hash::make('password');
            $admin->save();
            }
    }
}
