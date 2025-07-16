@extends('layouts.app')
@section('content')            
<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                @php
                    use App\Models\Applicant;
                    use App\Models\JobOpening;
                    use App\Models\JobApplication;
                    use App\Models\Finance;
                
                    $applicantCount = Applicant::count();
                    $jobCount = JobOpening::count();
                    $applicationCount = JobApplication::count();
                    $totalFinance = Finance::sum('amount');
                @endphp

                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>{{ $applicantCount }}</h3>
                            <p>Total Applicants</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.9-2.2 4.9-4.9S14.7 2.2 12 2.2 7.1 4.4 7.1 7.1 9.3 12 12 12zm0 2.2c-3.3 0-9.8 1.6-9.8 4.9v2.7h19.5v-2.7c0-3.3-6.5-4.9-9.7-4.9z"/></svg>
                        <a href="{{ route('client.applicants.index') }}" class="small-box-footer"> More info <i class="bi bi-link-45deg"></i> </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>{{ $jobCount }}</h3>
                            <p>Job Openings</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2z"/></svg>
                        <a href="{{ route('client.jobs.index') }}" class="small-box-footer"> More info <i class="bi bi-link-45deg"></i> </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>{{ $applicationCount }}</h3>
                            <p>Job Applications</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h16v2H4zm0 4h16v2H4zm0 4h10v2H4z"/></svg>
                        <a href="{{ route('client.job_applications.index') }}" class="small-box-footer"> More info <i class="bi bi-link-45deg"></i> </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-danger">
                        <div class="inner">
                            <h3>₱{{ number_format($totalFinance, 2) }}</h3>
                            <p>Total Finance</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4C7 4 2 8 2 13s5 9 10 9 10-4 10-9-5-9-10-9z"/></svg>
                        <a href="{{ route('client.finances.index') }}" class="small-box-footer"> More info <i class="bi bi-link-45deg"></i> </a>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</main>
@endsection
