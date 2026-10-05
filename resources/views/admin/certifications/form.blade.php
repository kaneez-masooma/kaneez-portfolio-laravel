<x-layouts.admin>
    <h3 class="mb-4">{{ $certification->exists ? 'Edit Certification' : 'Add Certification' }}</h3>

    <div class="admin-card p-4" style="max-width: 600px;">
        <form method="POST" action="{{ $certification->exists ? route('admin.certifications.update', $certification) : route('admin.certifications.store') }}">
            @csrf
            @if ($certification->exists) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ old('title', $certification->title) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Issuer</label>
                <input type="text" name="issuer" value="{{ old('issuer', $certification->issuer) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Date Earned <small class="text-secondary">(leave blank if still in progress)</small></label>
                <input type="date" name="date_earned" value="{{ old('date_earned', $certification->date_earned?->format('Y-m-d')) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Credential URL <small class="text-secondary">(optional)</small></label>
                <input type="url" name="credential_url" value="{{ old('credential_url', $certification->credential_url) }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-accent">{{ $certification->exists ? 'Update' : 'Create' }} Certification</button>
            <a href="{{ route('admin.certifications.index') }}" class="btn btn-outline-accent">Cancel</a>
        </form>
    </div>
</x-layouts.admin>
