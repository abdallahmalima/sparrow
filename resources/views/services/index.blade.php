@extends('layouts.apps')

@section('content')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Services</h1>
            <a href="{{route('services.create') }}" class="btn btn-tool bg-info float-sm-right">
                <i class="fas fa-plus"></i></a>
                <a href="{{route('service_export_pdf') }}" class="btn btn-tool bg-success float-sm-right mr-3">
                  <i class="fas fa-download"> Generate PDF</i></a>
                  <a href="{{route('service_export_excel') }}" class="btn btn-tool bg-success float-sm-right mr-3">
                    <i class="fas fa-download"> Export Excel</i></a>
                    <a href="{{route('service_export_csv') }}" class="btn btn-tool bg-success float-sm-right mr-3">
                      <i class="fas fa-download"> Export CSV</i></a>
                    <a href="{{route('services.excels.create') }}" class="btn btn-tool bg-success float-sm-right mr-3">
                      <i class="fas fa-download"> Import Excel</i></a>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Services</h3>

          <div class="card-tools">
            <form class="form-inline ml-3" method="GET" action="{{route('services.search') }}">
                <div class="input-group input-group-sm bg-info">
                  <input class="form-control form-control-navbar" name="keyword" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
                
              </form>

              
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          Image
                      </th>
                      <th style="width: 20%">
                          Project Name
                      </th>
                      <th style="width: 30%">
                          Team Members
                      </th>
                      <th style="width: 20%">
                        Actions
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @forelse ($services as $service)
                  <tr>
                      <td>
                        @if($service->image)
                        <img class="rounded-circle" height="50" width="50" src="{{asset($service->image->url)}}"/>  
                        @endif
                      </td>
                      <td>
                          <a>
                            {{$service->title}}
                          </a>
                          <br/>
                          <small>
                              {{$service->created_at->diffForHumans()}}
                          </small>
                      </td>
                      <td>
                        {{Str::limit($service->description,19)}}
                      </td>
                      <td class="project-actions text-right">
                          
                          <form method="POST" action="{{route('services.destroy',$service) }}">
                            <a class="btn btn-info btn-sm" href="{{route('services.edit',$service) }}">
                                <i class="fas fa-pencil-alt"></i> 
                            </a>
                            @csrf
                            @method('DELETE')
                          <button onclick="return confirm('Are you Sure you to delete this ?')" class="btn btn-danger btn-sm" type="submit">
                              <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>
                  </tr>
                  
                  @empty
                  <tr><td colspan="4" class="text-center">Records Not Found</td></tr>
                    
                  @endforelse
                  
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  
@endsection