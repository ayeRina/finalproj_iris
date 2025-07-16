@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Medical Record</h3>

    <form action="{{ route('client.medicals.update', $medical->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('client.medicals.form')

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('client.medicals.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
