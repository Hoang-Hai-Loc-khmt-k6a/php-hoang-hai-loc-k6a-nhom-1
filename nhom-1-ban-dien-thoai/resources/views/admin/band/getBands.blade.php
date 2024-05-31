@extends('layout.master')

@section('header')
    <h1 class="mb-3">
        <strong>Welcome to</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Band Management</strong>
    </h1>
    <h1 class="mb-3">
        <strong>Get Band</strong>
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
            <th class="text-center">Name Band</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bands as $band)
        <tr>
            <td class="text-left">{{ $band->id }}</td> 
            <td class="text-left">{{ $band->name }}</td>
            <td class="text-left">{{ $band->company }}</td>
            <td class="text-center">
                <a href="{{ url('updateBand/' . $band->id) }}">
                    <i class="fa fa-pencil fa-fw"></i>Edit
                </a>
            </td>
            <td class="text-center">
                <a href="{{ url('deleteBand/' . $band->id) }}">
                    <i class="fa fa-trash-o fa-fw"></i>Delete
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
