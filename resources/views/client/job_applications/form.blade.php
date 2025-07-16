@csrf
<div class="mb-3">
    <label for="applicant_id" class="form-label">Applicant</label>
    <select name="applicant_id" id="applicant_id" class="form-select" required>
        <option value="">-- Select Applicant --</option>
        @foreach($applicants as $applicant)
            <option value="{{ $applicant->id }}" {{ old('applicant_id', $job_application->applicant_id ?? '') == $applicant->id ? 'selected' : '' }}>
                {{ $applicant->fname }} {{ $applicant->lname }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="job_opening_id" class="form-label">Job Opening</label>
    <select name="job_opening_id" id="job_opening_id" class="form-select" required>
        <option value="">-- Select Job --</option>
        @foreach($jobOpenings as $job)
            <option value="{{ $job->id }}" {{ old('job_opening_id', $job_application->job_opening_id ?? '') == $job->id ? 'selected' : '' }}>
                {{ $job->job_title }} - {{ $job->location }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-select" required>
        @php $statuses = ['line up', 'on process', 'for interview', 'for medical', 'deployed']; @endphp
        @foreach($statuses as $status)
            <option value="{{ $status }}" {{ old('status', $job_application->status ?? '') == $status ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="remarks" class="form-label">Remarks</label>
    <textarea name="remarks" id="remarks" rows="3" class="form-control">{{ old('remarks', $job_application->remarks ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-primary">Save</button>
<a href="{{ route('client.job_applications.index') }}" class="btn btn-secondary">Cancel</a>
