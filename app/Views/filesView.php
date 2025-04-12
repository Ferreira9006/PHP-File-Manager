<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

<div class="container my-4">
  <?php
  // Function to render breadcrumb navigation based on the current folder.
  function renderBreadcrumb($currentFolder)
  {
    if (empty($currentFolder)) {
      return;
    }

    $parts = explode('/', $currentFolder);
    $breadcrumbPath = '';
    foreach ($parts as $index => $part) {
      $breadcrumbPath .= ($index == 0 ? '' : '/') . $part;
      echo '<li class="breadcrumb-item ' . ($index == count($parts) - 1 ? 'active' : '') . '">';
      if ($index == count($parts) - 1):
        echo htmlspecialchars($part);
      else:
        echo '<a href="/?folder=' . urlencode($breadcrumbPath) . '">' . htmlspecialchars($part) . '</a>';
      endif;
      echo '</li>';
    }
  }
  ?>

  <nav aria-label="breadcrumb" class="navbar bg-light d-flex align-items-center ps-3 py-3 rounded mb-5">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/?folder=">Home</a></li>
      <?php renderBreadcrumb($currentFolder); ?>
    </ol>
  </nav>

  <!-- File/Folder Grid -->
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 row-cols-lg-5 g-3 mt-5">
    <?php if (!empty($items)): ?>
      <?php foreach ($items as $item): ?>
        <div class="col">
          <div class="border p-3 rounded text-center">
            <div class="d-flex align-items-center justify-content-between mb-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="itemCheck_<?= htmlspecialchars($item['name']); ?>" />
              </div>
              <i class="bi <?= htmlspecialchars($item['icon']); ?> fs-2 text-secondary"></i>
            </div>
            <!-- If item is a directory, make its name clickable -->
            <?php if ($item['type'] === 'dir'): ?>
              <?php $newFolder = ($currentFolder ? $currentFolder . '/' : '') . $item['name']; ?>
              <a href="/?folder=<?= implode('/', array_map('rawurlencode', explode('/', $newFolder))); ?>" class="text-decoration-none text-reset">
                <div class="fw-semibold" data-toggle="tooltip" data-placement="bottom" title="<?= htmlspecialchars($item['name']); ?>">
                  <?= Application::customEcho(htmlspecialchars($item['name'])); ?>
                </div>
              </a>
            <?php else: ?>
              <a href="<?= $item['path']; ?>" target="_blank" class="text-decoration-none text-reset">
                <div class="fw-semibold" data-toggle="tooltip" data-placement="bottom" title="<?= htmlspecialchars($item['name']); ?>">
                  <?= Application::customEcho(htmlspecialchars($item['name'])); ?>
                </div>
              </a>
            <?php endif; ?>
            <small class="text-muted"><?= htmlspecialchars($item['modified']); ?></small>
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
      <?php endforeach; ?>
    <?php else: ?>
      <p>No items found.</p>
    <?php endif; ?>
  </div>
</div>