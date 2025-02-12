@extends('layouts.admin') 
{{-- create projects --}}
@section('content')
    <div class="container py-5 mx-3">
        <h3 class="text-white text-uppercase mb-3">Create New Project</h3>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="url" class="text-white">Web-Site URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="url del sito" value="{{ old('url') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="text-white">Thumb URL</label>
                        <input type="text" name="image" id="thumb" class="form-control" placeholder="url dell'immagine" value="{{ old('image') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="title" class="text-white">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="nome del sito" value="{{ old('title') }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="categories" class="text-white">Type:</label>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option value="" disabled>seleziona categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="description" class="text-white">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="8" placeholder="descrizione">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="languages" class="text-white">Languages</label>
                        <input type="text" name="languages[]" id="languages" class="form-control" placeholder="linguaggi" value="{{ old('languages') }}">
                    </div>
                </div>
                
                <div class="col-md-12 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary mt-3">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection
