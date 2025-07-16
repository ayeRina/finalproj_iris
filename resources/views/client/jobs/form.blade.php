<div class="mb-3">
    <label for="job_title" class="form-label">Job Title</label>
    <input type="text" name="job_title" class="form-control" value="{{ old('job_title', $job->job_title ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="job_description" class="form-label">Job Description</label>
    <textarea name="job_description" class="form-control" rows="4">{{ old('job_description', $job->job_description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="date_needed" class="form-label">Date Needed</label>
    <input type="date" name="date_needed" class="form-control" value="{{ old('date_needed', $job->date_needed ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="date_expiry" class="form-label">Date Expiry</label>
    <input type="date" name="date_expiry" class="form-control" value="{{ old('date_expiry', $job->date_expiry ?? '') }}">
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-select" required>
        <option value="active" {{ old('status', $job->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', $job->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        <option value="expired" {{ old('status', $job->status ?? '') == 'expired' ? 'selected' : '' }}>Expired</option>
    </select>
</div>

<div class="mb-3">
    <label for="location" class="form-label">Location</label>
    <input type="text" name="location" class="form-control" value="{{ old('location', $job->location ?? '') }}">
</div>
