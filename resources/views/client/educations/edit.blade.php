@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Educational Background</h3>

    <form action="{{ route('client.educations.update', $education->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('client.educations.form')

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('client.educations.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
