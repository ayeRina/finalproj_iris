@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Applicant</h2>
    <form action="{{ route('client.applicants.update', $applicant->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('client.applicants.form', ['applicant' => $applicant])
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('client.applicants.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
