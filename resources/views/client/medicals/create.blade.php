@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Add Medical Record</h3>

    <form action="{{ route('client.medicals.store') }}" method="POST">
        @csrf

        @include('client.medicals.form', ['medical' => null])

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('client.medicals.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
