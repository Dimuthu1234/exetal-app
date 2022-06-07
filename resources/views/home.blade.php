@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Customers List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Age</th>
                                            <th>Date of Birth</th>
                                            <th>Email</th>
                                            <th width="1%"></th>
                                            <th width="1%"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customers as $customer)
                                        <tr>
                                            <td>{{ $customer->id }}</td>
                                            <td>{{ $customer->first_name }}</td>
                                            <td>{{ $customer->last_name }}</td>
                                            <td>{{ $customer->age }}</td>
                                            <td>{{ $customer->dob }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>Edit</td>
                                            <td>Delete</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
