@extends('layout.master')

@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Form</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Add Banner</strong>
    </h1>
@endsection

@section('Content')
    @if (session('Note'))
        <div class="alert alert-success">
            {{ session('Note') }}
        </div>
    @endif

    <form action="{{ url('insertBanner') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-3" style="display: grid; grid-template-columns: 1fr 1fr; grid-column-gap: 20px;">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
            <div class="mb-3">
                <label for="link_url" class="form-label">Link URL</label>
                <input type="url" class="form-control" name="link_url" id="link_url">
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image</label>
                <input type="file" class="form-control" name="image_url" id="image_url" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="btInsert">
            Add
        </button>
    </form>
@endsection
