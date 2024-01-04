<div class="container-fluid">
  <div class="row justify-content-center align-items-center vh-100">
    <div class="col-6">
      <?php if (isset($data['error'])) : ?>
        <div class="alert alert-danger" role="alert">
          <?= $data['error'] ?>
        </div>
      <?php endif ?>
      <form method="post" action="<?= BASEURL ?>/login/login" class="needs-validation" novalidate>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
          <div class="invalid-feedback">
            Harap masukkan alamat email yang benar
          </div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
          <div class="invalid-feedback">
            Harap masukkan password
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
</div>

<script>
  (() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>