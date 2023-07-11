@extends('layouts.panel')

@section('content')
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Specialties 😷</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ url('/Specialties/create') }}" class="btn btn-sm btn-primary">New specialty 🫡</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if (session('notification'))
                <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                </div>
            @endif
        </div>

        <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">options</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($specialties as $specialidad)
                        <tr>
                            <th scope="row">
                                {{ $specialidad->name }}
                            </th>
                            <td>
                                {{ $specialidad->description }}
                            </td>
                            <td>

                                <form action="{{ url('/Specialties/' . $specialidad->id) }} " method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ url('/Specialties/' . $specialidad->id . '/edit') }} "
                                        class="btn btn-sm btn-primary">Edit</a>

                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                                </form>

                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
