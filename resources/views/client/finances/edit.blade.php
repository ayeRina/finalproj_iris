@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Finance</h3>
    @include('client.finances.form', [
        'route' => route('client.finances.update', $finance->id),
        'method' => 'PUT',
        'finance' => $finance
    ])
</div>
@endsection
