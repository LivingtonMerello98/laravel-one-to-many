 @extends('layouts.admin') 


@section('content')
    <div class="container py-5 mx-3">

            <h3 class="text-white text-uppercase mb-3">create new</h3>
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="url" class="text-white">Web-Site URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="url del sito" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="text-white">Thumb URL</label>
                        <input type="text" name="image" id="thumb" class="form-control" placeholder="url dell'immagine" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="title" class="text-white">Title</label>
                        <input type="text" name="title" id="title" class="form-control"  placeholder="nome del sito" required>
                    </div>
                </div>

                <div class="col-md-6 ">
                    <div class="form-group mb-3">
                        <label for="description" class="text-white">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="descrizione"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="languages" class="text-white">Languages</label>
                        <input type="text" name="languages[]" id="languages" class="form-control" placeholder="linguaggi" required>

                        {{-- <select  class="form-control" id="languages" name="languages[]">
                            <option value="PHP">PHP</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="HTML">HTML</option>
                            <option value="CSS">CSS</option>
                        </select> --}}
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mt-3">Create</button>
                </div>
            </div>
            </form>

    </div>
@endsection

