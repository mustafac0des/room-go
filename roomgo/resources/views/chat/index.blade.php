@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chat with GPT</h1>
    <form id="chat-form">
        @csrf
        <div class="mb-3">
            <label for="message" class="form-label">Your Message</label>
            <input type="text" class="form-control" id="message" name="message" required>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
    <div id="response" class="mt-3"></div>
</div>

<script>
document.getElementById('chat-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const message = document.getElementById('message').value;
    fetch('{{ route('chat') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ message: message })
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('response').innerText = data.response;
    })
    .catch(error => console.error('Error:', error));
});
</script>
@endsection
