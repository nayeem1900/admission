@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->


                        <div class="card">
                            <div class="card-header">
                                <h3>Edit User

                                    <a class="btn btn-success float-right btn-sm" href="{{route('users.view')}}"><i class="fa fa-list"></i>User List</a>
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">

                                <form method="POST" action="{{route('users.update',$editData->id)}}" id="myForm">
                                    @csrf
                                    @include('backend.layouts.message')

                                  <div class="form-row">
                                      <div class="form-group col-md-4">
                                          <label for="usertype">User Role </label>

                                              <select name="role" id="role" class="form-control">
                                                  <option value="">Select Role</option>
                                                  <option value="Admin"{{($editData->role=="Admin")?"selected":""}}>Admin</option>
                                                  <option value="Operator" {{($editData->role=="Operator")?"selected":""}}>Operator</option>

                                              </select>

                                      </div>



                                      <div class="form-group col-md-4">
                                          <label for="name" >Name</label>


                                              <input name="name" value="{{$editData->name}}" id="name" type="text" class="form-control">
                                             <font style="color:red;">{{($errors->has('name'))?($errors->first('name')): ''}}</font>



                                      </div>


                                      <div class="form-group col-md-4">
                                          <label for="email">Email</label>

                                              <input id="email" value="{{$editData->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" autofocus>
                                              <font style="color:red">{{($errors->has('email'))?($errors->first('name')): ''}}</font>


                                      </div>




                                      <div class="form-group row mb-0">
                                          <div class="col-md-4 offset-md-4">
                                              <button type="submit" class="btn btn-primary">
                                                  {{ __('Update') }}
                                              </button>

                                          </div>
                                      </div>


                                  </div>
                                </form>



                            </div><!-- /.card-body -->
                        </div>



                    </section>

                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>



    <script type="text/javascript">
        $(document).ready(function () {


            $('#myForm').validate({
                rules: {
                    "role": {
                        required: true,
                    },
                    "name": {
                        required: true,

                    },
                    "password": {
                        required: true,
                        minlength:6,

                    },
                    "email": {
                        required: true,
                        email:true,

                    }
                },

                messages: {
                    role:{
                        required:'Please Enter User Role',
                    },
                    name:{
                        required:'Please Enter User name',
                    },
                    email:{
                        required:'Please Enter User Email',
                    }


                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>


@endsection