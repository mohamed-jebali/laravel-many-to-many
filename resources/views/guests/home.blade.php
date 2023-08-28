@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class='text-center mb-4'>
            GUEST HOMEPAGE
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

                    Welcome to the Guest Page
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
