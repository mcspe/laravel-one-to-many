<button type="button"
  class="btn btn-danger ms-project-delete"
  data-bs-toggle="modal"
  data-bs-target="#deleteModal">
  <i class="fa-solid fa-trash"></i>
</button>

<div class="modal fade"
  id="deleteModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5"
          id="exampleModalLabel">Delete {{ ucwords($project->title) }}</h1>
        <button type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete {{ ucwords($project->title) }} project?
      </div>
      <div class="modal-footer">
        <button type="button"
          class="btn btn-secondary"
          data-bs-dismiss="modal">Close</button>
        <form action="{{ route('admin.project.destroy', $project) }}"
        method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
