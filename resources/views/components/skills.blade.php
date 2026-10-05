@php
    $categoryLabels = [
        'frontend' => 'Frontend Development',
'backend' => 'Backend Development',
'database' => 'Databases',
'tools' => 'Tools & Technologies',
    ];
@endphp

<section id="skills" class="section">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <p class="section-label mb-2">Skills</p>
            <h2 class="section-title font-display">What I Work With</h2>
            <p class="text-secondary">Technologies and tools I use to build modern, responsive web applications.</p>
        </div>

        @foreach ($categoryLabels as $key => $label)
            @if (isset($skills[$key]) && $skills[$key]->count())
                <div class="mb-5 reveal">
                    <h6 class="text-uppercase mb-3" style="color: var(--accent); letter-spacing: 2px; font-size: 0.85rem;">{{ $label }}</h6>
                    <div class="row g-3">
                        @foreach ($skills[$key] as $skill)
                            <div class="col-6 col-md-4 col-lg-3">
                                <div class="skill-pill h-100">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        @if ($skill->icon)
                                            <i class="bi {{ $skill->icon }}"></i>
                                        @endif
                                        <span class="fw-medium">{{ $skill->name }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>
