<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="fname" class="form-control" value="{{ old('fname', $applicant->fname ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="lname" class="form-control" value="{{ old('lname', $applicant->lname ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $applicant->email ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Sex</label>
            <select name="sex" class="form-control">
                <option value="">Select</option>
                <option value="Male" {{ old('sex', $applicant->sex ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('sex', $applicant->sex ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Birthday</label>
            <input type="date" name="birthday" class="form-control" value="{{ old('birthday', $applicant->birthday ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Contact</label>
            <input type="text" name="contact" class="form-control" value="{{ old('contact', $applicant->contact ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control">{{ old('address', $applicant->address ?? '') }}</textarea>
        </div>
    </div>
</div>
