@php
    $services = [
        ['icon' => 'bi-globe2', 'title' => 'Web Development', 'desc' => 'Responsive and modern websites built with clean, maintainable code.'],
        ['icon' => 'bi-layout-text-window', 'title' => 'Frontend Development', 'desc' => 'Interactive and responsive user interfaces that work on every device.'],
        ['icon' => 'bi-hdd-network', 'title' => 'Backend Development', 'desc' => 'APIs and server-side functionality to power your application.'],
        ['icon' => 'bi-clipboard-data', 'title' => 'Data Entry & Web Research', 'desc' => 'Accurate data entry, Excel data cleaning and web research.'],
        ['icon' => 'bi-film', 'title' => 'Video Editing', 'desc' => 'Creative video editing and digital content support.'],
    ];
@endphp

<section id="services" class="section">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <p class="section-label mb-2">Services</p>
            <h2 class="section-title font-display">What I Can Do</h2>
        </div>

        <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-md-6 col-lg-4 reveal">
                    <div class="glass-card card-glow h-100 p-4">
                        <i class="bi {{ $service['icon'] }} fs-2 mb-3 d-block" style="color: var(--accent);"></i>
                        <h6 class="font-display mb-2">{{ $service['title'] }}</h6>
                        <p class="text-secondary small mb-0">{{ $service['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
