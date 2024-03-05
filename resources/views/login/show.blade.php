<x-master title="Se connecter">

    <main class="form-signin w-50  my-5 m-auto">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="h3 mb-3 fw-normal">sign in</h1>

            <div class="form-floating my-2">
                <input type="email" name="email" class="form-control h-50" placeholder="name@example.com">
                <label>Email address</label>
                @error('email')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-floating my-2">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <label>Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
        <p class="mt-5 my-5 mb-3 text-body-secondary">&copy; 2024–2025</p>

    </main>


</x-master>
