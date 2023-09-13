<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="container vh-100">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="card w-75 ">
              <div class="card-body row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-6">
                    <img src="assets/images/loginin.jpeg" class="w-100">
                </div>
                <div class="col-12 col-md-6">
                    <span><h3><b>Sign In</b></h3></span>
                    <form>
                      <div class="mb-3">
                    <div class="d-flex flex-row-reverse align-items-center input_border" >
                        <input type="email" class="" id="" aria-describedby="emailHelp" placeholder="Enter Email">
                      <i class="fa-solid fa-user" style="color: #666e7a;"></i>
                        </div>
                      </div>
                      <div class="mb-3">
                        <div class="d-flex flex-row-reverse align-items-center input_border">
                            <input type="password" class="" id="exampleInputPassword1" placeholder="Enter Password">
                            <i class="fa-solid fa-lock" style="color: #47546b;"></i>
                        </div>
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</body>
</html>