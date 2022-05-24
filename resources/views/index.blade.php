@extends('Layouts.app')

@section('content')
    <h1 class="text-primary my-5">Upload Your Image</h1>
    <div>
        <form class="shadow p-3" action="{{ route('store') }}" method="POST" enctype="multipart/form-data" style="width:32rem">
            @csrf
            @error("image")
                <p class="text-danger">{{{ $message }}}</p>
            @enderror
            <div class="mb-3">
                <label class="form-label" for="image">Image</label>
                <input type="file" class="form-control p-2 italic" name="image" id="image">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
    <h1 class="text-primary my-5">
        Pictures Available
    </h1>
    <div class="row g-2 mb-5">
        @forelse($pictures as $picture)
            <div class="col-sm-3">
                <div class="card">
                    <img src="{{ URL('images/'.$picture->path) }}" alt="image">
                </div>
            </div>
        @empty
            <div class="card shadow text-center p-1">
                No Items Available
            </div>
        @endforelse
    </div>
@stop