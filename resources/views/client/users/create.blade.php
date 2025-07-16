@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-3">
    <div class="col-md-6">
        <div class="card">
    <div class="card-header">
        <h3 class="card-title">Add New User</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ url('client/users') }}" method="POST">
        @csrf
        @include('client.users.form')
        <!-- /.card-body -->
        <div class="card-footer d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
 </div>

    </div>
</div>
</div>
@endsection