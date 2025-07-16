@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Create Job Application</h3>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    

    <div class="card">
        <div class="card-body">
            <form action="{{ route('client.job_applications.store') }}" method="POST">
                @include('client.job_applications.form')
            </form>
        </div>
    </div>
</div>
@endsection
