<div class="container">

    <!-- Page Content -->
            <div class="CardBox">
                <div class="Card">
                    <div>
                        <div class="numbers">{{$deptscount}}</div>
                        <div class="CardName">Departments</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-building"></i>
                    </div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$empcount}}</div>
                        <div class="CardName">All Emps</div>
                    </div>
                    <div class="iconBox"><i class="fa-solid fa-person-circle-check"></i></div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$activeemp}}</div>
                        <div class="CardName">Active Emps</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-person-digging"></i>
                    </div>
                </div>
                <div class="Card">
                    <div>
                        <div class="numbers">{{$vocationemp}}</div>
                        <div class="CardName">In vocation </div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-plane"></i>
                    </div>
                </div>

            </div>

            <!--- details Lists --->
            <div class="details">
                <!--- order details List --->
                <div class="recentOrders">
                    <div class="cartHeader">
                        <h2>Departements</h2>
                    </div>
                    <div>

                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if (session()->has('Updatesuccess'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ session('Updatesuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if (session()->has('insertsuccess'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ session('insertsuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                    @if ($add == true || $editing == true )
                    <div>
                        <div class="modal-header">
                            @if ($editing == false)
                            <h5 class="modal-title" id="exampleModalLabel">Add Departement</h5>
                            </div>
                            <div class="modal-body">
                            <form method="post" wire:submit.prevent="adddept">
                            @else
                                <h5 class="modal-title" id="exampleModalLabel">Edit Departement</h5>
                                </div>
                                <div class="modal-body">
                                <form method="post" wire:submit.prevent="editdepartement">
                            @endif

                            <div class="mb-3">
                                @error('name') <span class="text-danger">{{ $message }}</span><br/>  @enderror
                                <label for="name" class="form-label">Dept Name :</label>
                                <input type="text" wire:model="name" placeholder="Entre the name of departement !" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                @error('local') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                                <label for="adder" class="form-label">Adresse  :</label>
                                <input type="address" wire:model="local" class="form-control" placeholder="Enter the place of departement" id="adder">
                            </div>
                            <button class="btn btn-primary"  type="submit" >Submit</button>
                            <button class="btn btn-light" type="reset">Clear</button>
                            <button type="button" class="btn btn-secondary closeform" wire:click="back">Back</button>
                        </form>
                            </div>
                     </div>

                     @else
                    <table>

                        <thead>
                            <tr>
                                <td>#ID</td>
                                <td>Name</td>
                                <td>Adresse</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($depts as $dept)
                            <tr>
                                <td>{{$dept->id}}</td>
                                <td>{{$dept->name}}</td>
                                <td>{{$dept->place}}</td>
                                <td class="d-flex flex-row " style="column-gap: .5px">
                                <a wire:click='showadd'  class="btn btn-sm btn-primary showform" title="Add"  >
                                    <i class="fas fa-plus"></i>
                                </a>
                                <a class="btn btn-sm btn-success " title="Edit" wire:click='showedit({{$dept}})'>
                                    <i class="fas fa-edit"></i>
                                </a>
                                 <button wire:click="deleteEmp({{$dept->id}})" class="btn btn-sm btn-danger" title="Remove">
                                    <i class="fas fa-trash"></i>
                                 </button>

                                </td>
                            </tr>
                            @endforeach


                        </tbody>

                    </table>
                    {{-- pagination  --}}
                    <div class="mt-2 d-flex align-items-center justify-content-center">
                        {{ $depts->links() }}
                    </div>
                    @endif

                </div>

            </div>


        {{-- form content
        <div class="form-content deptform show">
                    @if (session()->has('insertsuccess'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        {{ session('insertsuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="modal-header">
                    @if ($editing == false)
                        <h5 class="modal-title" id="exampleModalLabel">Add Departement</h5>
                        </div>
                        <div class="modal-body">
                        <form method="post" wire:submit.prevent="adddept">
                    @else
                        <h5 class="modal-title" id="exampleModalLabel">Edit Departement</h5>
                        </div>
                        <div class="modal-body">
                        <form method="post" wire:submit.prevent="editdepartement">
                    @endif

                        <div class="mb-3">
                            @error('name') <span class="text-danger">{{ $message }}</span><br/>  @enderror
                            <label for="name" class="form-label">Dept Name :</label>
                            <input type="text" wire:model="name" placeholder="Entre the name of departement !" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            @error('local') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                            <label for="adder" class="form-label">Adresse  :</label>
                            <input type="address" wire:model="local" class="form-control" placeholder="Enter the place of departement" id="adder">
                        </div>
                        <button class="btn btn-primary"  type="submit" >Submit</button>
                        <button class="btn btn-light" type="reset">Clear</button>
                        <button type="button" class="btn btn-secondary closeform" >Close</button>
                    </form>
                    </div>
          </div>




        </div>
 --}}
        <style>


        </style>
