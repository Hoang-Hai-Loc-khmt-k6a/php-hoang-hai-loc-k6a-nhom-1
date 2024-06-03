@extends('layout.master')

@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Banner Management</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Get Banners</strong>
    </h1>
@endsection

@section('Content')
@if (session('Note'))
    <div class="alert alert-success">
        {{ session('Note') }}
    </div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Title</th>
            <th class="text-center">Image</th>
            <th class="text-center">Link URL</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($banners->reverse() as $banner)
        <tr>
            <td class="text-left">{{ $banner->id }}</td>
            <td class="text-left">{{ $banner->title }}</td>
            <td class="text-left"><img src="{{ $banner->image_url }}" alt="{{ $banner->title }}" style="width: 100px;"></td>
            <td class="text-left"><a href="{{ $banner->link_url }}" target="_blank">{{ $banner->link_url }}</a></td>
            <td class="text-center">
                <a href="{{ url('updateBanner/' . $banner->id) }}">
                    <i class="fa fa-pencil fa-fw"></i>Edit
                </a>
            </td>
            <td class="text-center">
                <a href="{{ url('deleteBanner/' . $banner->id) }}">
                    <i class="fa fa-trash-o fa-fw"></i>Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
