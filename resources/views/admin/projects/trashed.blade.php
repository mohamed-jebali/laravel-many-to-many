@extends('layouts.app')

@section('content')
<div class="container p-5 p-md-0">
    <div class="row justify-content-md-center justify-content-lg-around">
        @foreach($projects as $project)
        <div class="card p-0 col-12 col-md-5 col-lg-3 mb-5 me-md-4 me-lg-1">
        @if(str_starts_with($project->image, 'http'))
          <img src="{{$project->image}}" class="card-img-top" style="height: 200px" alt="{{$project->title}}">
          @else
          <img src="{{ asset('storage/' . $project->image)}}" class="card-img-top" style="height: 200px" alt="{{$project->title}}">
          @endif
            <div class="card-body">
            <h5 class="card-title"><span class='fw-bold'>ID:</span> {{$project->id}}</h5>
            <p class="card-text"><span class='fw-bold'>title: </span>{{$project->title}}</p>
            <div class="d-flex">
                <form class='delete-button mb-3 me-2' action="{{route('admin.projects.restore', $project->id)}}" method='POST'>
                          @csrf
                          @method('POST')
                   <button type="submit" class="btn btn-warning text-white hover-text-white">
                            Restore
                   </button>
                </form>
                <form class='' action="{{route('admin.projects.hardDelete', $project->id)}}" method='POST'>
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="btn btn-danger hover-text-white">
                             Remove
                    </button>
                </form>   
            </div>
            </div>
        </div>
        @endforeach

        {{ $projects->links() }}
    </div>
</div>
@endsection

