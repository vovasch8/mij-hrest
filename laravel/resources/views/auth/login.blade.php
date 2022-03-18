<x-guest-layout>
    @include('inc.header')
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
{{--                <img class="site-logo" src="{{asset('storage') .'/images/hrest.png'}}" alt="Logo">--}}
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="alert alert-danger text-center" :errors="$errors" />


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card border-0 shadow rounded-3 my-5">
                            <div class="card-body p-4 p-sm-5">
                                <h3 class="card-title text-center mb-5 ">Вхід</h3>
                                <form>
                                    <div class="form-floating mb-3">
                                        <input id="email" type="email" name="email" :value="old('email')" required autofocus  class="form-control" placeholder="name@example.com">
                                        <label for="email">Емейл</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input id="password"  type="password" name="password" required autocomplete="current-password"  class="form-control" placeholder="Пароль">
                                        <label for="password">Пароль</label>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" name="remember"  id="remember_me" type="checkbox">
                                        <label class="form-check-label" for="remember_me">
                                            Запам'ятати мене
                                        </label>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Увійти</button>
                                    </div>
                                    <hr class="my-4">
                                    @if (Route::has('password.request'))
                                        <a class="link-dark" href="{{ route('password.request') }}">
                                            {{ __('Забули пароль?') }}
                                        </a>
                                    @endif
                                    @if (Route::has('register'))
                                        <a id="link-register" class="link-dark float-right" href="{{ route('register') }}">Реєстрація</a>
                                    @endif
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

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <!-- Remember Me -->--}}
{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="inline-flex items-center">--}}
{{--                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-button class="ml-3">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
        </form>
    </x-auth-card>
    @include('inc.footer')
</x-guest-layout>
