<?php

namespace App\Http\Livewire;

use App\Models\dept as ModelsDept;
use App\Models\emp;
use Livewire\Component;
use Livewire\WithPagination;

class Dept extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // public  $depts ;// store departments data  in this array
    // get depts from db
    // public function getDepts(){
    //     // $depts = ModelsDept::latest()->paginate(10);
    //     $depts = ModelsDept::all();
    //     $this->depts = $depts;
    // }
    // delete departmenet  function

    public $name ;
    public $local  ;
    public $deptid  ;
    public $editing  ;
    public $add = false  ;
    protected $rules = [
        'name' => 'required|min:6',
        'local' => 'required',
    ];
    // Add departement function
    public function adddept(){
        $this->validate();
        ModelsDept::create([
           'name'=>$this->name,
           'place'=>$this->local,
        ]);

        $this->name = '';
        $this->local = '';
        session()->flash('insertsuccess', 'Dept Added.');
    }
    // ashow add form
    public function showadd(){
        $this->editing = false;
        $this->add = true;
        $this->name = '';
        $this->local = '';
    }
    public function back(){
        $this->editing = false;
        $this->add = false;
        $this->name = '';
        $this->local = '';
    }
    // show edit form
    public function showedit($dept){
        $this->name = $dept['name'];
        $this->local = $dept['place'];
        $this->deptid = $dept['id'];
        $this->editing = true;
        $this->add = false;
    }
    public function editdepartement(){
        $this->validate();
         $dept = ModelsDept::where('id',$this->deptid)->first();
         $dept->update([
            'name'=>$this->name,
            'place'=>$this->local,
         ]) ;
         $this->name = '';
        $this->local = '';
        $this->editing = false;
        $this->id = '';
        session()->flash('Updatesuccess', 'Dept Updated.');


    }
    public function deleteEmp($id){
        $emp =  ModelsDept::where('id',$id)->first();
        $emp->delete();
        session()->flash('success', 'Dept Deleted.');
      }
    // public function mount(){
    //     $this->getDepts();
    // }
    public function render()
    {
        return view('livewire.dept')->with([
            'depts'=> ModelsDept::latest()->paginate(10),
            'name'=>$this->name,
            'editing'=>$this->editing,
            'add'=>$this->add,
            'empcount'=>emp::count(),
            'activeemp'=>emp::where('status',1)->count(),
            'vocationemp'=>emp::where('status',0)->count(),
            'deptscount'=>ModelsDept::count(),
        ]);
    }
}
