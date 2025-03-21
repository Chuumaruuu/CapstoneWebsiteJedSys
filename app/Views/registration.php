<?= $this->extend('layout/sign_up_layout') ?>
<?= $this->section('pageContents') ?>
<div class="w-100 container">
  <div>
  <img src="<?php echo IMG.'Eden Island Frontier - Logo.png'; ?>" alt="GameLogo" width=120px height=120px>
    <h1 class ="display-7 fw-bold text-center">Online Registration</h1>
    <div class="form-floating my-3">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        <label class="form-check-label" for="inlineRadio1">Admin</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
        <label class="form-check-label" for="inlineRadio2">User</label>
      </div>
    </div>
    <div class="form-floating my-3">
    <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Username" required>
      <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating my-3">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating my-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>
    <button class="btn btn-primary w-100 py-2 my-3" type="submit">Register</button>
    <p class = "mt-5 mb-3 text-body-secondary">&copy; 2025 Jed's System Analysis and Design. All rights reserved.</p>
  </form>
</div>
</body>
</html>
<?= $this->endSection('pageContents') ?>