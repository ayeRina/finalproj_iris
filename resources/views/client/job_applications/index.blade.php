@extends('layouts.app')

@section('content')
<div class="container-fluid"><p></p>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Job Applications</h3>
        <a href="{{ route('client.job_applications.create') }}" class="btn btn-primary">New Application</a>
    </div>

    {{-- Filters --}}
    <form method="GET" action="{{ route('client.job_applications.index') }}" class="row mb-4 g-2">
    <div class="col-md-4">
        <input type="text" name="search" class="form-control" placeholder="Search Applicant Name" value="{{ request('search') }}">
    </div>


    <div class="col-md-2">
        <input type="text" name="job_title" class="form-control" placeholder="Search Job Title" value="{{ request('job_title') }}">
    </div>

    <div class="col-md-2">
        <select name="status" class="form-select">
            <option value="">All Status</option>
            <option value="Line up" {{ request('status') == 'line up' ? 'selected' : '' }}>Line up</option>
            <option value="On process" {{ request('status') == 'on process' ? 'selected' : '' }}>On process</option>
            <option value="For interview" {{ request('status') == 'for interview' ? 'selected' : '' }}>For interview</option>
            <option value="For medical" {{ request('status') == 'for medical' ? 'selected' : '' }}>For medical</option>
            <option value="Deployed" {{ request('status') == 'deployed' ? 'selected' : '' }}>Deployed</option>

        </select>
    </div>
    <div class="col-md-2">
        <button class="btn btn-success w-100" type="submit">Filter</button>

    </div>

    <div class="col-md-2">
        <a href="{{ route('client.job_applications.index') }}" class="btn btn-secondary w-100">Reset</a>
    </div>
</form>


    {{-- Table --}}
    <div class="card-body table-responsive">
        <table class="table table-striped table-bordered w-100">
            <thead class="table-dark">
                <tr>
                    <th>Applicant</th>
                    <th>Job Title</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($applications as $application)
                    <tr>
                        <td>{{ $application->applicant->fname }} {{ $application->applicant->lname }}</td>
                        <td>{{ $application->jobOpening->job_title }}</td>
                        <td>{{ ucfirst($application->status) }}</td>
                        <td>{{ $application->remarks ?? '—' }}</td>
                        <td class="text-center">
    <div class="d-flex justify-content-center gap-1">
        <a href="{{ route('client.job_applications.show', $application->id) }}" class="btn btn-sm btn-info">View</a>
        <a href="{{ route('client.job_applications.edit', $application->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('client.job_applications.destroy', $application->id) }}" method="POST">
            @csrf @method('DELETE')
            <button onclick="return confirm('Delete this application?')" class="btn btn-sm btn-danger">Delete</button>
        </form>
    </div>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No job applications found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {{ $applications->links() }}
        </div>
    </div>
</div>
@endsection
