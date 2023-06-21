@extends('layouts.app')

@section('content')
  <div class="ms-project-card w-75">
    <div class="ms-row">
      <h2>{{ ucwords($project->title) }}</h2>
    </div>
    <div class="ms-row">
      <p>
        <span class="ms-tag">Slug: </span>
        <span class="ms-info">{{ $project->slug }}</span>
      </p>
    </div>
    <div class="ms-row">
      <p>
        <span class="ms-tag">Preview: </span>
        <span class="ms-info">{{ $project->preview }}</span>
        <img src="{{ Vite::asset($project->preview) }}" alt="">
      </p>
    </div>
    <div class="ms-row">
      {!! $project->summary !!}
      <p>
        <span class="ms-tag">Summary: </span>
        {!! $project->summary !!}
        <p class="ms-info"></p>
      </p>
    </div>
    <div class="ms-row">
      <p>
        <span class="ms-tag">Link: </span>
        <a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a>
      </p>
    </div>
    <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-primary ms-modify"><i class="fa-solid fa-pencil"></i></a>
    @include('admin.partials.projectDelete')
  </div>
@endsection
