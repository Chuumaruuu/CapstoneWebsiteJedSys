<?= $this->extend('layout/sign_up_layout') ?>
<?= $this->section('pageContents') ?>
<div class="card my-5 mx-auto p-2 justify-content-center" style="width: 75%;">
<div class="d-flex align-items-center">
  <div class="flex-shrink-0 ms-3">
    <img src="<?php echo IMG.'JS&D-Logo-Dark.png'; ?>" alt="GameLogo" width=120px height=120px>
  </div>
  <div class="flex-grow-1 ms-3">
    <h1 class="display-7 fw-bold mt-2">Online Registration</h1>
    <?php if(isset($validation)): ?>
      <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
      </div>
    <?php endif; ?>
  </div>
</div>
<form class="row g-3 py-3 mb-2 justify-content-center" action="<?=base_url().'store'?>" method="post">
  <div class="col-md-3">
    <label for="inputFirstname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="inputFirstname" name="Firstname" value="<?=set_value('Firstname')?>">
  </div>
  <div class="col-md-3">
    <label for="inputMiddlename" class="form-label">Middle Name</label>
    <input type="text" class="form-control" id="inputMiddlename" name="Middlename" value="<?=set_value('Middlename')?>">
  </div>
  <div class="col-md-3">
    <label for="inputLastname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="inputLastname" name="Lastname" value="<?=set_value('Lastname')?>">
  </div>
  <div class="col-md-2">
    <label for="inputBirthdate" class="form-label">Birthdate</label>
    <input type="date" class="form-control" id="birthdate" name="Birthdate" value="<?=set_value('Birthdate')?>">
  </div>
  <div class="col-md-6">
    <label for="inputEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail" name="Email" value="<?=set_value('Email')?>">
  </div>
  <div class="col-md-5">
    <label for="inputContactno" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="inputContactno" name="Contactno" value="<?=set_value('Contactno')?>">
  </div>
  <div class="col-11">
    <label for="inputPassword" class="form-label">Password</label>
    <div class="input-group">
      <input type="password" class="form-control" id="inputPassword" name="Password">
      <button class="btn btn-outline-secondary" type="button" id="togglePassword">Show</button>
    </div>
  </div>
  <div class="col-11">
    <label for="inputConfirmpassword" class="form-label">Confirm Password</label>
    <div class="input-group">
      <input type="password" class="form-control" id="inputConfirmpassword" name="ConfirmPassword">
      <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">Show</button>
    </div>
  </div>
  <div class="col-11">
    <button type="submit" class="btn btn-primary">Register</button>
    <a href="<?=base_url().'login' ?>" class="mx-3">Already have an account? Login</a>
  </div>

</form>
</div>
<script>
  (function () {
    const toggleButtons = [
      { inputId: 'inputPassword', buttonId: 'togglePassword' },
      { inputId: 'inputConfirmpassword', buttonId: 'toggleConfirmPassword' }
    ];

    toggleButtons.forEach(({ inputId, buttonId }) => {
      const input = document.getElementById(inputId);
      const button = document.getElementById(buttonId);
      if (!input || !button) {
        return;
      }

      button.addEventListener('click', () => {
        const isPassword = input.getAttribute('type') === 'password';
        input.setAttribute('type', isPassword ? 'text' : 'password');
        button.textContent = isPassword ? 'Hide' : 'Show';
      });
    });
  })();
</script>
</body>
</html>
<?= $this->endSection('pageContents') ?>