<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = new ModelsUser();
        $admin->name ='admin';
        $admin->email ='admin@gmail.com';
        $admin->image ='images/profile/admin.png';
        $admin->password = Hash::make('admin') ;
        $admin->save();
    }
}
