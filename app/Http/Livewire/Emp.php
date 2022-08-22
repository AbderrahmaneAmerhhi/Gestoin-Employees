<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\dept;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\emp as ModelsEmp;
use Illuminate\Support\Facades\Storage;

class Emp extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public  ModelsEmp $emp;
    public $editing = false;
    public $add = false;
    public $print = false;
    public $requesttype;
    public $empprint = [];
    public $empid  ;
    public $name ;
    public $image ;
    public $regstnbr ;
    public $post ;
    public $sup ;
    public $status = 1 ;
    public $hdate ;
    public $dept ;
    // validation
    protected $rules = [
        'name' => 'required|min:6',
        'image' => 'nullable|min:1000',

        'post' => 'required|string',
        'sup' => 'nullable|',
        'status' => 'required',
        'hdate' => 'required',
        'dept' => 'required',
    ];
    // add employe function
    public function addemp(){
        $this->validate([
            'regstnbr' => 'required|unique:emps,registration',
        ]);
        $this->validate();
        $hdate =Carbon::parse($this->hdate)->format('Y-m-d H:i:s');
        // upload image :


        $this->image->storeAs('images', time() . '.' .$this->image->getClientOriginalName(),'public');
        ModelsEmp::create([
            'name'=>$this->name,
            'dept_id'=>$this->dept,
            'image'=>'storage/images/'.  time() . '.' .$this->image->getClientOriginalName(),
            'registration'=>$this->regstnbr,
            'sup_id'=>$this->sup,
            'date_emb'=>  $hdate ,
            'status'=>1,
            'post'=>$this->post,

         ]);

         $this->name = '';
         $this->dept = '';
         $this->image = '';
         $this->regstnbr = '';
         $this->sup = '';
         $this->hdate = '';
         $this->status = '';
         $this->post = '';
         session()->flash('insertsuccess', 'Dept Added.');
    }
    public function showAdd(){
        $this->name = '';
         $this->dept = '';
         $this->image = '';
         $this->regstnbr = '';
         $this->sup = '';
         $this->hdate = '';
         $this->status = 1;
         $this->post = '';
         $this->editing = false;
         $this->add = true;
    }
    public function back(){
        $this->name = '';
         $this->dept = '';
         $this->image = '';
         $this->regstnbr = '';
         $this->sup = '';
         $this->hdate = '';
         $this->status = 1;
         $this->post = '';
         $this->editing = false;
         $this->add = false;
    }
    public function print($emp){
        // if($requesttype == 0){

        // }else if($requesttype == 1){

        // }else{

        // }$this->empid = $emp['id'];
        $this->empprint['name']= $emp['name'];
        $this->empprint['regstnbr'] = $emp['registration'];
        $this->empprint['post'] = $emp['post'];
        $this->empprint['sup'] =  $emp['sup_id'];
        $this->empprint['status'] =  $emp['status'];
        $this->empprint['hdate'] = $emp['date_emb'];
        $this->empprint['dept'] =  $emp['dept']['name'];

        $this->editing = false;
         $this->add = false;
        $this->print = true;
    }
    // delete employe function
    public function deleteEmp($id){
      $emp =  ModelsEmp::where('id',$id)->first();
      if(file_exists(public_path($emp->image))){
        unlink(public_path($emp->image));
      }
      $emp->delete();
      session()->flash('success', 'Emp Deleted.');


    }
    // show edit form
    public function showedit($emp){
        $this->editing = true;
        $this->add = false;
        $this->empid = $emp['id'];
        $this->name = $emp['name'];
        $this->regstnbr = $emp['registration'];
        $this->post = $emp['post'];
        $this->sup =  $emp['sup_id'];
        $this->status =  $emp['status'];
        $this->hdate = $emp['date_emb'];
        $this->dept =  $emp['dept_id'];
    }
    public function editemp(){

        $this->validate();
        $emp = ModelsEmp::where('id',$this->empid)->first();
        $this->validate([
            'regstnbr' => 'required|unique:emps,registration,'.$emp->id ,
        ]);
        $hdate =Carbon::parse($this->hdate)->format('Y-m-d H:i:s');
        // upload image :

         if(!empty($this->image)){
            if(file_exists(public_path($emp->image))){
                unlink(public_path($emp->image));
              }
              $this->image->storeAs('images', time() . '.' .$this->image->getClientOriginalName(),'public');
              $emp->image = 'storage/images/'.  time() . '.' .$this->image->getClientOriginalName();

            }
        $image = $emp->image;
        $emp->update([
            'name'=>$this->name,
            'dept_id'=>$this->dept,
            'image'=>$image,
            'registration'=>$this->regstnbr,
            'sup_id'=>$this->sup,
            'date_emb'=>  $hdate ,
            'status'=>1,
            'post'=>$this->post,
        ]) ;
        $this->name = '';
        $this->dept = '';
        $this->image = '';
        $this->regstnbr = '';
        $this->sup = '';
        $this->hdate = '';
        $this->status = '';
        $this->post = '';
       session()->flash('Updatesuccess', 'Emp Updated.');

    }
    // public function mount(){
    // }
    public function render()
    {
        $emps =ModelsEmp::latest()->paginate(10) ;
        foreach($emps as $emp){
            $supp =  ModelsEmp::where('registration',$emp->sup_id)->first();
            if($supp == null){

                $emp->setAttribute('supp','not exist');
            }else{
                $emp->setAttribute('supp',$supp->name);
            }

        }
        return view('livewire.emp')->with([
            'emps'=>$emps,
            'editing'=>$this->editing,
            'add'=>$this->add,
            'print'=>$this->print,
            'depts'=>dept::all(),
            'empprint'=>$this->empprint,
            'empcount'=>ModelsEmp::count(),
            'activeemp'=>ModelsEmp::where('status',1)->count(),
            'vocationemp'=>ModelsEmp::where('status',0)->count(),
            'depts'=>dept::count(),
        ]);
    }
}
