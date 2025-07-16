@extends('layouts.app')

@section('content')
<div class="container-fluid"><p></p>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Applicants</h3>
        <a href="{{ route('client.applicants.create') }}" class="btn btn-primary">Add Applicant</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Search name or email..." value="{{ request('search') }}">
        </div>

        <div class="col-md-2">
            <select name="sex" class="form-select">
                <option value="">All Sex</option>
                <option value="Male" {{ request('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ request('sex') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="col-md-2">
            <select name="sort_birthday" class="form-select">
                <option value="">Sort by Birthday</option>
                <option value="asc" {{ request('sort_birthday') == 'asc' ? 'selected' : '' }}>Oldest First</option>
                <option value="desc" {{ request('sort_birthday') == 'desc' ? 'selected' : '' }}>Youngest First</option>
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-success w-100">Filter</button>
        </div>

        <div class="col-md-2">
            <a href="{{ route('client.applicants.index') }}" class="btn btn-secondary w-100">Reset</a>
        </div>
    </form>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Sex</th>
                <th>Birthday</th>
                <th>Contact</th>
                <th class="text-center">Actions</th>
            </tr>       
        </thead>
        <tbody>
            @forelse($applicants as $applicant)
                <tr>
                    <td>{{ $applicant->id }}</td>
                    <td>{{ $applicant->fname }} {{ $applicant->lname }}</td>
                    <td>{{ $applicant->email }}</td>
                    <td>{{ $applicant->sex }}</td>
                    <td>{{ \Carbon\Carbon::parse($applicant->birthday)->format('F d, Y')}}</td>
                    <td>{{ $applicant->contact }}</td>
                    <td class="text-center px-1">
                        <a href="{{ route('client.applicants.show', $applicant->id) }}" class="btn btn-sm btn-info me-1">View</a>
                        <a href="{{ route('client.applicants.edit', $applicant->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                        <form action="{{ route('client.applicants.destroy', $applicant->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this applicant?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-muted">No applicants found.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $applicants->links() }}
    </div>
</div>

@endsection