@extends('layouts.login')
@section('content')
<div class="wrapper">
  <div class="col-md-8 col-lg-8 mx-auto">
    <div class="login-box w-100">
      <div class="card rounded-0 shadow-lg">
        <div class="card-header text-center border-0">
          <h4 class="card-title">Register your Account</h4>
        </div>
        <div class="card-body">
          @if(Session::get('error'))
            <div class="alert alert-success alert-dismissible fade show" onclick="this.classList.add('d-none');" role="alert">
              {{Session::get('error')}}
            </div>
          @endif
          
          <!-- Form Open -->
          {{ Form::open(array('url' => 'registerUser')) }}
          <div class="mb-3">
            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name', 'required']) }}
          </div>
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="mb-3">
            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email', 'required']) }}
          </div>
          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="mb-3">
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter Password', 'required']) }}
          </div>
          @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="mb-3">
            {{ Form::password('confirm_password', ['class' => 'form-control', 'placeholder' => 'Confirm Password', 'required']) }}
          </div>
          @error('confirm_password')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          
          <div class="row">
            <div class="col text-center">
              <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
          </div>
          <!-- Form Close -->
          {{ Form::close() }}
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection