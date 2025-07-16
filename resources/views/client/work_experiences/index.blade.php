@extends('layouts.app')

@section('content')

<div class="container-fluid"><p></p>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Work Experiences</h3>
        <a href="{{ route('client.work_experiences.create') }}" class="btn btn-primary">Add Experience</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" class="row g-2 mb-3">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Search applicant name..." value="{{ request('search') }}">
        </div>

        <div class="col-md-4">
            <input type="text" name="position" class="form-control" placeholder="Filter by position..." value="{{ request('position') }}">
        </div>

        <div class="col-md-2">
            <button class="btn btn-success w-100">Filter</button>
        </div>

        <div class="col-md-2">
            <a href="{{ route('client.work_experiences.index') }}" class="btn btn-secondary w-100">Reset</a>
        </div>
    </form>

    <div class="table-responsive w-100">
        <table class="table table-striped table-bordered align-middle w-100">
            <thead class="table-dark">
                <tr>
                    <th>Applicant</th>
                    <th>Company</th>
                    <th>Position</th>
                    <th>Duration</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($experiences as $exp)
                    <tr>
                        <td>{{ $exp->applicant->fname }} {{ $exp->applicant->lname }}</td>
                        <td>{{ $exp->company_name }}</td>
                        <td>{{ $exp->position }}</td>
                        <td>{{ $exp->duration }}</td>
                        <td class="text-center px-1">
                            <a href="{{ route('client.work_experiences.edit', $exp->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                            <form action="{{ route('client.work_experiences.destroy', $exp->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">No records found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $experiences->links() }}
    </div>
</div>

@endsection
