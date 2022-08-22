<div class="container mt-5">
    <!-- Page Content -->
            <div class="CardBox">
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
                <div class="Card">
                    <div>
                        <div class="numbers">{{$depts}}</div>
                        <div class="CardName">Departments</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-building"></i>
                    </div>
                </div>
            </div>

            <!--- details Lists --->
            <div class="details">
                <!--- order details List --->
                <div class="recentOrders">
                    <div class="cartHeader">
                        <h2>Employes</h2>
                    </div>
                    <div>
                        @if (session()->has('insertsuccess'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ session('insertsuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('Updatesuccess'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('Updatesuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    </div>
                     @if ($add == true || $editing == true )
                    <div>
                        <div class="modal-header">
                        @if ($editing == false)
                            <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                            </div>
                            <div class="modal-body">
                                <form action=""wire:submit.prevent="addemp"  >
                        @else
                            <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                            </div>
                            <div class="modal-body">
                            <form method="post" wire:submit.prevent="editemp">
                        @endif

                            <div class="mb-3">
                                @error('name') <span class="text-danger">{{ $message }}</span><br/>  @enderror
                                <label for="name" class="form-label"> Name :</label>
                                <input type="text" wire:model="name" placeholder="Entre the name of departement !" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                @error('image') <span class="text-danger">{{ $message }}</span><br/>  @enderror
                                <label for="img" class="form-label"> Image :</label>
                                <input type="file" wire:model.lazy="image" placeholder="Entre the name of departement !" class="form-control" id="img">
                            </div>
                            <div class="mb-3">
                                @error('regstnbr') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                                <label for="reg" class="form-label">Regsiter Number  :</label>
                                <input type="text" wire:model="regstnbr" class="form-control" placeholder="Enter the place of departement" id="reg">
                            </div>
                            <div class="mb-3">
                                @error('dept') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                                <label for="depts" class="form-label">Department  :</label>
                                <select name="departments" wire:model="dept" id="depts" class="form-control">
                                   <option aria-readonly="true" selected>Chose Department !</option>
                                @foreach ($depts as $dept)
                                    <option value="{{$dept->id}}">{{$dept->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                @error('sup') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                                <label for="sup" class="form-label">Sup  :</label>
                                <select name="supp"  wire:model="sup" id="sup" class="form-control">
                                    <option aria-readonly="true" selected>Chose Sup If ex !</option>
                                    @foreach ($emps as $emp)
                                        <option value="{{$emp->registration}}">{{$emp->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                @error('status') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                                <label for="stat" class="form-label">Status  :</label>
                                 <div class="form-check">
                                   <input class="form-check-input" wire:model='status' type="radio" value="1" name="" id="" checked  >
                                   <label class="form-check-label" for="">
                                     Active
                                   </label>
                                 </div>
                                 <div class="form-check">
                                   <input class="form-check-input"   wire:model='status'  type="radio" value="0" name="" id="" >
                                   <label class="form-check-label" for="">
                                     In Vocation
                                   </label>
                                 </div>
                            </div>
                            <div class="mb-3">
                                @error('hdate') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                                <label for="dateh" class="form-label">HDate  :</label>
                                <input type="datetime-local" wire:model="hdate"  class="form-control" placeholder="Enter theHire Date" id="dateh">
                            </div>
                            <div class="mb-3">
                                @error('post') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                                <label for="post" class="form-label">Post  :</label>
                                <select name="post" wire:model="post" id="post" class="form-control">
                                        <option aria-readonly="true" selected>Chose Post !</option>
                                        <option value="technicien">technicien</option>
                                        <option value="technicien">dev inginier</option>
                                        <option value="technicien">cloud ing</option>
                                        <option value="technicien">stagaire</option>
                                </select>
                            </div>
                            <button class="btn btn-primary"  type="submit" >Submit</button>
                            <button class="btn btn-light" type="reset">Clear</button>
                            <button type="button" class="btn btn-secondary closeform" wire:click="back">Back</button>
                          </form>
                            </div>
                     </div>
                     @elseif($print == true)
                       <div class="container ">
                             <select class="form-control" wire:model="requesttype" name="" id="">
                                <option value="0"> Internship Certificate</option>
                                <option value="1">Vocation Request</option>
                                <option value="2">Certification of working</option>
                             </select>
                             @if ($requesttype == 0)
                             <div class="row my-5">
                                <div class="col-md-8 mx-auto" id="request">
                                   <div class="card-header bg-white text-center p-3 ">
                                     <img src="{{asset('images/logo/companyloo.png')}}" width="200" height="200" alt="">
                                     <h3 class="text-dark">
                                        INTERNSHIP CERTIFICATE
                                     </h3>
                                   </div>
                                   <div class="card-body">
                                             <p class="lead">
                                                Name  : <b>{{$empprint['name']}}</b>
                                             </p>
                                             <p class="lead">
                                                 <b>{{$empprint['dept']}}</b> departement.
                                             </p>
                                             <p class="lead">
                                                has accomplished an internship from <b>_________</b> to <b>____________________<b>
                                             </p>
                                             <p class="lead">
                                                Times of absence: <b>______________</b>
                                             </p>
                                             <p class="lead">
                                                Contents of the internship: <b>______________</b>
                                             </p>
                                             <p class="lead">
                                                Comments: <b>______________</b>
                                             </p>
                                             <p class="lead">
                                                Place, Date <b>______________</b>
                                             </p>
                                             <p class="m-5">
                                                Signature of the supervisor of the internship provider  <b>_____________________</b> stamp
                                             </p>
                                             <a href="#" id="printPageButton" class="btn btn-sm btn-primary mb-3"
                                             onclick="
                                             const body = document.body.innerHTML ;
                                             const content =document.getElementById('request').innerHTML;
                                             document.body.innerHTML = content;
                                             document.getElementById('printPageButton').style.display = 'none';
                                             window.print();
                                             document.body.innerHTML = body;
                                             setTimeout(function(){
                                                 document.getElementById('printPageButton').style.display = 'inline-block'
                                             },2000)
                                             "
                                             class="btn btn-md btn-primary mr-2 mb-2">
                                                 <i class="fas fa-print"></i>
                                             </a>
                                 </div>
                                </div>
                            </div>
                             @elseif($requesttype == 1)
                             <div class="row my-5">
                                <div class="col-md-8 mx-auto" id="request">
                                   <div class="card-header bg-white text-center p-3 ">
                                     <img src="{{asset('images/logo/companyloo.png')}}" width="200" height="200" alt="">
                                     <h3 class="text-dark">
                                         VOCATION REQUEST
                                     </h3>
                                   </div>
                                   <div class="card-body">
                                             <p class="lead">
                                                 Name : <b>{{$empprint['name']}}</b>
                                             </p>
                                             <p class="lead">
                                                Registration Number : <b>{{$empprint['regstnbr']}}</b>
                                            </p>
                                             <p class="lead">
                                                Work in the department <b>{{$empprint['dept']}}</b> .
                                             </p>
                                             <p class="lead">
                                                 He is requesting a vacation starting from <b>________________</b> TO <b>________________</b>
                                             </p>


                                             <p class="m-5">
                                                Signature   <b>_____________________</b> stamp
                                             </p>
                                             <a href="#" id="printPageButton" class="btn btn-sm btn-primary mb-3"
                                             onclick="
                                            const body = document.body.innerHTML ;
                                             const content =document.getElementById('request').innerHTML;
                                             document.body.innerHTML = content;
                                             document.getElementById('printPageButton').style.display = 'none';
                                             window.print();
                                             document.body.innerHTML = body;
                                             setTimeout(function(){
                                                 document.getElementById('printPageButton').style.display = 'inline-block'
                                             },2000)
                                             "
                                             class="btn btn-md btn-primary mr-2 mb-2">
                                                 <i class="fas fa-print"></i>
                                             </a>
                                 </div>
                                </div>
                            </div>
                             @else
                             <div class="row my-5">
                                <div class="col-md-8 mx-auto" id="request">
                                   <div class="card-header bg-white text-center p-3 ">
                                     <img src="{{asset('images/logo/companyloo.png')}}" width="200" height="200" alt="">
                                     <h3 class="text-dark">
                                        WORK CERTIFICATE
                                     </h3>
                                   </div>
                                   <div class="card-body">
                                            <p class="lead">
                                                Name : <b>{{$empprint['name']}}</b>
                                            </p>
                                            <p class="lead">
                                            Registration Number : <b>{{$empprint['regstnbr']}}</b>
                                             </p>
                                            <p class="lead">
                                            Work in the department <b>{{$empprint['dept']}}</b> .
                                            </p>

                                            <p class="lead">
                                                date of hire <b> {{Carbon\Carbon::parse($empprint['hdate'])->format('d/m/Y')}}</b> TO <b>________________</b>
                                            </p>
                                            <p class="m-5">
                                                Signature   <b>_____________________</b> stamp
                                             </p>
                                             <a href="#" id="printPageButton" class="btn btn-sm btn-primary mb-3"
                                             onclick="
                                             const body = document.body.innerHTML ;
                                             const content =document.getElementById('request').innerHTML;
                                             document.body.innerHTML = content;
                                             document.getElementById('printPageButton').style.display = 'none';
                                             window.print();
                                             document.body.innerHTML = body;
                                             setTimeout(function(){
                                                 document.getElementById('printPageButton').style.display = 'inline-block'
                                             },2000)
                                             "
                                             class="btn btn-md btn-primary mr-2 mb-2">
                                                 <i class="fas fa-print"></i>
                                             </a>
                                 </div>
                                </div>
                            </div>
                             @endif


                       </div>

                     @else
                    <table>
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th class=" text-center">Name</th>
                                <th class=" text-center">Image</th>
                                <th class=" text-center">Reg_NBR</th>
                                <th class=" text-center">Superior</th>
                                <th class=" text-center">Departement</th>
                                <th class=" text-center">HireDate</th>
                                <th class=" text-center">Post</th>
                                <th class=" text-center">status</th>
                                <th class=" text-center"> Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($emps as $emp)


                            <tr>

                                <td>{{$emp->id}}</td>
                                <td>{{$emp->name}}</td>
                                <td><img src="{{asset($emp->image)}}" alt="emp_image" width="50" height="50" class="img-fluid rounded-circle"></td>
                                <td>{{$emp->registration}}</td>
                                <td>{{$emp->supp}}</td>
                                <td>{{$emp->dept->name}}</td>
                                <td>{{$emp->date_emb}}</td>
                                <td>{{$emp->post}}</td>
                                <td>
                                 @if ($emp->status == 1)
                                 <span class="badge bg-success">Active</span>
                                 @else
                                 <span class="badge bg-info">vocation</span>
                                 @endif
                                </td>
                                <td class="d-flex flex-row " style="column-gap: .5px">

                                    <a class="btn btn-sm btn-primary  showform"  wire:click="showAdd"  data-bs-toggle="tooltip" data-bs-placement="top" title="Add Emp" >
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <a  class="btn btn-sm btn-success"   wire:click='showedit({{$emp}})'  data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Emp">
                                        <i   class="fas fa-edit "  ></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger"  wire:click="deleteEmp({{$emp->id}})" type="submit"  data-bs-toggle="tooltip" data-bs-placement="top"title="Remove Emp">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <a class="btn btn-sm btn-info"  wire:click="print({{$emp}})"  type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Print Request">
                                        <i class="fa fa-print"></i>
                                    </a>


                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                     {{-- pagination  --}}
                     <div class="mt-2 d-flex align-items-center justify-content-center">
                        {{ $emps->links() }}
                    </div>
                    @endif
                </div>


            </div>







{{--

        <div class="form-content ">

            <div class="modal-header">
            @if ($editing == false)
                <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                </div>
                <div class="modal-body">
                    <form action=""wire:submit.prevent="addemp"  >
            @else
                <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                </div>
                <div class="modal-body">
                <form method="post" wire:submit.prevent="editemp">
            @endif

            <div class="mb-3">
                @error('name') <span class="text-danger">{{ $message }}</span><br/>  @enderror
                <label for="name" class="form-label"> Name :</label>
                <input type="text" wire:model="name" placeholder="Entre the name of departement !" class="form-control" id="name">
            </div>
            <div class="mb-3">
                @error('image') <span class="text-danger">{{ $message }}</span><br/>  @enderror
                <label for="img" class="form-label"> Image :</label>
                <input type="file" wire:model.lazy="image" placeholder="Entre the name of departement !" class="form-control" id="img">
            </div>
            <div class="mb-3">
                @error('regstnbr') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                <label for="reg" class="form-label">Regsiter Number  :</label>
                <input type="text" wire:model="regstnbr" class="form-control" placeholder="Enter the place of departement" id="reg">
            </div>
            <div class="mb-3">
                @error('dept') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                <label for="depts" class="form-label">Department  :</label>
                <select name="departments" wire:model="dept" id="depts" class="form-control">
                   <option aria-readonly="true" selected>Chose Department !</option>
                @foreach ($depts as $dept)
                    <option value="{{$dept->id}}">{{$dept->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3">
                @error('sup') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                <label for="sup" class="form-label">Sup  :</label>
                <select name="supp"  wire:model="sup" id="sup" class="form-control">
                    <option aria-readonly="true" selected>Chose Sup If ex !</option>
                    @foreach ($emps as $emp)
                        <option value="{{$emp->registration}}">{{$emp->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                @error('status') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                <label for="stat" class="form-label">Status  :</label>
                 <div class="form-check">
                   <input class="form-check-input" wire:model='status' type="radio" value="1" name="" id="" checked  >
                   <label class="form-check-label" for="">
                     Active
                   </label>
                 </div>
                 <div class="form-check">
                   <input class="form-check-input"   wire:model='status'  type="radio" value="0" name="" id="" >
                   <label class="form-check-label" for="">
                     In Vocation
                   </label>
                 </div>
            </div>
            <div class="mb-3">
                @error('hdate') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                <label for="dateh" class="form-label">HDate  :</label>
                <input type="datetime-local" wire:model="hdate"  class="form-control" placeholder="Enter theHire Date" id="dateh">
            </div>
            <div class="mb-3">
                @error('post') <span class="text-danger">{{ $message }}</span> <br/> @enderror
                <label for="post" class="form-label">Post  :</label>
                <select name="post" wire:model="post" id="post" class="form-control">
                        <option aria-readonly="true" selected>Chose Post !</option>
                        <option value="technicien">technicien</option>
                        <option value="technicien">dev inginier</option>
                        <option value="technicien">cloud ing</option>
                        <option value="technicien">stagaire</option>
                </select>
            </div>
            <button class="btn btn-primary"  type="submit" >Submit</button>
            <button class="btn btn-light" type="reset">Clear</button>
            <button type="button" class="btn btn-secondary closeform" >Close</button>
          </form>
            </div>

</div> --}}
