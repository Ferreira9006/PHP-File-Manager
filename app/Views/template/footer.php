<?php if (isset($_SESSION['toast_message'])): ?>
  <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;" aria-live="polite" aria-atomic="true">
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">
          <?= ($_SESSION['toast_message']['type'] == 'success') ? 'Success' : 'Error'; ?>
        </strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        <?= htmlspecialchars($_SESSION['toast_message']['message']); ?>
      </div>
    </div>
  </div>
  <?php unset($_SESSION['toast_message']); ?>
<?php endif; ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>