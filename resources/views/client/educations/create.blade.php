@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Add Educational Background</h3>

    <form action="{{ route('client.educations.store') }}" method="POST">
        @csrf

        @include('client.educations.form', ['education' => null])

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('client.educations.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
