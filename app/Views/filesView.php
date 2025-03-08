<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
<div class="container my-4">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="navbar bg-light d-flex align-items-center ps-3 py-3 rounded mb-5">
  <ol class="breadcrumb mb-0">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>


  <!-- Actions Bar -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <button type="button" class="btn btn-primary me-2">
        <i class="bi bi-cloud-upload me-1"></i> Upload
      </button>
      <button type="button" class="btn btn-secondary me-2" disabled>
        <i class="bi bi-cloud-download"></i>
      </button>
      <div class="btn-group me-2">
        <button
          type="button"
          class="btn btn-outline-secondary dropdown-toggle"
          data-bs-toggle="dropdown">
          <i class="bi bi-gear"></i> Mass Operations
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Move selected</a></li>
          <li><a class="dropdown-item" href="#">Copy selected</a></li>
          <li><a class="dropdown-item" href="#">Remove selected</a></li>
        </ul>
      </div>
    </div>
    <div class="btn-group" role="group">
      <input
        type="radio"
        class="btn-check"
        name="file-manager-view"
        id="col-view"
        checked />
      <label class="btn btn-outline-secondary" for="col-view"><i class="bi bi-grid-3x3-gap"></i></label>

      <input
        type="radio"
        class="btn-check"
        name="file-manager-view"
        id="row-view" />
      <label class="btn btn-outline-secondary" for="row-view"><i class="bi bi-list"></i></label>
    </div>
  </div>

  <!-- File/Folder Grid -->
  <div class="row row-cols-1 row-cols-sm-3 row-cols-md-5 row-cols-lg-6 g-3 mt-5">
    <!-- Example Folder -->
    <div class="col">
      <div class="border p-3 rounded">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <!-- Checkbox -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="folderCheck1" />
          </div>
          <!-- Icon -->
          <i class="bi bi-folder-fill fs-2 text-secondary"></i>
        </div>
        <!-- Name & Date -->
        <div class="fw-semibold">Images</div>
        <small class="text-muted">02/13/2018</small>
        <!-- Dropdown Actions -->
        <div class="dropdown mt-2">
          <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-three-dots"></i>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Rename</a></li>
            <li><a class="dropdown-item" href="#">Move</a></li>
            <li><a class="dropdown-item" href="#">Copy</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Add more items as needed -->
  </div>
</div>