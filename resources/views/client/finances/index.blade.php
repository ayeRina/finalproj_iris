@extends('layouts.app')

@section('content')
<div class="container-fluid"><p></p>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Finances</h3>
        <a href="{{ route('client.finances.create') }}" class="btn btn-primary">Add Finance</a>
    </div>

    {{-- Search & Filter --}}
    <form method="GET" action="{{ route('client.finances.index') }}" class="row g-2 mb-4">
        <div class="col-md-4">
            <input type="text" name="applicant_name" class="form-control" placeholder="Search by Applicant Name" value="{{ request('applicant_name') }}">
        </div>
        <div class="col-md-4">
            <input type="text" name="purpose" class="form-control" placeholder="Search by Purpose" value="{{ request('purpose') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success w-100">Filter</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('client.finances.index') }}" class="btn btn-secondary w-100">Reset</a>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Applicant</th>
                    <th>Amount</th>
                    <th>Date Paid</th>
                    <th>Purpose</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($finances as $finance)
                    <tr>
                        <td>{{ $finance->applicant->fname }} {{ $finance->applicant->lname }}</td>
                        <td>₱{{ number_format($finance->amount, 2) }}</td>
                        <td>{{ \Carbon\Carbon::parse($finance->paid_at)->format('F d, Y') }}</td>
                        <td>{{ $finance->purpose }}</td>
                        <td class="text-center">
                            <a href="{{ route('client.finances.edit', $finance->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('client.finances.destroy', $finance->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this record?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">No finance records found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $finances->appends(request()->query())->links() }}
    </div>
</div>

@endsection
