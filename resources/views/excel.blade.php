<form action="{{ route('upload.excel') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Upload Excel:</label>
    <input type="file" name="file" required>
    <button type="submit">Enviar</button>
</form>
