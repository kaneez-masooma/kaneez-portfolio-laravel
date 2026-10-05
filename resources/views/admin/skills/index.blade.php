<x-layouts.admin>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Skills</h3>
        <a href="{{ route('admin.skills.create') }}" class="btn btn-accent"><i class="bi bi-plus-lg me-1"></i>Add Skill</a>
    </div>

    @foreach ($skills as $category => $items)
        <div class="admin-card p-3 mb-3">
            <h6 class="text-uppercase mb-3" style="color: var(--accent); letter-spacing: 2px; font-size: 0.8rem;">{{ ucfirst($category) }}</h6>
            <table class="table table-borderless align-middle mb-0">
                <tbody>
                    @foreach ($items as $skill)
                        <tr style="border-top: 1px solid var(--border-subtle);">
                            <td>{{ $skill->name }}</td>
                            <td><small class="text-secondary">{{ ucfirst($skill->level) }}</small></td>
                            <td class="text-end">
                                <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-sm btn-outline-accent">Edit</a>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this skill?');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</x-layouts.admin>
