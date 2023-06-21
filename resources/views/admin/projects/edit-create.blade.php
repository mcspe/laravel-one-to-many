@extends('layouts.app')

@section('content')

  <h2 class="w-75 px-5 mx-auto mb-3">{{ $title }}</h2>

  @if ($errors->any())
    <div class="alert alert-danger w-50 mx-auto"
      role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ $route }}" method="POST" class="w-75 my-5 mx-auto px-5" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="mb-3">
      <label for="title"
        class="form-label">Insert the project title
      </label>
      <input type="text"
        class="form-control @error('title') is-invalid @enderror"
        id="title"
        name="title"
        value="{{ old('title', $project?->title) }}">
      @error('title')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="preview"
        class="form-label">Upload a project image
      </label>
      <input type="file"
        class="form-control"
        id="preview"
        name="preview"
        value="{{ old('preview') }}"
        onchange="showImg(event)">

      <div class="img-preview m-3">
        <img id="img-preview" src="{{ $src }}" alt="" width="100">
      </div>
    </div>
    <div class="mb-3">
      <label for="summary"
        class="form-label">Insert the project summary
      </label>
      <textarea name="summary"
        id="summary"
        class="form-control">{{ old('summary', $project?->summary) }}
      </textarea>
      @error('summary')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="languages"
        class="form-label">Insert the project image languages
      </label>
      <input type="text"
        class="form-control @error('languages') is-invalid @enderror"
        id="languages"
        name="languages"
        value="{{ old('languages', $project?->languages) }}">
      @error('languages')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="link"
        class="form-label">Insert the project image link
      </label>
      <input type="text"
        class="form-control @error('link') is-invalid @enderror"
        id="link"
        name="link"
        value="{{ old('link', $project?->link) }}">
      @error('link')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <button type="submit"
      class="btn btn-primary">Submit</button>
  </form>

  <script>
    ClassicEditor
      .create(document.querySelector('#summary'))
      .catch(error => {
        console.error(error);
      });

    function showImg(e) {
      const tagImage = document.getElementById('img-preview');
      tagImage.src = URL.createObjectURL(e.target.files[0]);
    }
  </script>

@endsection
