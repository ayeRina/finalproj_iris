@extends('layouts.app')

@section('content')
<div class="container-fluid"><p></p>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Job Openings</h3>
        <a href="{{ route('client.jobs.create') }}" class="btn btn-primary">Add New Job</a>
    </div>

    {{-- Search & Filters --}}
    <form action="{{ route('client.jobs.index') }}" method="GET" class="row g-2 mb-4">
        <div class="col-md-2">
            <input type="text" name="job_title" class="form-control" placeholder="Job Title" value="{{ request('job_title') }}">
        </div>
        <div class="col-md-2">
            <input type="text" name="location" class="form-control" placeholder="Location" value="{{ request('location') }}">
        </div>
        <div class="col-md-2">
            <select name="status" class="form-select">
                <option value="">All Status</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Expired</option>
            </select>
        </div>
        <div class="col-md-1">
            <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}">
        </div>
        <div class="col-md-1">
            <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success w-100">Filter</button>
        </div>
        <div class="col-md-2">
            <a href="{{ route('client.jobs.index') }}" class="btn btn-secondary w-100">Reset</a>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="accordion" id="jobListAccordion">
        @forelse($jobs as $job)
            <div class="accordion-item mb-2">
                <h2 class="accordion-header" id="heading{{ $job->id }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $job->id }}" aria-expanded="false" aria-controls="collapse{{ $job->id }}">
                        {{ $job->job_title }} - {{ $job->location }} ({{ ucfirst($job->status) }})
                    </button>
                </h2>
                <div id="collapse{{ $job->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $job->id }}" data-bs-parent="#jobListAccordion">
                    <div class="accordion-body">
                        <p><strong>Description:</strong> {{ $job->job_description }}</p>
                        <p><strong>Date Needed:</strong> {{ \Carbon\Carbon::parse($job->date_needed)->format('F d, Y') }}</p>
                        <p><strong>Expiry Date:</strong> {{ $job->date_expiry ? \Carbon\Carbon::parse($job->date_expiry)->format('F d, Y') : '—' }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($job->status) }}</p>
                        <div>
                            <a href="{{ route('client.jobs.edit', $job->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('client.jobs.destroy', $job->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-muted text-center">No job openings found.</div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $jobs->appends(request()->query())->links() }}
    </div>
</div>
@endsection
