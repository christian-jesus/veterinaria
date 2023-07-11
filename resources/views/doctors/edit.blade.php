<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')
@section('styles')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection
@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Edit doctor 👥</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/medicos') }}" class="btn btn-sm btn-success">
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

            <form action="{{ url('/medicos/'.$doctor->id) }}" method="POST">
                @csrf
                @method('PUT') 
                <div class="form-group">
                    <label for="name">Doctor's name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name) }}" >

                </div>

                <div class="form-group">
                    <label for="specialties">Specialties</label>
                    <select name="specialties[]" id="specialties" class="form-control selectpicker" data-style="btn-primary"
                        title="seleccionar especialidades" multiple required>
                        @foreach ($specialties as $especialidad)
                        <option value="{{ $especialidad->id }}">{{ $especialidad->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email', $doctor->email) }}">

                </div>

                <div class="form-group">
                    <label for="cedula">Cedula</label>
                    <input type="text" name="cedula" class="form-control" value="{{ old('cedula', $doctor->cedula) }}">

                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', $doctor->address) }}">

                </div>

                <div class="form-group">
                    <label for="phone">mobile phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $doctor->phone) }}">

                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control">

                    <small class="text-warning">If you want to change the password, fill in the field with your new password</small>

                </div>

                <button type="submit" class="btn btn-sm btn-primary">Save the new changes</button>
            </form>
        </div>

    </div>

@endsection
@section('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(()=>{});
        $('specialties').selectpicker('val', @json($specialty_ids) );
    </script>
@endsection