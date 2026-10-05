<section id="contact" class="section" style="background: var(--bg-elevated);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-5 reveal">
                <p class="section-label mb-2">Contact</p>
                <h2 class="section-title font-display">Let's Build Something Together</h2>
                <p class="text-secondary">
                    Open to projects, freelance work, internships, collaboration and networking.
                    Send me a message and I'll get back to you soon.
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-7 reveal">

                @if (session('success'))
                    <div class="alert alert-success" style="background: rgba(34,197,94,0.1); color: #4ade80; border: 1px solid rgba(34,197,94,0.3);">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="glass-card p-4 p-md-5">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label text-secondary small">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="form-control bg-transparent text-white @error('name') is-invalid @enderror"
                               style="border-color: var(--border-subtle); padding: 0.75rem;">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary small">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="form-control bg-transparent text-white @error('email') is-invalid @enderror"
                               style="border-color: var(--border-subtle); padding: 0.75rem;">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-secondary small">Subject</label>
                        <input type="text" name="subject" value="{{ old('subject') }}"
                               class="form-control bg-transparent text-white @error('subject') is-invalid @enderror"
                               style="border-color: var(--border-subtle); padding: 0.75rem;">
                        @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-secondary small">Message</label>
                        <textarea name="message" rows="5"
                                  class="form-control bg-transparent text-white @error('message') is-invalid @enderror"
                                  style="border-color: var(--border-subtle); padding: 0.75rem;">{{ old('message') }}</textarea>
                        @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="btn btn-accent w-100">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
