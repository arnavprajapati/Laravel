<div>
    <h1>Upload File</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p style="color:red;">{{ $error }}</p>
        @endforeach
    @endif

    @if(session('filename'))
        <p><strong>Original Name:</strong> {{ session('filename') }}</p>
    @endif

    @if(session('path'))
        <p><strong>Stored Path:</strong> {{ session('path') }}</p>

        <a href="{{ asset(session('path')) }}" target="_blank">
            View File
        </a>
    @endif

    <form action="{{ route('upload.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" >
        <button type="submit">Upload</button>
    </form>
</div>