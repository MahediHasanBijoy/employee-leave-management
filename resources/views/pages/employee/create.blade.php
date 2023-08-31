@extends('layouts.main')

@section('body-class', 'hold-transition sidebar-mini layout-fixed')

@section('content')

  <!-- Preloader -->
  @include('components.app.preloader')

  <!-- Navbar -->
  @include('components.app.navbar')
  <!-- /.navbar -->

    <!-- Main Content-->
    <div class="wrapper">
        <div class="content-wrapper">
            <!-- Content Header-->
            <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1>Employee</h1>
                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Employees</a></li>
                        <li class="breadcrumb-item active">Create</li>
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- End Content Header-->
            <!-- Content Body-->
            <section class="content">
                <div class="container-fluid">
                  <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                      <!-- jquery validation -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Create Employee</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                          <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" placeholder="Enter name" aria-describedby="exampleInputEmail1-error" aria-invalid="true">
                                  @error('name')
                                    <span id="" class="error invalid-feedback">Please enter your fullname</span>
                                  @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email" aria-describedby="exampleInputEmail1-error" aria-invalid="true">
                                    @error('email')
                                    <span id="" class="error invalid-feedback">Please enter a email address</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" name="phone" class="form-control @error('phone')is-invalid @enderror" id="phone" placeholder="Enter phone number" aria-describedby="exampleInputEmail1-error" aria-invalid="true">
                                    @error('phone')
                                    <span id="" class="error invalid-feedback">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Department</label>
                                    <select class="form-control @error('department')is-invalid @enderror" name="department">
                                    @foreach($departments as $department)
                                      <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                    </select>
                                    @error('department')
                                    <span id="" class="error invalid-feedback">Please select a department</span>
                                    @enderror
                                  </div>
                                <div class="form-group col-md-4">
                                    <label for="">Profile Picture</label> 
                
                                    <div class="custom-file">
                                      <input type="file"  class="custom-file-input @error('photo')is-invalid @enderror" id="customFile" name="photo">
                                      <label id="customFileLabel" class="custom-file-label" for="customFile">Choose file</label>
                                      @error('photo')
                                      <span id="" class="error invalid-feedback">{{ $message }}</span>
                                      @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control @error('address')is-invalid @enderror" id="address" placeholder="Enter your address" aria-describedby="address-error">
                                  <span id="address-error" class="error invalid-feedback">Please provide your address</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="exampleInputPassword1" placeholder="Password" aria-describedby="exampleInputPassword1-error">
                                    @error('password')
                                    <span id="exampleInputPassword1-error" class="error invalid-feedback">Please provide a password</span>
                                    @enderror
                                </div>
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.card -->
                      </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">
          
                    </div>
                    <!--/.col (right) -->
                  </div>
                  <!-- /.row -->
                </div><!-- /.container-fluid -->
              </section>
              <!-- End Content Body -->
        </div>
    </div>
    <!-- End Main Content-->

  <!-- Main Sidebar Container -->
  @include('components.app.sidebar')

  @include('components.app.footer')

  <script>
    // show filename when select file in customFile input field
    var fileInput = document.getElementById('customFile');
    fileInput.addEventListener('change', function(){
        var filename = this.value.split('\\').pop();
        console.log(filename)
        if(filename){
            document.getElementById('customFileLabel').innerText = filename
        }
    });
  </script>

@endsection