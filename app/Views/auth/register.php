<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container regiscont">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register an Account!</h1>
                </div>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <form action="<?= route_to('register') ?>" method="post" class="user">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                        <!-- Display the error message if the username field is empty -->
                        <?php if (session('errors.username')) : ?>
                            <div class="invalid-feedback">
                                <?= service('validation')->getError('username') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                        </div>
                        <div class="col-sm-6">
                            <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        <?= lang('Auth.register') ?>
                    </button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                    <a href="<?= route_to('login') ?>"><?= lang('Auth.alreadyRegistered') ?> <?= lang('Auth.signIn') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
