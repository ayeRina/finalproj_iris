@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Work Experience</h2>
    <form action="{{ route('client.work_experiences.update', $work_experience->id) }}" method="POST">
        @csrf @method('PUT')
        @include('client.work_experiences.form', ['work_experience' => $work_experience])
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('client.work_experiences.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
