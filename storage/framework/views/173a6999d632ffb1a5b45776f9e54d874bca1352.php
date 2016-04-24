<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form" method="POST" action="<?php echo e(url('/register')); ?>">
                <?php echo csrf_field(); ?>

                <div class="row">
                    <div class="input-field col s12 center">
                        <h4>Daftar Akun</h4>
                        <p class="center login-form-text">TOKO BUKU : RAISYA JAYA</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi mdi-account-outline prefix"></i>
                        <input id="name" name="name" type="text" value="<?php echo e(old('name')); ?>">
                        <label for="name" class="center-align">Nama Lengkap</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi mdi-email-outline prefix"></i>
                        <input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>">
                        <label for="email" class="center-align">Email</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi mdi-lock-outline prefix"></i>
                        <input id="password" name="password" type="password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi mdi-lock-outline prefix"></i>
                        <input id="password_confirmation" name="password_confirmation" type="password">
                        <label for="password_confirmation">Konfirmasi Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="blue waves-effect waves-light btn col s12" type="submit">Daftar Akun</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <p class="margin medium-small"><a href="<?php echo e(url('/login')); ?>">Sudah punya akun ?</a></p>
                    </div>  
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.logres', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>