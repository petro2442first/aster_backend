<x-app-layout title="Verify e-mail">
    <main class="content verification">
        <form style="margin-top: 50px" class="sign-form" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div class="form-container">
                <h2 style="text-align: center; color: #fff">
                    {{ __('auth.verify_msg') }}
                </h2>
                <button type="submit" class="submit small">
                    {{ __('auth.verify_resend') }}
                </button>


                @if (session('status') == 'verification-link-sent')
                <br>
                    <b style="color: #fff; font-size: 18px; margin-top: 15px">
                        {{ __('auth.verify_status') }}
                    </b>
                @endif
            </div>
        </form>
        <form  class="sign-form" method="POST" action="{{ route('cancel-register') }}">
            @csrf
            <div class="form-container">
                <button type="submit" class="submit small">
                    {{ __('auth.verify_cancel') }}
                </button>
            </div>
        </form>
    </main>
</x-app-layout>
