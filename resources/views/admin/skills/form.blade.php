<x-layouts.admin>
    <h3 class="mb-4">{{ $skill->exists ? 'Edit Skill' : 'Add Skill' }}</h3>

    <div class="admin-card p-4" style="max-width: 600px;">
        <form method="POST" action="{{ $skill->exists ? route('admin.skills.update', $skill) : route('admin.skills.store') }}">
            @csrf
            @if ($skill->exists) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ old('name', $skill->name) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select" required>
                    @foreach (['frontend', 'backend', 'database', 'tools', 'exploring'] as $cat)
                        <option value="{{ $cat }}" {{ old('category', $skill->category) == $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Level <small class="text-secondary">(be honest — no inflated skill levels)</small></label>
                <select name="level" class="form-select" required>
                    @foreach (['learning' => 'Learning', 'comfortable' => 'Comfortable', 'proficient' => 'Proficient'] as $val => $label)
                        <option value="{{ $val }}" {{ old('level', $skill->level) == $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Icon class <small class="text-secondary">(optional, Bootstrap Icons, e.g. "bi-filetype-html")</small></label>
                <input type="text" name="icon" value="{{ old('icon', $skill->icon) }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $skill->sort_order) }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-accent">{{ $skill->exists ? 'Update' : 'Create' }} Skill</button>
            <a href="{{ route('admin.skills.index') }}" class="btn btn-outline-accent">Cancel</a>
        </form>
    </div>
</x-layouts.admin>
