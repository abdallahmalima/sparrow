@extends('layouts.apps')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1>Footer Edit</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Footer Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row justify-content-md-center">
        <div class="col-md-9">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Footer</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-tool">
                  <i class="fas fa-list"></i></a>
              </div>
            </div>
            <div class="card-body">
        <form method="POST" action="{{route('footers.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="inputName">Footer Title</label>
              <input type="text" id="inputName" name="title" value="{{$footer->title??old('title')  }}"" class="form-control @error('title') form-control is-invalid @enderror">
              @error('title')
              <small class="text-danger">*{{ $message }}*</small> 
              @enderror
              </div>  
              
              <div class="form-group">
                <label for="inputName">Footer Phone</label>
                <input type="text" id="inputName" name="phone" value="{{$footer->phone??old('phone')  }}"" class="form-control @error('title') form-control is-invalid @enderror">
                @error('phone')
                <small class="text-danger">*{{ $errors->first('phone') }}*</small> 
                @enderror
                </div> 

                <div class="form-group">
                  <label for="inputName">Footer Email</label>
                  <input type="text" id="inputName" name="email" value="{{$footer->email??old('email')  }}"" class="form-control @error('title') form-control is-invalid @enderror">
                  @error('email')
                  <small class="text-danger">*{{ $errors->first('email') }}*</small> 
                  @enderror
                  </div> 

              <div class="form-group">
                <label for="inputDescription">Footer Description</label>
                <textarea id="inputDescription" name="description" class="form-control @error('title') form-control is-invalid @enderror" rows="4">{{ $footer->description??old('description') }}</textarea>
                @error('description')
                <small class="text-danger">*{{ $errors->first('description') }}*</small> 
                @enderror
              </div>

            
              
              <div class="form-group text-center">
                <input type="submit" value="Update" class="btn btn-success ">
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