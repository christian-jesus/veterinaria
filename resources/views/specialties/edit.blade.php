@extends('layouts.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Edit specialty 😷</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/Specialties') }}" class="btn btn-sm btn-success">
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
            
            <form action="{{ url('/Specialties/'.$specialty->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name of the specialty</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $specialty->name) }}" required>

                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description', $specialty->description) }}">

                </div>

                <button type="submit" class="btn btn-sm btn-primary">Save Specialty</button>
            </form>
        </div>

    </div>

@endsection
