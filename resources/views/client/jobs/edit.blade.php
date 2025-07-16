@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Job</h3>

    <form action="{{ route('client.jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('client.jobs.form')

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('client.jobs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
