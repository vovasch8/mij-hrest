<x-guest-layout>
    @include('inc.header')
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
{{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
            </a>
        </x-slot>

{{--        <div class="mb-4 alert alert-success text-center">--}}
{{--            {{ __('Це захищена зона сайту. Будь-ласка підтвердіть ваш пароль.') }}--}}
{{--        </div>--}}

        <!-- Validation Errors -->
        <x-auth-validation-errors class="alert alert-danger text-center" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card border-0 shadow rounded-3 my-5">
                            <div class="card-body p-4 p-sm-5">
                                <h3 class="card-title text-center mb-5 ">Підтвердження паролю</h3>
                                <form>
                                    <div class="form-floating mb-3">
                                        <input id="password"  type="password" name="password" required autocomplete="current-password"  class="form-control" placeholder="Пароль">
                                        <label for="password">Пароль</label>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Підтвердити</button>
                                    </div>
                                    <hr class="my-4">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <!-- Password -->--}}
{{--            <div>--}}
{{--                <x-label for="password" :value="__('Password')" />--}}

{{--                <x-input id="password" class="block mt-1 w-full"--}}
{{--                                type="password"--}}
{{--                                name="password"--}}
{{--                                required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <div class="flex justify-end mt-4">--}}
{{--                <x-button>--}}
{{--                    {{ __('Confirm') }}--}}
{{--                </x-button>--}}
{{--            </div>--}}
        </form>
    </x-auth-card>
    @include('inc.footer')
</x-guest-layout>
