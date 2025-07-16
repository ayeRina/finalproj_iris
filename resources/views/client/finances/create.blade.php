@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Add Finance</h3>
    @include('client.finances.form', ['route' => route('client.finances.store'), 'method' => 'POST'])
</div>
@endsection
