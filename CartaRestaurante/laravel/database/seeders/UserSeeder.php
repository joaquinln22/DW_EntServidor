<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user1 = new User();
        $user1->name = 'Joaquin';
        $user1->email = 'joaquinlorcanieto@gmail.com';
        $user1->password = Hash::make('12345678');
        $user1->save();

        $user2 = new User();
        $user2->name = 'Fernando';
        $user2->email = 'fer@gmail.com';
        $user2->password = Hash::make('F1234567');
        $user2->save();
    }
}