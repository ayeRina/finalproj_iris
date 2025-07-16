@extends('layouts.app')

@section('content')
<div class="container py-3">
    <h3 class="mb-4"><i class="bi bi-person-lines-fill me-2"></i>Applicant Profile</h3>

    {{-- Applicant Info --}}
    <div class="card shadow-sm mb-4 ">
        <div class="card-header bg-dark text-white">
            <strong>Basic Information</strong>
        </div>
        <div class="card-body">
            <h5 class="card-title mb-3">{{ $applicant->fname }} {{ $applicant->lname }}</h5>
            <br><br>
            <p><strong>Email:</strong> {{ $applicant->email }}</p>
            <p><strong>Sex:</strong> <span class="badge bg-{{ $applicant->sex === 'Male' ? 'primary' : 'danger' }}">{{ $applicant->sex }}</span></p>
            <p><strong>Birthdate:</strong> {{ \Carbon\Carbon::parse($applicant->birthday)->format('F d, Y') }}</p>
            <p><strong>Contact:</strong> {{ $applicant->contact }}</p>
            <p><strong>Address:</strong> {{ $applicant->address }}</p>
        </div>
    </div>

    {{-- Grid of Sections --}}
    <div class="row g-4">
        {{-- Educations --}}
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <strong>Educational Background</strong>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse($applicant->educationalBackgrounds as $edu)
                        <li class="list-group-item">
                            <p><strong>School:</strong> {{ $edu->school_name }}</p>
                            <p><strong>Level:</strong> {{ $edu->level }}</p>
                            <p><strong>Course:</strong> {{ $edu->course ?? '—' }}</p>
                            <p><strong>Year Graduated:</strong> {{ $edu->year_graduated ?? '—' }}</p>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">No education records.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        {{-- Work Experiences --}}
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-danger text-white">
                    <strong>Work Experiences</strong>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse($applicant->workExperiences as $exp)
                        <li class="list-group-item">
                            <p><strong>Company:</strong> {{ $exp->company_name }}</p>
                            <p><strong>Position:</strong> {{ $exp->position }}</p>
                            <p><strong>Duration:</strong> {{ $exp->duration }}</p>
                            <p><strong>Description:</strong> {{ $exp->description }}</p>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">No work experience records.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        {{-- Medicals --}}
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <strong>Medical Records</strong>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse($applicant->medicals as $medical)
                        <li class="list-group-item">
                            <p><strong>Status:</strong> <span class="badge bg-secondary">{{ ucfirst($medical->status) }}</span></p>
                            <p><strong>Findings:</strong> {{ $medical->findings ?? '—' }}</p>
                            <p><strong>Clinic:</strong> {{ $medical->clinic_name }}</p>
                            <p><strong>Date Taken:</strong> {{ \Carbon\Carbon::parse($medical->exam_date)->format('F d, Y') }}</p>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">No medical records.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        {{-- Finances --}}
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-warning text-white">
                    <strong>Financial Records</strong>
                </div>
                <ul class="list-group list-group-flush">
                    @forelse($applicant->finances as $finance)
                        <li class="list-group-item">
                            <p><strong>Purpose:</strong> {{ $finance->purpose }}</p>
                            <p><strong>Amount:</strong> ₱{{ number_format($finance->amount, 2) }}</p>
                            <p><strong>Date Paid:</strong> {{ \Carbon\Carbon::parse($finance->paid_at)->format('F d, Y') }}</p>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">No financial records.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
