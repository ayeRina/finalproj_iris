<div class="mb-3">
    <label for="applicant_id" class="form-label">Applicant</label>
    <select name="applicant_id" class="form-select" required>
        <option value="">Select Applicant</option>
        @foreach($applicants as $applicant)
            <option value="{{ $applicant->id }}"
                {{ old('applicant_id', $education->applicant_id ?? '') == $applicant->id ? 'selected' : '' }}>
                {{ $applicant->fname }} {{ $applicant->lname }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="school_name" class="form-label">School Name</label>
    <input type="text" name="school_name" class="form-control"
        value="{{ old('school_name', $education->school_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="level" class="form-label">Level</label>
    <select name="level" class="form-select" required>
        <option value="">Select Level</option>
        <option value="High School" {{ old('level', $education->level ?? '') == 'High School' ? 'selected' : '' }}>High School</option>
        <option value="College" {{ old('level', $education->level ?? '') == 'College' ? 'selected' : '' }}>College</option>
        <option value="Vocational" {{ old('level', $education->level ?? '') == 'Vocational' ? 'selected' : '' }}>Vocational</option>
    </select>
</div>

<div class="mb-3">
    <label for="course" class="form-label">Course</label>
    <input type="text" name="course" class="form-control"
        value="{{ old('course', $education->course ?? '') }}">
</div>

<div class="mb-3">
    <label for="year_graduated" class="form-label">Year Graduated</label>
    <input type="number" name="year_graduated" class="form-control"
        value="{{ old('year_graduated', $education->year_graduated ?? '') }}"
        min="1950" max="{{ date('Y') }}">
</div>
