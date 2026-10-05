<x-layouts.admin>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Experience</h3>
        <a href="{{ route('admin.experiences.create') }}" class="btn btn-accent"><i class="bi bi-plus-lg me-1"></i>Add Experience</a>
    </div>

    <div class="admin-card p-3">
        <table class="table table-borderless align-middle mb-0">
            <thead>
                <tr class="text-secondary small text-uppercase">
                    <th>Role</th>
                    <th>Organization</th>
                    <th>Type</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($experiences as $experience)
                    <tr style="border-top: 1px solid var(--border-subtle);">
                        <td>{{ $experience->role }}</td>
                        <td>{{ $experience->organization }}</td>
                        <td><small class="text-secondary">{{ ucfirst($experience->type) }}</small></td>
                        <td class="text-end">
                            <a href="{{ route('admin.experiences.edit', $experience) }}" class="btn btn-sm btn-outline-accent">Edit</a>
                            <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this entry?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-secondary py-4">No experience entries yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
