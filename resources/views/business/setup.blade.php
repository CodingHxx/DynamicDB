@extends('layout')

@section('title', 'Business Setup')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Complete Your Business Profile</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('info'))
                        <div class="alert alert-info">
                            {{ session('info') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('business.setup.store') }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="business_name" class="col-md-4 col-form-label text-md-right">Business Name</label>
                            <div class="col-md-6">
                                <input id="business_name" type="text" class="form-control" name="business_name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="db_username" class="col-md-4 col-form-label text-md-right">Database Username</label>
                            <div class="col-md-6">
                                <input id="db_username" type="text" class="form-control" name="db_username" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="db_password" class="col-md-4 col-form-label text-md-right">Database Password</label>
                            <div class="col-md-6">
                                <input id="db_password" type="password" class="form-control" name="db_password">
                                <small class="form-text text-muted">Leave blank if no password is required</small>
                            </div>
                        </div>

                        <!-- Add more fields as needed -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Business Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 