<div class="ms-card bg-dark text-bg-dark">
  <a href="{{ route('admin.project.show', $project) }}" class="d-flex p-3 gap-3 align-items-center">
    <div class="ms-card-img">
      <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}">
    </div>
    <div class="ms-card-info">
      <p>ID: {{ $project->id }}</p>
      <p>Title: {{ ucwords($project->title) }}</p>
    </div>
  </a>
  <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-primary ms-modify"><i class="fa-solid fa-pencil"></i></a>
  @include('admin.partials.projectDelete')
</div>
