<div class="container">
    <div class="alert alert-success" role="alert">
        {{ __('Link verifikasi pendaftaran telah dikirim ke alamat email Anda.') }}
    </div>

    <p>{{ __('Sebelum melanjutkan, silahkan periksa email Anda untuk verifikasi.') }}</p>
    <p>{{ __('Jika Anda tidak menerima email ') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik di sini untuk mengirim ulang') }}</button>.
        </form>
    </p>
</div>
