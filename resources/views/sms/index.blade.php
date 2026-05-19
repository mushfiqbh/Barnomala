@extends('layout.app')

@section('content')
    <div class="container">
        <h2>Send SMS</h2>
        <div>Balance:
            <p>Masking {{ $balance['masking_balance'] }} SMS</p>
            <p>Non-Masking {{ $balance['non_masking_balance'] }} SMS</p>
            <p>Voice {{ $balance['voice_balance'] }} SMS</p>
        </div>

        @if (session('status'))
            <div class="alert alert-info">{{ session('status') }}</div>
        @endif

        <form action="{{ route('sms.send') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Contacts (comma-separated phone numbers)</label>
                <input type="text" name="contacts[]" class="form-control" placeholder="8801XXXXXXXXX, 8801XXXXXXXXX"
                    required>
            </div>
            <button type="submit" class="btn btn-success">Send SMS</button>
        </form>
    </div>
@endsection
