@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Enable Two-Factor Authentication</h2>
        <p>Scan this QR code with your Google Authenticator app:</p>
        <img src="{{ $QRImage }}" alt="QR Code">
        <p>Or manually enter this code: {{ $secret }}</p>
        <form action="{{ route('2fa.verify') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="secret">Authenticator Code</label>
                <input type="text" name="secret" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Verify</button>
        </form>
    </div>
@endsection
