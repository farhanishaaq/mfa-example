@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Two-Factor Authentication</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('2fa.verify') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="2fa_code" class="col-md-4 col-form-label text-md-right">2FA Code</label>

                                <div class="col-md-6">
                                    <input id="2fa_code" type="text" class="form-control @error('2fa_code') is-invalid @enderror" name="2fa_code" required autofocus>
                                    @error('2fa_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('2fa.enable') }}" class="btn btn-link">Resend Code</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

