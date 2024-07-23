@extends('layouts.admin') 

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-5 d-flex justify-content-center align-items-center">
            <div style="width: 70%; height:auto;">
                <img src="{{ $project->image }}" alt="{{ $project->title }}" style="width: 100%; min-width: 50px;border-radius:0.5rem">
            </div>
        </div>
        <div class="col-md-7">
            <h3 class="text-white text-uppercase">Edit Project</h3>
            <form action="{{ route('projects.update', $project->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <label for="url" class="text-white">Url del sito</label>
                    <input type="text" name="url" id="url" class="form-control" value="{{ $project->url }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="image" class="text-white">Immagine del sito</label>
                    <input type="text" name="image" id="image" class="form-control" value="{{ $project->image }}" required>
                </div>
        
        
                <div class="form-group mb-3">
                    <label for="title" class="text-white">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="text-white">Description</label>
                    <textarea name="description" id="description" class="form-control ">{{ $project->description }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="languages" class="text-white">Languages</label>
                    <input type="text" name="languages[]" id="languages" class="form-control" placeholder="linguaggi" value="{{ $project->languages }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection






