@extends('layouts.app')

@section('content')
<div class="container mt-3">

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title mb-0">Job Application Details</h3>
        </div>

        <div class="card-body">

            <h5 class="text-primary">Applicant Information</h5>
            <p><strong>Name:</strong> {{ $job_application->applicant->fname }} {{ $job_application->applicant->lname }}</p>
            <p><strong>Sex:</strong> {{ $job_application->applicant->sex }}</p>
            <p><strong>Contact:</strong> {{ $job_application->applicant->contact }}</p>

            <hr>

            <h5 class="text-primary">Application Status</h5>
            <p><strong>Status:</strong> <span class="badge bg-info">{{ ucfirst($job_application->status) }}</span></p>
            <p><strong>Remarks:</strong> {{ $job_application->remarks ?? '—' }}</p>
            <p><strong>Applied At:</strong> {{ $job_application->created_at->format('F d, Y h:i A') }}</p>

            <hr>

            <h5 class="text-primary">Job Information</h5>
            <p><strong>Job Title:</strong> {{ $job_application->jobOpening->job_title }}</p>
            <p><strong>Description:</strong> {{ $job_application->jobOpening->job_description }}</p>
            <p><strong>Location:</strong> {{ $job_application->jobOpening->location }}</p>
            <p><strong>Date Needed:</strong> {{ $job_application->jobOpening->date_needed }}</p>
            <p><strong>Date Expiry:</strong> {{ $job_application->jobOpening->date_expiry }}</p>
            <p><strong>Job Status:</strong> {{ $job_application->jobOpening->status }}</p>

        </div>

        <div class="card-footer">
            <a href="{{ route('client.job_applications.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>

</div>
@endsection
