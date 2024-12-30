<x-template title="Log In">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-0 mb-0" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row justify-content-center py-3">
        <div class="col-md-4">
            <h1>Login</h1>
            <form class="was-validated" method="post" action="{{ route('login.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') ?? '' }}" required>
                    @if($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                    @if($errors->has('password'))
                        <div class="text-danger">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
                <div class="mb-3 text-center">
                    Doesn't have an account? <a href="{{ route('registration') }}">Register</a>
                </div>
            </form>
        </div>
    </div>
</x-template>
