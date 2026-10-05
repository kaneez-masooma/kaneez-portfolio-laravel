<section id="about" class="section">
    <div class="container">
        <div class="row gy-5 align-items-start">
            <div class="col-lg-5 reveal">
                <p class="section-label mb-2">About Me</p>
                <h2 class="section-title font-display">Kaneez Masooma</h2>
                <p class="text-secondary fs-5 mb-4">Final-Year BS Computer Science Student</p>

                <p class="text-secondary">
                   I'm a Full Stack Developer and final-year Computer Science student focused on building modern,
                    responsive and user-friendly web applications. I enjoy turning ideas into functional digital experiences
                     and continuously improving my development skills.
                </p>
                <p class="text-secondary">
                   Alongside web development, I'm exploring Artificial Intelligence,
                    Machine Learning and Data Science to expand my technical knowledge and discover new areas of technology.
                </p>
                <p class="text-secondary">I also have experience in video editing, which has strengthened my creativity, attention to detail and
                 visual storytelling skills.
                </p>
            </div>

            <div class="col-lg-7 reveal">
                <div class="glass-card card-glow p-4 p-md-5">
                    <h5 class="mb-4 font-display">Currently Learning</h5>
                    <div class="row g-3">
                        @foreach (['Artificial Intelligence', 'Machine Learning', 'Data Science', 'Advanced Laravel', 'Advanced JavaScriptL', 'Cloud/AWS'] as $item)
                            <div class="col-sm-6">
                                <div class="skill-pill d-flex align-items-center gap-2">
                                    <i class="bi bi-arrow-up-right-circle" style="color: var(--accent);"></i>
                                    <span>{{ $item }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
