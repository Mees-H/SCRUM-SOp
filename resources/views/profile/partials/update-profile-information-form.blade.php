<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Profiel Informatie
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Wijzig je naam en e-mailadres.
        </p>
    </header>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="col-sm-2 col-form-label">
                Naam
            </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email" class="col-sm-2 col-form-label">
                E-mail
            </label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="email" placeholder="bv: jan@gmail.com" name="email" value="{{old('email', $user->email)}}">
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        Uw e-mailadres is ongeverifieerd.

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            Klik hier om de e-mail opnieuw te sturen.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            Een nieuwe verificatielink is gestuurd naar uw e-mailadres.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <br />
        
        <div class="flex items-center gap-4">
            <button class="btn btn-primary" type="submit">Opslaan</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >Opgeslagen</p>
            @endif
        </div>
    </form>
</section>