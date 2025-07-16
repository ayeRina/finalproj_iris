@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Applicant</h2>
    <form action="{{ route('client.applicants.store') }}" method="POST">
        @csrf
        @include('client.applicants.form')
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('client.applicants.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
