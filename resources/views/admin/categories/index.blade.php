@extends('layouts.admin')


@section('content')
<div class="container">
    <div class="container d-flex mb-5">
        <div class="col-md-6">
            <h3 class="text-uppercase text-white card-header">categories</h3>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="" class="btn btn-secondary rounded-1 mx-4">
                <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
            </a>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th class="text-uppercase">#</th>
                <th class="text-uppercase">title</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>
                        {{ $counter++}}
                    </td>
                    <td>
                        <div>
                            <p class="text-white fw-bolder">{{ $category->title }}</p>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
