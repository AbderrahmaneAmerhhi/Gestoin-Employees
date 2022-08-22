<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    // redirect depts index methode in his controller
    public function redirectdepts(){
        return redirect()->route('depts.index');
    }
    public function redirectemps(){
        return redirect()->route('employes.index');
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
