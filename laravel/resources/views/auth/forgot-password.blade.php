<x-guest-layout>
    @include('inc.header')
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
            </a>
        </x-slot>

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}--}}
{{--        </div>--}}

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="alert alert-danger text-center" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card border-0 shadow rounded-3 my-5">
                            <div class="card-body p-4 p-sm-5">
                                <h3 class="card-title text-center mb-5 ">Відновлення доступу</h3>
                                <form>
                                    <div class="form-floating mb-3">
                                        <input id="email" type="email" name="email" required autofocus  class="form-control" placeholder="name@example.com">
                                        <label for="email">Емейл</label>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Скинути пароль</button>
                                    </div>
                                    <hr class="my-4">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

{{--            <!-- Email Address -->--}}
{{--            <div>--}}
{{--                <x-label for="email" :value="__('Email')" />--}}

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Email Password Reset Link') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
        </form>
    </x-auth-card>
    @include('inc.footer')
</x-guest-layout>
