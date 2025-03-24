<?= $this->extend('layout/sign_up_layout') ?>
<?= $this->section('pageContents') ?>
<div class="card my-5 mx-auto p-2 justify-content-center" style="width: 75%;">
<div class="d-flex align-items-center">
  <div class="flex-shrink-0 ms-3">
    <img src="<?php echo IMG.'JS&D-Logo-Dark.png'; ?>" alt="GameLogo" width=120px height=120px>
  </div>
  <div class="flex-grow-1 ms-3">
    <h1 class="display-7 fw-bold mt-2">Online Registration</h1>
  </div>
</div>
<form class="row g-3 py-3 mb-2 justify-content-center">
  <div class="col-md-3">
    <label for="inputFirstname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="inputFirstname">
  </div>
  <div class="col-md-3">
    <label for="inputMiddlename" class="form-label">Middle Name</label>
    <input type="text" class="form-control" id="inputMiddlename">
  </div>
  <div class="col-md-3">
    <label for="inputLastname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="inputLastname">
  </div>
  <div class="col-md-2">
    <label for="inputBirthdate" class="form-label">Birthdate</label>
    <input type="date" class="form-control" id="birthdate" name="birthdate">
  </div>
  <div class="col-md-6">
    <label for="inputEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail">
  </div>
  <div class="col-md-5">
    <label for="inputContactno" class="form-label">Contact Number</label>
    <input type="text" class="form-control" id="inputContactno">
  </div>
  <div class="col-11">
    <label for="inputPassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword">
  </div>
  <div class="col-11">
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
      <label class="form-check-label" for="inlineRadio1">Admin</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
      <label class="form-check-label" for="inlineRadio2">User</label>
    </div>
  </div>
  <div class="col-11">
    <button type="submit" class="btn btn-primary">Register</button>
  </div>
</form>
</div>


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