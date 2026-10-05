<div class="glass-card card-glow h-100 d-flex flex-column overflow-hidden">
    {{-- Image or styled placeholder if no image_path set yet --}}
    <div style="height: 180px; background: var(--gradient-accent); opacity: 0.85; display: flex; align-items: center; justify-content: center;">
        @if ($project->image_path)
            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" style="width:100%; height:100%; object-fit: cover;" loading="lazy">
        @else
            <i class="bi bi-code-slash" style="font-size: 2.5rem; color: rgba(0,0,0,0.3);"></i>
        @endif
    </div>

    <div class="p-4 d-flex flex-column flex-grow-1">
        <h5 class="font-display mb-2">{{ $project->title }}</h5>
        <p class="text-secondary small flex-grow-1">{{ $project->description }}</p>

        <div class="d-flex flex-wrap gap-2 mb-3">
            @foreach ($project->tech_stack as $tech)
                <span class="badge rounded-pill" style="background: var(--accent-soft); color: var(--accent); font-weight: 500;">{{ $tech }}</span>
            @endforeach
        </div>

        <div class="d-flex gap-2 mt-auto">
            @if ($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" class="btn btn-outline-accent btn-sm flex-grow-1">
                    <i class="bi bi-github me-1"></i>Code
                </a>
            @endif
            @if ($project->live_url)
                <a href="{{ $project->live_url }}" target="_blank" class="btn btn-accent btn-sm flex-grow-1">
                    <i class="bi bi-box-arrow-up-right me-1"></i>Live Demo
                </a>
            @endif
        </div>
    </div>
</div>
