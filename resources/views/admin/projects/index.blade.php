@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="container d-flex mb-5">
        <div class="col-md-6">
            <h3 class="text-uppercase text-white card-header">projects</h3>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="{{ route('projects.create') }}" class="btn btn-secondary rounded-1 mx-4">
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
                {{-- <th class="text-uppercase">#</th> --}}
                <th class="text-uppercase">Thumb</th>
                <th class="text-uppercase">Title</th>
                <th class="text-uppercase">Languages</th>
                <th class="text-uppercase text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    {{-- <td>
                        {{ $counter++}}
                    </td> --}}
                    <td>
                        <div>
                            <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-100" style="max-width: 50px; min-width: 50px;">
                        </div>
                    </td>
                    <td>
                        <div>
                            <p class="text-white fw-bolder">{{ $project->title }}</p>
                            {{-- <div class="" style="max-width: 700px">
                                <p class="fs-6 fw-lighter">{{ $project->description }}</p>
                            </div> --}}
                        </div>
                    </td>
                    <td>
                       <ul>
                            @foreach (explode(',',$project->languages) as $language )

                                <li>{{ $language }}</li>

                            @endforeach
                       </ul>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info rounded-1">
                            <i class="fa-regular fa-eye" style="color: #ffffff;"></i>
                        </a>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning rounded-1">
                            <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                        </a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-1">
                                <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- paginatore --}}
    <div class="col-md-12 d-flex justify-content-end">
        {{$projects->links('vendor.pagination.bootstrap-5')}}
    </div>
</div>
@endsection
