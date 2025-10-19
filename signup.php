<?php include_once 'partials/header.php' ?>
<?php include_once 'partials/page-title.php'; ?>
<?php use App\Session; ?>

<!-- Signup Section -->
<section id="enroll" class="enroll section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="enrollment-form-wrapper">
                    <div class="enrollment-header text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                        <h2>Sign Up</h2>
                        <p>Take the next step in your educational/teaching journey.</p>
                    </div>

                    <form action="handle/register.php" method="post" class="enrollment-form" data-aos="fade-up"
                          data-aos-delay="300">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username" class="form-label">Username *</label>
                                    <input type="text" id="username" name="username" class="form-control"
                                           autocomplete="given-name">
                                    <?php if (Session::has('errors.username')): ?>
                                        <span class="text-danger text-sm"><?= Session::get('errors.username') ?></span>
                                        <?php Session::remove('errors.username'); endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" id="email" name="email" class="form-control" required
                                           autocomplete="email">
                                    <?php if (Session::has('errors.email')): ?>
                                        <span class="text-danger text-sm"><?= Session::get('errors.email') ?></span>
                                        <?php Session::remove('errors.email'); endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form-label">Password *</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                    <?php if (Session::has('errors.password')): ?>
                                        <span class="text-danger text-sm"><?= Session::get('errors.password') ?></span>
                                        <?php Session::remove('errors.password'); endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="repeat_password" class="form-label">Repeat Password *</label>
                                    <input type="password" id="repeat_password" name="repeat_password"
                                           class="form-control">
                                    <?php if (Session::has('errors.repeat_password')): ?>
                                        <span class="text-danger text-sm"><?= Session::get('errors.repeat_password') ?></span>
                                        <?php Session::remove('errors.repeat_password'); endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="role" class="form-label">Select Role *</label>
                                    <select id="role" name="role" class="form-select" required="">
                                        <option value="">Choose a role...</option>
                                        <option value="student">Student</option>
                                        <option value="instructor">Instructor</option>
                                    </select>
                                    <?php if (Session::has('errors.role')): ?>
                                        <span class="text-danger text-sm"><?= Session::get('errors.role') ?></span>
                                        <?php Session::remove('errors.role'); endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-enroll">
                                    <i class="bi bi-check-circle me-2"></i>
                                    Sign Up
                                </button>
                                <p class="enrollment-note mt-3">
                                    <i class="bi bi-shield-check"></i>
                                    Your information is secure and will never be shared with third parties
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form Column -->

            <?php include_once 'partials/benefits.php' ?>
            <!-- End Benefits Column -->
        </div>
    </div>
</section>
<!-- /Signup Section -->

<?php include_once 'partials/footer.php' ?>
