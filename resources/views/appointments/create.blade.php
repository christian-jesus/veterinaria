<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Register query</h3>
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

            <form action="{{ url('/pacientes') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Speciality</label>
                    <select name="" id="" class="form-control">
                        @foreach ($specialties as $especialidad)
                            <option value="{{ $especialidad->id }}">
                                {{ $especialidad->name }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="email">Doctor</label>
                    <select name="" id="" class="form-control"></select>
                </div>

                <div class="form-group">
                    <label for="cedula">current date</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control datepicker" placeholder="Select date" type="text"
                            value="{{ date('Y-m-d') }}" data-date-format="yyyy-mm-dd"
                            data-date-start-date="{{ date('Y-m-d') }}" data-date-end-date="+30d">
                    </div>


                </div>

                <div class="form-group">
                    <label for="address">Hours of Operation</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">

                </div>

                <div class="form-group">
                    <label for="phone">Type of query</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">

                </div>


                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </form>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
@endsection
