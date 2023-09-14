<!-- Extending the layout -->
<?= $this->extend('layouts/main') ?>

<!-- Defining the content section -->
<?= $this->section('title') ?>
echo "Signup page"
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div id="toastr-notifications">
</div> 
<style>
  /* Style the toaster container */
.toaster {
    position: fixed;
    right:0;
    margin-top:5px;
    background-color: #4CAF50; /* Green background color */
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
    display: none; /* Hide it by default */
}

/* Style the toaster content */
.toaster-content {
    text-align: center;
}

</style>
    <script>
        
      <?php if(session()->getFlashdata('success')): ?>
          toastr.success('<?= session()->getFlashdata('success') ?>');
      <?php endif; ?>
      
 
    </script>
    
    
    <!-- Toaster container -->
    <?php if(session()->getFlashdata('success')): ?>
<div id="toaster" class="toaster">
    <div class="toaster-content">
        Registration successful! You can now log in.
    </div>
</div>
<?php endif; ?>

    <div class="container vh-100">
        <div class="row d-flex align-items-center justify-content-center"  style="height:100ch">
            <div class="card w-75 ">
              <div class="card-body row d-flex justify-content-center align-items-center">
              	<div class="col-12 col-md-6">
                    <span><h3><b>Sign up</b></h3></span>
                    <form action="<?= base_url('/register') ?>" method="post">
                    	<div class="mb-3">
		                    <div class="d-flex flex-row-reverse align-items-center input_border">
		                        <input type="text" class="" id="" name="username" aria-describedby="emailHelp" placeholder="Enter Username" value="<?php if(isset($data)): print_r($data['username']); endif; ?>">
		                        <i class="fa-solid fa-user" style="color: #666e7a;"></i>
		                    </div>
                            <?php if (isset($validation)): ?>
                            <?php if ($validation->getError('username')): ?>
                             <span class="text-danger">
                                <?= $validation->getError('username') ?>
                            </span>
                             <?php endif; ?>
                             <?php endif; ?>
                      	</div>
                      <div class="mb-3">
	                    <div class="d-flex flex-row-reverse align-items-center input_border">
	                        <input type="email" class="" id="" name="email" aria-describedby="emailHelp" placeholder="Enter Email" value="<?php if(isset($data)): print_r($data['email']); endif; ?>">
	                      <i class="fa-solid fa-envelope" style="color: #4d5d7a;"></i>
	                    </div>
                        <span class="text-danger">
                             <?php if (isset($validation)): ?>
                            <?php if ($validation->getError('email')): ?>
                                <?= $validation->getError('email') ?>
                                <?php endif; ?>
                                 <?php endif; ?>
                            </span>
                      </div>
                      <div class="mb-3">
                        <div class="d-flex flex-row-reverse align-items-center input_border">
                            <input type="password" class="" name="password" id="exampleInputPassword1" placeholder="Enter Password" value="<?php if(isset($data)): print_r($data['password']); endif; ?>">
                            <i class="fa-solid fa-lock" style="color: #47546b;"></i>
                        </div>
                        <span class="text-danger">
                             <?php if (isset($validation)): ?>
                            <?php if ($validation->getError('password')): ?>
                                <?= $validation->getError('password') ?>
                                <?php endif; ?>
                                 <?php endif; ?>
                            </span>
                      </div>
                      <div class="mb-3">
		                    <div class="d-flex flex-row-reverse align-items-center input_border">
		                        <input type="password" class="" id="" name="confirm_password" aria-describedby="emailHelp" placeholder="Repeat Your Password" 
                              value="<?php if(isset($data)): print_r($data['password']); endif; ?>">
		                      <i class="fa-solid fa-lock" style="color: #47546b;"></i>
		                    </div>
                            <span class="text-danger">
                                 <?php if (isset($validation)): ?>
                                <?php if ($validation->getError('confirm_password')): ?>
                                <?= $validation->getError('confirm_password') ?>
                                <?php endif; ?>
                                 <?php endif; ?>
                            </span>
                      	</div>
                      <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" style="margin-left: 11px;" for="exampleCheck1">I agree all statments in<span class="fs-5 fw-bold border-bottom border-dark   border-2"> Term of service</span> </label>
                      </div>
                      <button type="submit" class="btn mb-3" style="background-color: #62e3dd7d;">Sign Up</button>
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <img src="assets/images/Register.jpeg" class="w-100">
                      <a class="createaccount col p-4" href="<?= base_url('/') ?>">I am a already member	</a>
                </div>
              </div>
            </div>
        </div>
    </div>
    <script>
    // Function to show the toaster
    function showToast() {
        var toaster = document.getElementById('toaster');
        toaster.style.display = 'block';

        setTimeout(function () {
            toaster.style.display = 'none';
        }, 6000); // Display for 5 seconds (adjust as needed)
    }

    // Call the showToast function when the page loads
    window.onload = showToast;
</script>

<?= $this->endSection() ?>
