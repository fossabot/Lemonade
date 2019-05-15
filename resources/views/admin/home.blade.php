@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="display-4 align-self-center">{{ __('Hello') }}, {{ Auth::user()->first_name }}!</h1>

        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
