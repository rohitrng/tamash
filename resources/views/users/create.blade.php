@extends('layouts.app')
@section('main-container')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="main-content">
          <div class="breadcrumb">
            <h1>Create New User | </h1> 
            <ul>
              <li>           
                    <a class="btn btn-primary text-white" href="{{ route('users.index') }}">Go Back</a>
            </li>
            </ul>
          </div>
          <div class="separator-breadcrumb border-top"></div>
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="card-title mb-3">Form Inputs</div>
                  {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                    <div class="row">
                      <div class="col-md-6 form-group mb-3">
                        <label for="firstName1">Name</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                      </div>
                      
                      <div class="col-md-6 form-group mb-3">
                        <label for="exampleInputEmail1">Email address</label>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                        <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                      </div>
                      <div class="col-md-6 form-group mb-3">
                        <label for="phone">Password</label>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                      </div>
                      <div class="col-md-6 form-group mb-3">
                        <label for="credit1">Confirm Password</label>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                      </div>
                      <div class="col-md-6 form-group mb-3">
                      <!-- <div class="form-group"> -->
                            <strong>Role:</strong>
                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                        <!-- </div> -->
                        </div>
                      <div class="col-md-12">
                        <button class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>











{!! Form::close() !!}

@endsection