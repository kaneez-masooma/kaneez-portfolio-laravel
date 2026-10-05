<x-layouts.admin>
    <h3 class="mb-4">{{ $project->exists ? 'Edit Project' : 'Add Project' }}</h3>

    <div class="admin-card p-4" style="max-width: 700px;">
        <form method="POST" action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}">
            @csrf
            @if ($project->exists) @method('PUT') @endif

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" class="form-control" required>{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Tech Stack <small class="text-secondary">(comma-separated, e.g. "Laravel, MySQL, Bootstrap")</small></label>
                <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->exists ? implode(', ', $project->tech_stack) : '') }}" class="form-control" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">GitHub URL</label>
                    <input type="url" name="github_url" value="{{ old('github_url', $project->github_url) }}" class="form-control" placeholder="https://github.com/...">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Live Demo URL</label>
                    <input type="url" name="live_url" value="{{ old('live_url', $project->live_url) }}" class="form-control" placeholder="https://...">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-3 d-flex align-items-end">
                    <div class="form-check">
                        <input type="checkbox" name="is_featured" value="1" class="form-check-input" id="featured" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="featured">Featured project</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-accent">{{ $project->exists ? 'Update' : 'Create' }} Project</button>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-accent">Cancel</a>
        </form>
    </div>
</x-layouts.admin>
