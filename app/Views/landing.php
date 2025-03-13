<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>
<div class = "px-4 py-5 my-5 text-center">
<header class="bg-dark text-white text-center py-5 rounded-3">
        <h1 class ="display-1 fw-bold">Jed's Web Systems</h1>
        <div class="col-lg-6 mx-auto">
        <p class ="lead mb-4">A team composed of IT students working to create web pages in accordance to their requirements in their subject "Web Systems and Development."</p>
        </div>
        <a href="<?=base_url().'about' ?>" class="btn btn-outline-light btn-lg px-4">About</a>
    </header>
</div>
    <main class="container my-5">
    <section>
        <h2>Employees</h2>
        <!-- Employee Table -->
        <table class="table">
            <thead class = "table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </section>
    <section>
        <h2>Employers</h2>
        <table class="table">
            <thead class = "table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </section>
    </main>
<?= $this->endSection('pageContents') ?>