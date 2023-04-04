<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password" class="col-sm-2 col-form-label">
                Huidig wachtwoord
            </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="current_password" name="current_password">
            </div>
            @error('current_password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password" class="col-sm-2 col-form-label">
                Nieuw wachtwoord
            </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="password" name="password">
            </div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="col-sm-2 col-form-label">
                Herhaal nieuw wachtwoord
            </label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <br />

        <div class="flex items-center gap-4">
            <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
