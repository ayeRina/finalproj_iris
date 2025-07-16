@extends('layouts.app')

@section('content')
<div class="container-fluid"><p></p>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Medical Records</h3>
        <a href="{{ route('client.medicals.create') }}" class="btn btn-primary">Add Medical Record</a>
    </div>

    {{-- Filter/Search --}}
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Search name" value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <select name="status" class="form-select">
                <option value="">All Status</option>
                <option value="fit" {{ request('status') == 'fit' ? 'selected' : '' }}>Fit</option>
                <option value="unfit" {{ request('status') == 'unfit' ? 'selected' : '' }}>Unfit</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="sex" class="form-select">
                <option value="">All Sex</option>
                <option value="Male" {{ request('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ request('sex') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="col-md-2 d-grid">
            <button type="submit" class="btn btn-success">Filter</button>
        </div>
        <div class="col-md-2 d-grid">
            <a href="{{ route('client.medicals.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    {{-- Table --}}
    <div class="card-body table-responsive">
        <table class="table table-striped table-bordered w-100">
            <thead class="table-dark">
                <tr>
                    <th>Applicant</th>
                    <th>Exam Date</th>
                    <th>Clinic</th>
                    <th>Findings</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($medicals as $medical)
                    <tr>
                        <td>{{ $medical->applicant->fname }} {{ $medical->applicant->lname }}</td>
                        <td>{{ \Carbon\Carbon::parse($medical->exam_date)->format('F d, Y') }}</td>
                        <td>{{ $medical->clinic_name }}</td>
                        <td>{{ $medical->findings }}</td>
                        <td>{{ ucfirst($medical->status) }}</td>
                        <td class="text-center">
                            <a href="{{ route('client.medicals.edit', $medical->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('client.medicals.destroy', $medical->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this record?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center text-muted">No records found.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {{ $medicals->links() }}
        </div>
    </div>
</div>
@endsection
