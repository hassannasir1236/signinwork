<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>
<body>
    <script>
    <?php if(session()->getFlashdata('success')): ?>
        toastr.success('<?= session()->getFlashdata('success') ?>');
    <?php endif; ?>
</script>

    <div class="container vh-100">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="card w-75 ">
              <div class="card-body row d-flex justify-content-center align-items-center">
              	<div class="col-12 col-md-6">
                    <span><h3><b>Sign up</b></h3></span>
                    <form action="<?= base_url('/register') ?>" method="post">
                    	<div class="mb-3">
		                    <div class="d-flex flex-row-reverse align-items-center input_border">
		                        <input type="text" class="" id="" name="username" aria-describedby="emailHelp" placeholder="Enter Username">
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
	                        <input type="email" class="" id="" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
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
                            <input type="password" class="" name="password" id="exampleInputPassword1" placeholder="Enter Password">
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
		                        <input type="password" class="" id="" name="confirm_password" aria-describedby="emailHelp" placeholder="Repeat Your Password">
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
                        <label class="form-check-label" style="margin-left: 11px;" for="exampleCheck1">Remember me</label>
                      </div>
                      <button type="submit" class="btn" style="background-color: #62e3dd7d;">Sign Up</button>
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</body>
</html>