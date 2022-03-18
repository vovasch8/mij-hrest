<x-guest-layout>
    @include('inc.header')
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="alert alert-danger text-center" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

                <div class="container">
                    <div class="row">
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                            <div class="card border-0 shadow rounded-3 my-5">
                                <div class="card-body p-4 p-sm-5">
                                    <h3 class="card-title text-center mb-5 ">Відновлення доступу</h3>
                                    <form>
                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="form-floating mb-3">
                                            <input id="email" type="email" name="email" required autofocus  class="form-control" placeholder="name@example.com">
                                            <label for="email">Емейл</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input id="password"  type="password" name="password" required  class="form-control" placeholder="Пароль">
                                            <label for="password">Пароль</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input id="password_confirmation"  type="password" name="password_confirmation" required   class="form-control" placeholder="Повторіть пароль">
                                            <label for="password_confirmation">Повторіть пароль</label>
                                        </div>

                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Відновити доступ</button>
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

{{--                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />--}}
{{--            </div>--}}

{{--            <!-- Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />--}}
{{--            </div>--}}

{{--            <!-- Confirm Password -->--}}
{{--            <div class="mt-4">--}}
{{--                <x-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--                <x-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                                    type="password"--}}
{{--                                    name="password_confirmation" required />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Reset Password') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
        </form>
    </x-auth-card>
    @include('inc.footer')
</x-guest-layout>
