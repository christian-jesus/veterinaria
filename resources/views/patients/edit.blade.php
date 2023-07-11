<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Edit patient 🐶</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/pacientes') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-reply"></i>
                        Return </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                      <i class="fas fa-exclamation-triangle"></i>  
                      <strong>Please!</strong> {{ $error }}
                    </div>
                @endforeach
            @endif

            <form action="{{ url('/pacientes/'.$patient->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Patient name🐶</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $patient->name) }}">

                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email', $patient->email) }}">

                </div>

                <div class="form-group">
                    <label for="cedula">Cedula</label>
                    <input type="text" name="cedula" class="form-control" value="{{ old('cedula', $patient->cedula) }}">

                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', $patient->address) }}">

                </div>

                <div class="form-group">
                    <label for="phone">mobile phone</label>
                    <input type="text" name="phone" class="form-control" >
                    <small class="text-warning">If you want to change the password, fill in the field with your new password</small>

                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control" value="{{ old('password', Str::random(8)) }}">

                </div>

                <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
            </form>
        </div>

    </div>

@endsection
