<?php

namespace Database\Seeders;

use App\Http\Livewire\Emp;
use App\Models\emp as ModelsEmp;
use Database\Factories\EmpFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ModelsEmp::factory()->count(10)->create();

    }
}
