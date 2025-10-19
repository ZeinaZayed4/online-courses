<?php include_once 'partials/header.php' ?>
<?php include_once 'partials/page-title.php' ?>
<?php use App\Session; ?>

<!-- Login Section -->
<section id="enroll" class="enroll section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="enrollment-form-wrapper">
                    <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                        <h2>Log In</h2>
                        <p>Welcome back!</p>
                    </div>

                    <form action="handle/login.php" method="post" class="enrollment-form" data-aos="fade-up"
                          data-aos-delay="300">
                        <div class="row">
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" id="email" name="email" class="form-control" required=""
                                       autocomplete="email">
                                <?php if (Session::has('errors.email')): ?>
                                    <span class="text-danger text-sm"><?= Session::get('errors.email') ?></span>
                                    <?php Session::remove('errors.email'); endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <label for="password" class="form-label">Password *</label>
                                <input type="password" id="password" name="password" class="form-control">
                                <?php if (Session::has('errors.password')): ?>
                                    <span class="text-danger text-sm"><?= Session::get('errors.password') ?></span>
                                    <?php Session::remove('errors.password'); endif; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-enroll">
                                    <i class="bi bi-check-circle me-2"></i>
                                    Log In
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form Column -->
        </div>
    </div>
</section>
<!-- /Login Section -->

<?php include_once 'partials/footer.php' ?>
