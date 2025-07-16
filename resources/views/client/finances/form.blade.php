<form action="{{ $route }}" method="POST">
    @csrf
    @if($method === 'PUT') @method('PUT') @endif

    <div class="mb-3">
        <label for="applicant_id" class="form-label">Applicant</label>
        <select name="applicant_id" id="applicant_id" class="form-select" required>
            <option value="">-- Select Applicant --</option>
            @foreach($applicants as $applicant)
                <option value="{{ $applicant->id }}" 
                    {{ old('applicant_id', $finance->applicant_id ?? '') == $applicant->id ? 'selected' : '' }}>
                    {{ $applicant->fname }} {{ $applicant->lname }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="amount" class="form-label">Amount</label>
        <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $finance->amount ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="paid_at" class="form-label">Paid At</label>
        <input type="date" name="paid_at" class="form-control" value="{{ old('paid_at', $finance->paid_at ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="purpose" class="form-label">Purpose</label>
        <textarea name="purpose" class="form-control" required>{{ old('purpose', $finance->purpose ?? '') }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('client.finances.index') }}" class="btn btn-secondary">Cancel</a>
</form>
