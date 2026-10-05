<x-layouts.admin>
    <h3 class="mb-4">{{ $experience->exists ? 'Edit Experience' : 'Add Experience' }}</h3>

    <div class="admin-card p-4" style="max-width: 700px;">
        <form method="POST" action="{{ $experience->exists ? route('admin.experiences.update', $experience) : route('admin.experiences.store') }}">
            @csrf
            @if ($experience->exists) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-select" required>
                    <option value="work" {{ old('type', $experience->type) == 'work' ? 'selected' : '' }}>Work</option>
                    <option value="internship" {{ old('type', $experience->type) == 'internship' ? 'selected' : '' }}>Internship / Learning</option>
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" name="role" value="{{ old('role', $experience->role) }}" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Organization</label>
                    <input type="text" name="organization" value="{{ old('organization', $experience->organization) }}" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" class="form-control" required>{{ old('description', $experience->description) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="start_date" value="{{ old('start_date', $experience->start_date?->format('Y-m-d')) }}" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" name="end_date" value="{{ old('end_date', $experience->end_date?->format('Y-m-d')) }}" class="form-control">
                </div>
                <div class="col-md-4 mb-3 d-flex align-items-end">
                    <div class="form-check">
                        <input type="checkbox" name="is_current" value="1" class="form-check-input" id="current" {{ old('is_current', $experience->is_current) ? 'checked' : '' }}>
                        <label class="form-check-label" for="current">Currently here</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-accent">{{ $experience->exists ? 'Update' : 'Create' }} Entry</button>
            <a href="{{ route('admin.experiences.index') }}" class="btn btn-outline-accent">Cancel</a>
        </form>
    </div>
</x-layouts.admin>
