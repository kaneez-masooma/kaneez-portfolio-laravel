<x-layouts.admin>
    <h3 class="mb-4">Messages</h3>

    <div class="admin-card p-3">
        <table class="table table-borderless align-middle mb-0">
            <thead>
                <tr class="text-secondary small text-uppercase">
                    <th>From</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr style="border-top: 1px solid var(--border-subtle);">
                        <td>
                            {{ $message->name }}<br>
                            <small class="text-secondary">{{ $message->email }}</small>
                        </td>
                        <td>{{ $message->subject }}</td>
                        <td><small class="text-secondary">{{ \Illuminate\Support\Str::limit($message->message, 60) }}</small></td>
                        <td><small class="text-secondary">{{ $message->created_at->diffForHumans() }}</small></td>
                        <td class="text-end">
                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this message?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-secondary py-4">No messages yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.admin>
