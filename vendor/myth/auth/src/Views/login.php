 <?= $this->extend('templates/starting_page_layout'); ?>

 <?= $this->section('content'); ?>
 <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
       <div class="container-fluid">
          <div class="navbar-wrapper">
             <a class="navbar-brand" href="#">Login</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end">
             <a href="<?= base_url('/'); ?>" class="btn btn-primary pull-right">Scan QR
             </a>
          </div>
       </div>
    </nav>
    <!-- End Navbar -->

    <div class="content">
       <div class="container-fluid">
          <div class="row">
             <div class="col-md-4 m-auto">
                <div class="card">
                   <div class="card-header card-header-primary mb-48">
                      <h4 class="card-title">Login petugas</h4>
                      <p class="card-category">Silahkan masukkan username dan password anda</p>
                   </div>

                   <div class="card-body mx-5 my-3"><?= view('Myth\Auth\Views\_message_block') ?>
                      <form action="<?= url_to('login') ?>" method="post">
                         <?= csrf_field() ?>
                         <div class="row">
                            <div class="col-md-12">
                               <?php if ($config->validFields === ['email']) : ?>
                                  <div class="form-group">
                                     <label class="bmd-label-floating"><?= lang('Auth.email') ?></label>
                                     <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" autofocus>
                                     <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                     </div>
                                  </div>
                               <?php else : ?>
                                  <div class="form-group">
                                     <label class="bmd-label-floating"><?= lang('Auth.emailOrUsername') ?></label>
                                     <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" autofocus>
                                     <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                     </div>
                                  </div>
                               <?php endif; ?>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                  <label class="bmd-label-floating">Password</label>
                                  <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>">
                                  <div class="invalid-feedback">
                                     <?= session('errors.password') ?>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <!-- <button type="submit" class="btn btn-primary col-md-12">Login</button> -->
                         <?php if ($config->allowRemembering) : ?>
                            <div class="form-check">
                               <label class="form-check-label">
                                  <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                  <?= lang('Auth.rememberMe') ?>
                               </label>
                            </div>
                         <?php endif; ?>

                         <br>

                         <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>

                         <?php if ($config->allowRegistration) : ?>
                            <hr>
                            <p><a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
                         <?php endif; ?>
                         <?php if ($config->activeResetter) : ?>
                            <p><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
                         <?php endif; ?>
                         <div class="clearfix"></div>
                      </form>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <?= $this->endSection(); ?>