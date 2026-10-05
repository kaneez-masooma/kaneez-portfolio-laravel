<x-layouts.admin>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Certifications</h3>
        <a href="{{ route('admin.certifications.create') }}" class="btn btn-accent"><i class="bi bi-plus-lg me-1"></i>Add Certification</a>
    </div>

    <div class="admin-card p-3">
        <table class="table table-borderless align-middle mb-0">
            <thead>
                <tr class="text-secondary small text-uppercase">
                    <th>Title</th>
                    <th>Issuer</th>
                    <th>Date</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($certifications as $cert)
                    <tr style="border-top: 1px solid var(--border-subtle);">
                        <td>{{ $cert->title }}</td>
                        <td>{{ $cert->issuer }}</td>
                        <td><small class="text-secondary">{{ $cert->date_earned?->format('M Y') ?? 'In Progress' }}</small></td>
                        <td class="text-end">
                            <a href="{{ route('admin.certifications.edit', $cert) }}" class="btn btn-sm btn-outline-accent">Edit</a>
                            <form action="{{ route('admin.certifications.destroy', $cert) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this certification?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-secondary py-4">No certifications yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
