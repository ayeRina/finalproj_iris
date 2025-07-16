@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Add New Job</h3>

    <form action="{{ route('client.jobs.store') }}" method="POST">
        @csrf
        @include('client.jobs.form', ['job' => null])

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('client.jobs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
