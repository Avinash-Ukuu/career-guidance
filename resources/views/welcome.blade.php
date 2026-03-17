@extends(('auth.layouts.master'))
@section('content')
    <main class="page-wrap">
        <section class="banner" aria-label="Career Guidance banner">
            <div class="aurora aurora-one"></div>
            <div class="aurora aurora-two"></div>
            <div class="noise"></div>

            <header class="top-bar" aria-label="Banner actions">
                <p class="brand-mark">Career Compass</p>
                <div class="auth-actions">
                    <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-register">Register</a>
                </div>
            </header>

            {{-- <p class="kicker">College Project Showcase</p> --}}
            <h1>Career Guidance for Students</h1>
            <p class="subtitle">
                Discover pathways, build confidence, and choose the right future with
                smart mentoring and focused planning.
            </p>

            <div class="meta-row">
                <span class="badge">Made by <strong>JASKARAN & ISHITA</strong></span>
                <span class="pulse-dot" aria-hidden="true"></span>
            </div>

            <div class="shine" aria-hidden="true"></div>
        </section>
    </main>
@endsection
