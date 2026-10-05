<x-layouts.admin>
    <h3 class="mb-4">Dashboard</h3>

    <div class="row g-3 mb-5">
        @foreach ([
            ['label' => 'Projects', 'count' => $stats['projects'], 'icon' => 'bi-kanban'],
            ['label' => 'Skills', 'count' => $stats['skills'], 'icon' => 'bi-stars'],
            ['label' => 'Experience', 'count' => $stats['experiences'], 'icon' => 'bi-briefcase'],
            ['label' => 'Certifications', 'count' => $stats['certifications'], 'icon' => 'bi-patch-check'],
            ['label' => 'Unread Messages', 'count' => $stats['unread_messages'], 'icon' => 'bi-envelope'],
        ] as $card)
            <div class="col-6 col-md-4 col-lg-2dot4" style="flex: 1 0 18%;">
                <div class="admin-card p-3 text-center">
                    <i class="bi {{ $card['icon'] }} fs-3 mb-2 d-block" style="color: var(--accent);"></i>
                    <h4 class="mb-0">{{ $card['count'] }}</h4>
                    <small class="text-secondary">{{ $card['label'] }}</small>
                </div>
            </div>
        @endforeach
    </div>

    <div class="admin-card p-4">
        <h5 class="mb-3">Recent Messages</h5>
        @forelse ($recentMessages as $message)
            <div class="d-flex justify-content-between border-bottom py-2" style="border-color: var(--border-subtle) !important;">
                <div>
                    <strong>{{ $message->name }}</strong> — <span class="text-secondary">{{ $message->subject }}</span>
                </div>
                <small class="text-secondary">{{ $message->created_at->diffForHumans() }}</small>
            </div>
        @empty
            <p class="text-secondary mb-0">No messages yet.</p>
        @endforelse
    </div>
</x-layouts.admin>
