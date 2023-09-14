<!-- Extending the layout -->
<?= $this->extend('layouts/main') ?>

<!-- Defining the content section -->
<?= $this->section('title') ?>
echo "Signin page"
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>
    <div class="container vh-100">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="card w-75 ">
              <div class="card-body row d-flex justify-content-center align-items-center" style="height:100ch">
                <div class="col-12 col-md-6">
                    <img src="assets/images/loginin.jpeg" class="w-100"> 
                </div>
                <div class="col-12 col-md-6">
                    <span><h3><b>Sign In</b></h3></span>
                    <form action="<?php echo base_url('/'); ?>" method="post">
                      <div class="mb-3">
                        <div class="d-flex flex-row-reverse align-items-center input_border" >
                          <input type="email" class="" name="email" id="" aria-describedby="emailHelp" placeholder="Enter Email">
                          <i class="fa-solid fa-user" style="color: #666e7a;"></i>
                        </div>
                        <?php if (isset($validation)): ?>
                            <?php if ($validation->getError('email')): ?>
                             <span class="text-danger">
                                <?= $validation->getError('email') ?>
                            </span>
                             <?php endif; ?>
                             <?php endif; ?>
                      </div>
                      <div class="mb-3">
                        <div class="d-flex flex-row-reverse align-items-center input_border">
                            <input type="password" name="password" class="" id="exampleInputPassword1" placeholder="Enter Password">
                            <i class="fa-solid fa-lock" style="color: #47546b;"></i>
                        </div>
                        <?php if (isset($validation)): ?>
                            <?php if ($validation->getError('password')): ?>
                             <span class="text-danger">
                                <?= $validation->getError('password') ?>
                            </span>
                             <?php endif; ?>
                             <?php endif; ?>
                      </div>
                      <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" style="margin-left: 11px;" for="exampleCheck1">Remember me</label>
                      </div>
                      <button type="submit" class="btn" style="background-color: #62e3dd7d;">Login in</button>
                    </form>
                </div>
              </div>
              <div class="card-footer row">
                <div class="col-12 col-md-6">
                    <a class="createaccount" href="<?= base_url('signup') ?>">Create an Account</a>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <ul class="d-flex align-items-center justify-content-center list-unstyled">
                        <span class="loginIcon">Or login with</span>
                      <li class="loginIcon">  <i class="fa-brands fa-square-facebook fa-2x" style="color: #10397f;"></i> </li>
                      <li class="loginIcon">  <i class="fa-brands fa-square-twitter fa-2x" style="color: #065ff9;"></i> </li>
                      <li class="loginIcon">  <i class="fa-brands fa-square-google-plus fa-2x" style="color: #e70404;"></i> </li>
                    </ul>
                </div>
          </div>
            </div>
        </div>
    </div>
    <?= $this->endSection() ?>