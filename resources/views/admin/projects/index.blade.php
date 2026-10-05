<x-layouts.admin>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Projects</h3>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-accent"><i class="bi bi-plus-lg me-1"></i>Add Project</a>
    </div>

    <div class="admin-card p-3">
        <table class="table table-borderless align-middle mb-0">
            <thead>
                <tr class="text-secondary small text-uppercase">
                    <th>Title</th>
                    <th>Tech Stack</th>
                    <th>Featured</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr style="border-top: 1px solid var(--border-subtle);">
                        <td>{{ $project->title }}</td>
                        <td><small class="text-secondary">{{ implode(', ', $project->tech_stack) }}</small></td>
                        <td>{!! $project->is_featured ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-secondary">No</span>' !!}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-accent">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this project?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-secondary py-4">No projects yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
