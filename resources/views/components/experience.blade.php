@php
    $typeLabels = ['work' => 'Work Experience', 'internship' => 'Internship / Learning'];
@endphp

<section id="experience" class="section">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <p class="section-label mb-2">Experience</p>
            <h2 class="section-title font-display">Where I've Worked &amp; Learned</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                @foreach ($experiences as $experience)
                    <div class="timeline-item reveal">
                        <span class="badge rounded-pill mb-2" style="background: var(--accent-soft); color: var(--accent);">
                            {{ $typeLabels[$experience->type] }}
                        </span>
                        <h5 class="font-display mb-1">{{ $experience->role }}</h5>
                        <p class="mb-2" style="color: var(--accent);">{{ $experience->organization }}</p>
                        <p class="text-muted-custom small mb-2">
                            {{ $experience->start_date->format('M Y') }} –
                            {{ $experience->is_current ? 'Present' : $experience->end_date?->format('M Y') }}
                        </p>
                        <p class="text-secondary mb-0">{{ $experience->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
