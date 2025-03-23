<?= $this->extend('layout/sign_up_layout') ?>
<?= $this->section('pageContents') ?>
<form class="row g-3 mx-5 my-5">
<div class="col-md-2">
    <label for="inputEmail4" class="form-label">First Name</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-4">
    <label for="inputPassword4" class="form-label">Last Name</label>
    <input type="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        <label class="form-check-label" for="inlineRadio1">Admin</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
        <label class="form-check-label" for="inlineRadio2">User</label>
      </div>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>

<!-- <div class="row justify-content-center">
<div class="card my-5 col-md-8">
  <img src="<?php echo IMG.'JS&D-Logo.png'; ?>" alt="GameLogo" width=120px height=120px>
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
</div> -->
</body>
</html>
<?= $this->endSection('pageContents') ?>