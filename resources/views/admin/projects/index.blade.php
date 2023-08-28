@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="row justify-content-md-center justify-content-lg-around">
        @if(session('created'))
             <div class="col-12 col-md-10 col-lg-11 alert alert-success">
                  {{ session('created') }}  has been created 
             </div>
             @elseif(session('delete'))
             <div class="col-12 col-md-10 col-lg-11 alert alert-warning">
                  {{ session('delete') }}  has been deleted  
             </div>
             @elseif(session('update'))
             <div class="col-12 col-md-10 col-lg-11 alert alert-primary">
                  {{ session('update') }}  has been updated  
             </div>
             @elseif(session('restored'))
             <div class="col-12 col-md-10 col-lg-11 alert alert-info">
                  {{ session('restored') }}  has been restored 
             </div>
             @elseif(session('removed'))
             <div class="col-12 col-md-10 col-lg-11 alert alert-danger">
                  {{ session('removed') }}  has been removed from DB 
             </div>
        @endif
        @foreach($projects as $project)
        <div class="card p-0 col-12 col-md-5 col-lg-3 mb-3 me-md-4 me-lg-1">
          @if(str_starts_with($project->image, 'http'))
          <img src="{{$project->image}}" class="card-img-top" style="height: 200px" alt="{{$project->title}}">
          @else
          <img src="{{ asset('storage/' . $project->image)}}" class="card-img-top" style="height: 200px" alt="{{$project->title}}">
          @endif
            <div class="card-body">
            <h5 class="card-title"><span class='fw-bold'>ID:</span> {{$project->id}}</h5>
            <p class="card-text"><span class='fw-bold'>title: </span>{{$project->title}}</p>
            <div class="row">
            <form class='delete-button' action="{{ route('admin.projects.destroy' , $project) }}" method='POST'>
                      @csrf
                      @method('DELETE')
            <div class="btn-group btn-group-sm d-flex mx-auto" role="group" aria-label="Small button group">
               <button type="button" class="btn btn-outline-primary hover-text-white">
                    <a class='text-decoration-none' href="{{ route('admin.projects.edit', $project) }}">
                      Edit
                    </a>
               </button>
               <button type="button" class="btn btn-outline-primary hover-text-white">
                    <a class='text-decoration-none' href="{{ route('admin.projects.show', $project ) }}">
                        Show
                    </a>
               </button>
               <button type="submit" class="btn btn-outline-primary delete-button hover-text-white">
                        Delete
                </button>
            </form>
            </div>
            </div>
        </div>
    </div>
    @endforeach  
    </div>
    {{ $projects->links() }}
</div>

@endsection



@section('custom-scripts-tail')
<script>
  const deleteButtons = document.querySelectorAll('.delete-button');

  deleteButtons.forEach(element => {
    element.addEventListener('submit', function (event){
      event.preventDefault();
      const popUpWindow = window.confirm('Are you sure you want to delete this Project?');
      if (popUpWindow){
        this.submit();
      }
    });
  });
</script>
@endsection
