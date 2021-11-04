@extends('layouts.apps')

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1>Import Excel File</h1>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Home</a></li>
              <li class="breadcrumb-item active">>Import Excel File</li>
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
              <h3 class="card-title">Import Excel File</h3>

              <div class="card-tools">
                <a href="{{route('services.index') }}" class="btn btn-tool">
                  <i class="fas fa-list"></i></a>
              </div>
              
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('service_import_excel') }}" enctype="multipart/form-data">
                @csrf
              
                  <div class="form-group col-6">
                    <label for="exampleFormControlFile1">Upload File</label>
                    <input name="file" type="file" class="form-control-file" id="exampleFormControlFile1">
                    @error('file')
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