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
                      <h1>Departments</h1>
                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('department.create') }}" class="btn btn-primary">Create</a></li>
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
                          <h3 class="card-title">Departments</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- /.card-body -->
                          <div class="card-body">
                            <div class="row">
                            <table class="table table-bordered table-striped col-md-8">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th class="col-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $sl = 1;
                                @endphp
                                @foreach ($departments as $dept)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $dept->name }}</td>
                                        <td>
                                            <a href="{{ route('department.edit', $dept->id) }}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i></a>  
                                            <button type="button" class="btn btn-outline-danger btn-sm dept-delete" data-toggle="modal" data-target="#modal-danger" data-id="{{ $dept->id }}"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <!-- /.card-body -->
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
    
    <!-- Delete Modal -->
    <div class="modal fade" id="modal-danger" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Confirm Delete</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure to delete this department!</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <form action="" method="post" id="delete-form">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-outline-light">Delete</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

  <!-- Main Sidebar Container -->
  @include('components.app.sidebar')

  @include('components.app.footer')


  <script>
    var btns = document.querySelectorAll('.dept-delete');
    btns.forEach(function(btn){
        btn.addEventListener('click', function(e){
            var id = this.getAttribute('data-id');

            document.getElementById('delete-form').setAttribute('action', 'department/'+id);
        })
    })
    
  </script>
@endsection