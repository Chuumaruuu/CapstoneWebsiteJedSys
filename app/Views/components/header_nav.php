<header class="bg-dark p-2 " data-bs-theme="dark">
<div class="container-fluid">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="<?=base_url() ?>" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="<?php echo IMG.'JS&D-Logo.png'; ?>" alt="Mash" class="logo" width=60px height=60px>
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item">
                <a href="<?=base_url() ?>" class="nav-link px-3 link-body-emphasis fs-4 hvr-hang">Home</a>
            </li>
            <li class="nav-item ms-3">
                <a href="<?=base_url().'about'?>" class="nav-link px-3 link-body-emphasis fs-4 hvr-hang">About</a>
            </li>
            <li class="nav-item ms-3">
                <a href="<?=base_url().'gallery'?>" class="nav-link px-3 link-body-emphasis fs-4 hvr-hang">Gallery</a>
            </li>
            <li class="nav-item ms-3">
                <a href="<?=base_url().'gameplay'?>" class="nav-link px-3 link-body-emphasis fs-4 hvr-hang">Gameplay</a>
            </li>
            <li class="nav-item ms-3">
                <a href="<?=base_url().'forum'?>" class="nav-link px-3 link-body-emphasis fs-4 hvr-hang">Forum</a>
            </li>
        </ul>
        <?php if (isset($_SESSION['ID'])): ?>
          <?php $profileImage = !empty($_SESSION['Image'])
            ? base_url().'uploads/avatars/'.$_SESSION['Image']
              : IMG.'Default-Profile.jpg';
          ?>
            <!-- Show dropdown if session is active -->
            <div class="dropdown text-end me-5">
              <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= $profileImage ?>" alt="mdo" width="32" height="32" class="rounded-circle">
              </a>
              <ul class="dropdown-menu text-small" style="">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#userProfileModal">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?=base_url().'logout' ?>">Sign out</a></li>
              </ul>
            </div>
        <?php else: ?>
            <!-- Show login button if no session is active -->
            <div class="text-end">
                <a href="<?=base_url().'login' ?>" class="btn btn-dark me-2 fs-4">Login</a>
            </div>
        <?php endif; ?>
    </div>
</div>
</header>

<!-- Bootstrap Modal -->
<div class="modal fade" id="userProfileModal" tabindex="-1" aria-labelledby="userProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="profileModalLabel">Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-4 text-center">
          <img src="<?= $profileImage ?>" alt="mdo" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?= $_SESSION['Firstname'] . " " . $_SESSION['Lastname']; ?></h5>
          </div>
          <div class="col-lg-8">
            <ul class="list-group">
            <li class="list-group-item">
                <strong>Full Name:</strong> <?= $_SESSION['Firstname'] . " " . $_SESSION['Middlename'] . " " . $_SESSION['Lastname']; ?>
              </li>
              <li class="list-group-item">
                <strong>Email:</strong> <?= $_SESSION['Email']; ?>
              </li>
              <li class="list-group-item">
                <strong>Contact Number:</strong> <?= $_SESSION['Contactno']; ?>
              </li>
              <li class="list-group-item">
                <strong>Birthdate:</strong> <?php if (isset($_SESSION['Birthdate'])) {
                  $date = date_create($_SESSION['Birthdate']);
                    echo date_format($date, "F j, Y");
                  } else {
                    echo "Birthdate not provided";
                  } ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal" data-bs-dismiss="modal">Edit</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="<?=base_url().'updateProfile' ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-4 text-center">
            <img src="<?= $profileImage ?>" alt="mdo" class="rounded-circle img-fluid" style="width: 150px;">
            </div>
            <div class="col-lg-8">
              <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="Firstname" name="Firstname" value="<?= $_SESSION['Firstname']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="Middlename" name="Middlename" value="<?= $_SESSION['Middlename']; ?>">
              </div>
              <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="Lastname" name="Lastname" value="<?= $_SESSION['Lastname']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" value="<?= $_SESSION['Email']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="contactno" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="Contactno" name="Contactno" value="<?= $_SESSION['Contactno']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="birthdate" class="form-label">Birthdate</label>
                <input type="date" class="form-control" id="Birthdate" name="Birthdate" value="<?= $_SESSION['Birthdate']; ?>" required>
              </div>
              <div class="mb-3">
                <label for="ProfileImage" class="form-label fw-semibold">Change Picture</label>
                <input type="file" class="form-control" id="ProfileImage" name="ProfileImage" accept="image/png,image/jpeg,image/jpg">
                <small class="text-muted d-block">Max 2MB. JPG or PNG.</small>
              </div>
              <?php if (!empty($_SESSION['Image'])): ?>
                <input type="hidden" name="ExistingImage" value="<?= esc($_SESSION['Image']) ?>">
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#userProfileModal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
