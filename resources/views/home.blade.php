@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="action-row">
                        <a class="btn btn-primary" href="/posts" ><i class="fas fa-plus"></i> Posts </a>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('welcome in our project!') }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
