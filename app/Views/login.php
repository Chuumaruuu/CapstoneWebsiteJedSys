<?= $this->extend('layout/sign_up_layout') ?>
<?= $this->section('pageContents') ?>
<main>
<div class="container my-5" data-bs-theme="light">
    <div class="row justify-content-center  my-5">
        <div class="col-md-6  my-5">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class ="display-7 fw-bold">Login</h3>
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger">
                             <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <form action="<?=base_url().'verify'?>" method="post">
                        <div class="form-group">
                            <label for="inputEmail">Email address</label>
                            <input type="email" class="form-control my-3" id="inputEmail" name="Email">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control my-3" id="inputPassword" name="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block my-3">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="<?=base_url().'registration' ?>">Don't have an account? Register</a>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

<?= $this->endSection('pageContents') ?>