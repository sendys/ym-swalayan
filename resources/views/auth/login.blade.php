@extends('layouts.login')

@section('content')

    <div class="login-box-body">
        <div class="text-center mb-4">
            <img alt="logo" src="{{ url('assets/img/logo.png') }}" style="height:150px;" class="theme-logo">
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-lg shadow-lg">
                <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-lg shadow-lg">
                <button type="button" class="close text-black" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h5 class="login-box-msg">Welcome! Please Login To Start Session</h5>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Sign In</button>
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
@endsection
