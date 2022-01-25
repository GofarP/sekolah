@extends('admin.header.header-admin')

@section('content-header')
    <h1 class="h3 mb-0 text-gray-800">Settings Akun</h1>
@endsection

@section('content')


    {{-- layout ganti username --}}
    <div class="card w-75 ml-2">
        <div class="card-body">
            <h1 class="h3 mb-0 text-gray-800">Ganti Username</h1>

            <form method="POST" action="{{ route('updateUsername', auth()->user()->id) }}">
                @csrf

                <label class="mt-4">Username Anda Sekarang: <span
                        class="text-black font-weight-bold">{{ auth()->user()->username }}</span></label>

                <div class="mb-3">
                    <label for="username" class="mt-3">Username Baru:</label>
                    <input name="username" type="text" class="form-control @error('username') is-invalid @enderror"
                        placeholder="Username baru anda">

                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="mt-3">Password:</label>
                    <input name="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Password Anda">

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-success form-control">Ganti Username</button>
            </form>
        </div>
    </div>


    {{-- layout ganti katasandi --}}
    <div class="card w-75 ml-2 mt-5">
        <div class="card-body">
            <h1 class="h3 mb-0 text-gray-800">Ganti Kata Sandi</h1>

            <form method="post" action="{{ route('updatePassword', auth()->user()->id) }}">
                @csrf

                <div class="mb-3">
                    <label for="passwordlama" class="mt-3">Password Lama:</label>
                    <input name="passwordlama" type="password"
                        class="form-control @error('passwordlama') is-invalid @enderror" placeholder="Password Lama Anda">

                    @error('passwordlama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="passwordbaru" class="mt-3">Password Baru:</label>
                    <input name="passwordbaru" type="password"
                        class="form-control @error('passwordbaru') is-invalid @enderror" placeholder="Password Baru Anda">

                    @error('passwordbaru')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="konfirmasipassword" class="mt-3">Konfirmasi Password Baru:</label>
                    <input name="konfirmasipassword" type="password"
                        class="form-control @error('konfirmasipassword') is-invalid @enderror"
                        placeholder="Konfirmasi Password Baru Anda">

                    @error('konfirmasipassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <button type="submit" class="btn btn-success form-control">Ganti Kata Sandi</button>
            </form>
        </div>
    </div>


@endsection
