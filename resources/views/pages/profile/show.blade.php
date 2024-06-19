<!-- resources/views/profile/show.blade.php -->

@extends('layouts.userDashboardLayout')

@section('title', 'Profile')

@section('content')
<div class="row justify-content-center mb-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Profile') }}</div>

            <div class="card-body">
                <div class="row">
                    <!-- Profile Picture -->
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('storage/'.$user->profile_picture ?: 'images/default-profile-picture.png') }}" alt="Profile Picture" class="img-fluid rounded-circle mb-2">
                    </div>

                    <!-- User Details -->
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>
                            <input type="text" id="username" class="form-control" value="{{ $user->username }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
                        </div>

                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
