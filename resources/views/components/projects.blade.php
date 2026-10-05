<section id="projects" class="section" style="background: var(--bg-elevated);">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <p class="section-label mb-2">Projects</p>
            <h2 class="section-title font-display">Things I've Built</h2>
        </div>

        <div class="row g-4">
            @forelse ($projects as $project)
                <div class="col-md-6 col-lg-4 reveal">
                    @include('components.project-card', ['project' => $project])
                </div>
            @empty
                <div class="col-12 text-center text-secondary">
                    Projects coming soon — add them from the admin panel.
                </div>
            @endforelse
        </div>
    </div>
</section>
