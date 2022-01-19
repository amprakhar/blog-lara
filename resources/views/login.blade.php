@extends('layouts.login')
@section('content')
<div class="wrapper">
  <div class="col-md-5 mx-auto">
    <div class="login-box w-100">
      <div class="card rounded-0 shadow-lg">
        <div class="card-header text-center border-0">
          <h4 class="card-title">Login</h4>
        </div>
        <div class="card-body">
          @if(Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" onclick="this.classList.add('d-none');" role="alert">
              {{Session::get('error')}}
            </div>
          @elseif(Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" onclick="this.classList.add('d-none');" role="alert">
              {{Session::get('success')}}
            </div>
          @endif

          <!-- Form Open -->
          {{ Form::open(array('url' => 'loginUser')) }}
          <div class="mb-3">
            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email', 'required']) }}
          </div>
          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="mb-3">
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Confirm Password', 'required']) }}
          </div>
          @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          
          <div class="row">
            <div class="col text-center">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </div>
        </div>
        <!-- Form Close -->
        {{ Form::close() }}

      </div>
    </div>
  </div>  
</div>
@endsection