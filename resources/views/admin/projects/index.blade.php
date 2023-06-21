@extends('layouts.app')

@section('content')
  <div class="ms-projects-container">
    @if (session('deleted'))
      <div class="alert alert-success my-3" role="alert">
        {{ session('deleted') }}
      </div>
    @endif
    @foreach ($projects as $project)
      @include('admin.partials.projectsCard')
    @endforeach
  </div>
@endsection
