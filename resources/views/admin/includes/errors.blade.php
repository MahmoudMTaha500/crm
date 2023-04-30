@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-dark h5">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif