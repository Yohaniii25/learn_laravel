<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //db eka sweep krddi run wene mekan
        User::create([
            'name' => 'Administrator',
            'email' => 'y123@gmail.com',
            'password' => 'Yohani@1574',
            'role' => 'admin'
        ]);
    }
}
