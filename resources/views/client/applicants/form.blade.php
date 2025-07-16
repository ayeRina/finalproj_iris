<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="fname" class="form-control @error('fname') is-invalid @enderror"
                value="{{ old('fname', $applicant->fname ?? '') }}" required>
            @error('fname') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror"
                value="{{ old('lname', $applicant->lname ?? '') }}" required>
            @error('lname') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $applicant->email ?? '') }}" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Sex</label>
            <select name="sex" class="form-select @error('sex') is-invalid @enderror">
                <option value="">Select</option>
                <option value="Male" {{ old('sex', $applicant->sex ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('sex', $applicant->sex ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('sex') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Birthday</label>
            <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror"
                value="{{ old('birthday', $applicant->birthday ?? '') }}">
            @error('birthday') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror"
                value="{{ old('contact', $applicant->contact ?? '') }}">
            @error('contact') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3">{{ old('address', $applicant->address ?? '') }}</textarea>
            @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
</div>