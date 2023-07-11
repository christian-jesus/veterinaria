@extends('layouts.panel')

@section('content')

      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">New specialty 😷</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('/Specialties') }}" class="btn btn-sm btn-success">
                <i class="fas fa-reply"></i> 
                Return </a>
            </div>
          </div>
        </div>
        
        <div class="card-body">
            <form action="{{ url('/Specialties') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name of the specialty</label>
                    <input type="text" name="name" class="form-control">

                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control">

                </div>

                <button type="submit" class="btn btn-sm btn-primary">Create Specialty</button>
            </form>
        </div>

      </div>

@endsection
