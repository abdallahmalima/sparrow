@extends('layouts.apps')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 p-3">
          <div class="col-sm-6">
            <h1>Crud Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Crud Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row ">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create Crud</h3>

              <div class="card-tools">
                <a href="{{route('users.index') }}" class="btn btn-tool">
                  <i class="fas fa-list"></i></a>
              </div>
              
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-6">
                  <label for="inputName">Name</label>
                  <input type="text" id="inputName" name="name" value="{{old('name')  }}" class="form-control @error('email') form-control is-invalid @enderror">
                  @error('name')
                  <small class="text-danger">*{{ $message }}*</small> 
                  @enderror
                </div>    
                  <div class="form-group col-6">
                      <label for="inputName">Email</label>
                      <input  type="email" id="inputName" name="email" value="{{old('email')  }}" class="form-control  @error('email') form-control is-invalid @enderror">
                      @error('email')
                      <small class="text-danger">*{{ $message }}*</small> 
                      @enderror
                         
                    </div>
                      
                    <div class="form-group col-6">
                      <label for="exampleFormControlFile1">File input</label>
                      <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                      @error('image')
                      <small class="text-danger">*{{ $message }}*</small> 
                      @enderror
                    </div>
  
                <div class="form-group col-6">
                  <label for="inputName">Password</label>
                  <input type="password" id="inputName" name="password" value="{{old('password')  }}"" class="form-control @error('email') form-control is-invalid @enderror">
                  @error('password')
                  <small class="text-danger">*{{ $message }}*</small> 
                  @enderror
                     
                </div>
                <div class="form-group col-6">
                  <label for="inputName">Confirm Password</label>
                  <input type="password" id="inputName" name="password_confirmation" value="{{old('password_confirmation')  }}"" class="form-control @error('email') form-control is-invalid @enderror">
                  @error('password_confirmation')
                  <small class="text-danger">*{{ $message }}*</small> 
                  @enderror
                     
                </div>
              <div class="form-group text-center">
                <input type="submit" value="Create new Porject" class="btn btn-success ">
               </div>
           
           
            </div>
            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection