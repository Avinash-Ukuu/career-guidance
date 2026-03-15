@extends(('auth.layouts.master'))
@section('content')
    <main class="page-wrap">
        <section class="banner">
            <div class="aurora aurora-one"></div>
            <div class="aurora aurora-two"></div>
            <div class="noise"></div>

            <p class="kicker">Register form</p>
            <h1>Create Your Account</h1>
            <p class="subtitle">
                Start your career journey with smart guidance and discover the best path for your future.
            </p>
            <!-- REGISTER FORM -->
            <div style="margin-top:40px; max-width:420px;">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->

                    <div style="margin-bottom:15px;">
                        <label style="font-weight:600;">Name</label>

                        <input type="text" name="name" value="{{ old('name') }}" required autofocus
                            style="width:100%; padding:10px; border-radius:10px; border:none; margin-top:6px;">

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->

                    <div style="margin-bottom:15px;">
                        <label style="font-weight:600;">Email</label>

                        <input type="email" name="email" value="{{ old('email') }}" required
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

                    <!-- Confirm Password -->

                    <div style="margin-bottom:15px;">
                        <label style="font-weight:600;">Confirm Password</label>

                        <input type="password" name="password_confirmation" required
                            style="width:100%; padding:10px; border-radius:10px; border:none; margin-top:6px;">

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <a href="{{ route('login') }}" style="font-size:14px; color:#cbd3ff;">
                            Already registered?
                        </a>
                        <button class="btn btn-register">
                            Register
                        </button>
                    </div>
                </form>
            </div>
            <div class="meta-row">
                <span class="badge">Made by <strong>JASKARAN</strong></span>
                <span class="pulse-dot"></span>
                <span class="live-text">
            </div>
            <div class="shine"></div>
        </section>
    </main>
@endsection
