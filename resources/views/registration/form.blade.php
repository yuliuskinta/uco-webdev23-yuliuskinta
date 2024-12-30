<x-template title="Registration">
    <div class="row justify-content-center py-3">
        <div class="col-md-7">
            <h1>Create new user</h1>
            <form class="was-validated" method="post" action="{{ route('registration.store') }}">
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
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" minlength="3" maxlength="50" value="{{ old('name') ?? '' }}" required>
                    @if($errors->has('name'))
                        <div class="text-danger">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" minlength="8" required>
                    <div class="form-text">Password must contains at least 8 characters with a lower case letter, an upper case letter, a number, and a symbol</div>
                    @if($errors->has('password'))
                        <div class="text-danger">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </div>
                <div class="mb-3 text-center">
                    Already have an account? <a href="{{ route('login') }}">Log in</a>
                </div>
            </form>
        </div>
    </div>
</x-template>
