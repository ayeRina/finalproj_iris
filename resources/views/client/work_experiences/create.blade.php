@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Work Experience</h2>
    <form action="{{ route('client.work_experiences.store') }}" method="POST">
        @csrf
        @include('client.work_experiences.form')
        <button class="btn btn-success">Save</button>
        <a href="{{ route('client.work_experiences.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
