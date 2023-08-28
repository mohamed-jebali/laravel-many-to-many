@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class='text-center mb-4'>
            ADMIN HOMEPAGE
        </h1>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} <br>
                   Welcome {{ $user->name }}
                </div>
                <a href="{{ route('admin.projects.index') }}">
                    index
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
