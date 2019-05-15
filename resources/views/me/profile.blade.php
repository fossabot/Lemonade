@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Your profile') }}</div>

                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">{{ __('First name') }}</div>

                            <div class="col-md-6">
                                {{ $user->first_name  }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">{{ __('Last name') }}</div>

                            <div class="col-md-6">
                                {{ $user->last_name  }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">{{ __('Fiscal code') }}</div>

                            <div class="col-md-6">
                                @if($user->fiscal_code === null)
                                    <i>{{ __('Not specified') }}</i>
                                @else
                                    {{ $user->fiscal_code  }}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">{{ __('Birth place') }}</div>

                            <div class="col-md-6">
                                @if($user->birth_place === null)
                                    <i>{{ __('Not specified') }}</i>
                                @else
                                    {{ $user->birth_place->name  }}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">{{ __('Birthdate') }}</div>

                            <div class="col-md-6">
                                @if($user->email === null)
                                    <i>{{ __('Not specified') }}</i>
                                @else
                                    {{ $user->email  }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 20px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Your account') }}</div>

                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">{{ __('Username') }}</div>

                            <div class="col-md-6">
                                <mark>{{ $user->username }}</mark>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">{{ __('E-Mail') }}</div>

                            <div class="col-md-6">
                                @if($user->email === null)
                                    <i>{{ __('Not specified') }}</i>
                                @else
                                    {{ $user->email  }}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">{{ __('Registration IP address') }}</div>

                            <div class="col-md-6">
                                {{ $user_ip->ip }} ({{ $user_ip->country }})
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">{{ __('Registration date') }}</div>

                            <div class="col-md-6">
                                {{ $user->registration_date->formatLocalized('%A %d %B %Y') }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection
