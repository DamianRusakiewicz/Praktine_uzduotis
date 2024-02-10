<form action="{{ route('conferences.register', $conference->id) }}" method="POST">
    @csrf
    <button type="submit">Register for Conference</button>
</form>
