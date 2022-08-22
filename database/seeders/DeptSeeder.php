<?php

namespace Database\Seeders;

use App\Models\dept;
use Database\Factories\DeptFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        dept::factory()->count(10)->create();
    }
}
