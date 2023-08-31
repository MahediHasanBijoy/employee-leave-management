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
                      <h1>Department</h1>
                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('department.index') }}" class="btn btn-warning">Departments List</a></li>
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
                          <h3 class="card-title">Create Department</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('department.store') }}" method="post">
                            @csrf
                          <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Department Name</label>
                                    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" placeholder="Enter department name">
                                  @error('name')
                                    <span id="" class="error invalid-feedback">Please enter a department name</span>
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

@endsection