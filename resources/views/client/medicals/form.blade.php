<div class="mb-3">
    <label for="applicant_id" class="form-label">Applicant</label>
    <select name="applicant_id" class="form-select" required>
        <option value="">Select Applicant</option>
        @foreach($applicants as $applicant)
            <option value="{{ $applicant->id }}"
                {{ old('applicant_id', $medical->applicant_id ?? '') == $applicant->id ? 'selected' : '' }}>
                {{ $applicant->fname }} {{ $applicant->lname }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="exam_date" class="form-label">Exam Date</label>
    <input type="date" name="exam_date" class="form-control"
        value="{{ old('exam_date', $medical->exam_date ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="clinic_name" class="form-label">Clinic Name</label>
    <input type="text" name="clinic_name" class="form-control"
        value="{{ old('clinic_name', $medical->clinic_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="findings" class="form-label">Findings</label>
    <textarea name="findings" class="form-control">{{ old('findings', $medical->findings ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-select" required>
        <option value="pending" {{ old('status', $medical->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="fit" {{ old('status', $medical->status ?? '') == 'fit' ? 'selected' : '' }}>Fit</option>
        <option value="unfit" {{ old('status', $medical->status ?? '') == 'unfit' ? 'selected' : '' }}>Unfit</option>
    </select>
</div>
