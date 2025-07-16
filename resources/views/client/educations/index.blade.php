@extends('layouts.app')

@section('content')
<div class="container-fluid"><p></p>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Educational Backgrounds</h3>
        <a href="{{ route('client.educations.create') }}" class="btn btn-primary">Add Educational Background</a>
    </div>

    {{-- Filter and Search --}}
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Search applicant name" value="{{ request('search') }}">
        </div>
        <div class="col-md-3">
            <input type="text" name="level" class="form-control" placeholder="Level (e.g., College)" value="{{ request('level') }}">
        </div>
        <div class="col-md-2">
            <input type="text" name="year" class="form-control" placeholder="Year Graduated" value="{{ request('year') }}">
        </div>
        <div class="col-md-2 d-grid">
            <button type="submit" class="btn btn-success">Filter</button>
        </div>
        <div class="col-md-2 d-grid">
            <a href="{{ route('client.educations.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    {{-- Table --}}
    <div class="card-body table-responsive">
        <table class="table table-striped table-bordered w-100">
            <thead class="table-dark">
                <tr>
                    <th>Applicant</th>
                    <th>School</th>
                    <th>Level</th>
                    <th>Course</th>
                    <th>Year Graduated</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($educations as $education)
                    <tr>
                        <td>{{ $education->applicant->fname }} {{ $education->applicant->lname }}</td>
                        <td>{{ $education->school_name }}</td>
                        <td>{{ $education->level }}</td>
                        <td>{{ $education->course }}</td>
                        <td>{{ $education->year_graduated }}</td>
                        <td class="text-center">
                            <a href="{{ route('client.educations.edit', $education->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('client.educations.destroy', $education->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this education record?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-muted text-center">No records found.</td></tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-3">
            {{ $educations->links() }}
        </div>
    </div>
</div>
@endsection
