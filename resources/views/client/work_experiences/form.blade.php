<div class="mb-3">
    <label>Applicant</label>
    <select name="applicant_id" class="form-control" required>
        <option value="">Select</option>
        @foreach($applicants as $applicant)
            <option value="{{ $applicant->id }}" 
                {{ old('applicant_id', $work_experience->applicant_id ?? '') == $applicant->id ? 'selected' : '' }}>
                {{ $applicant->fname }} {{ $applicant->lname }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Company Name</label>
    <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $work_experience->company_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Position</label>
    <input type="text" name="position" class="form-control" value="{{ old('position', $work_experience->position ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Duration</label>
    <input type="text" name="duration" class="form-control" value="{{ old('duration', $work_experience->duration ?? '') }}">
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $work_experience->description ?? '') }}</textarea>
</div>
