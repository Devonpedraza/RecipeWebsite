<x-layout>
    <div class="container d-flex flex-column align-items-center">
        <h2 class="my-3" style="font-size: 4rem; font-family: 'Kaushan Script', cursive;">
            Login
        </h2>
    </div>

    <!--Login Section -->
    <section class="container my-5 p-4 rounded shadow" style="background: #fff6ee; max-width: 500px">
        <h2 class="mb-3" style="
            color: #e92020;
            font-family: 'Kaushan Script', cursive;
            font-size: 2.5rem;
            letter-spacing: 1px;
            text-align: center;
        ">
            Login
        </h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Password" />
            </div>
            <button type="submit" class="btn" style="background-color: #e92020; color: #fff; border-radius: 8px">
                Login
            </button>
            @if($errors->any())
            <ul class="card-panel red lighten-4" style="margin-top: 20px;">
                @foreach($errors->all() as $error)
                <li class="red-text text-darken-4">{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </form>
    </section>
</x-layout>
