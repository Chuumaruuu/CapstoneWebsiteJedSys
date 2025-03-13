<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>

<div class="container my-5" data-bs-theme="light">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class ="display-7 fw-bold">Login</h3>
                </div>
                <div class="card-body">
                    <form action="/login" method="post">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control my-3" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control my-3" id="password" name="password" required>
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


<?= $this->endSection('pageContents') ?>