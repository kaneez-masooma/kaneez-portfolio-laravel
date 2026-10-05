<section id="certifications" class="section" style="background: var(--bg-elevated);">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <p class="section-label mb-2">Certifications</p>
            <h2 class="section-title font-display">Training &amp; Certificates</h2>
        </div>

        <div class="row g-4">
            @forelse ($certifications as $cert)
                <div class="col-md-6 col-lg-3 reveal">
                    <div class="glass-card card-glow h-100 p-4 text-center">

                        <i class="bi bi-patch-check fs-2 mb-3 d-block"
                           style="color: var(--accent);"></i>

                        <h6 class="font-display mb-1">
                            {{ $cert->title }}
                        </h6>

                        <p class="text-secondary small mb-0">
                            {{ $cert->issuer }}
                        </p>

                        @if ($cert->credential_url)
                            <a href="{{ $cert->credential_url }}"
                               target="_blank"
                               rel="noopener"
                               class="small d-inline-block mt-3"
                               style="color: var(--accent);">
                                View Credential
                            </a>
                        @endif

                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-secondary">
                    Certifications coming soon.
                </div>
            @endforelse
        </div>
    </div>
</section>