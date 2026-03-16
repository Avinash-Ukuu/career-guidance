@extends(('auth.layouts.master'))
@section('content')
    <main class="page-wrap">

        <section class="banner">

            <div class="aurora aurora-one"></div>
            <div class="aurora aurora-two"></div>
            <div class="noise"></div>

            <p class="kicker">Login Form</p>
            <h1>Career Guidance for Students</h1>

            <p class="subtitle">
                Discover pathways, build confidence, and choose the right future with
                smart mentoring and focused planning.
            </p>

            <!-- LOGIN FORM -->
            <div style="margin-top:40px; max-width:420px;">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email -->
                    <div style="margin-bottom:15px;">
                        <label style="font-weight:600;">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            style="width:100%; padding:10px; border-radius:10px; border:none; margin-top:6px;">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div style="margin-bottom:15px;">
                        <label style="font-weight:600;">Password</label>

                        <input type="password" name="password" required
                            style="width:100%; padding:10px; border-radius:10px; border:none; margin-top:6px;">

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->

                    <div style="margin-bottom:15px;">
                        <label style="display:flex; gap:6px;">
                            <input type="checkbox" name="remember">
                            Remember me
                        </label>
                    </div>
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <button class="btn btn-register">
                            Login
                        </button>
                    </div>
                </form>
            </div>
            <div class="meta-row">
                <span class="badge">Made by <strong>JASKARAN & ISHITA</strong></span>
                <span class="pulse-dot"></span>
            </div>
            <div class="shine"></div>
        </section>
    </main>
@endsection
