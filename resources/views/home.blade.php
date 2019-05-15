@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-4 align-self-center">{{ __('Hello') }}, {{ Auth::user()->first_name }}!</h1>

    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pending</div>

                <div class="card-body">

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
