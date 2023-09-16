<?= $this->extend('layouts/main') ?>

<!-- Defining the content section -->
<?= $this->section('title') ?>
echo "Signup page"
<?= $this->endSection() ?>
<?= $this->section('cs') ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bulma.min.css">
<link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bulma.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="">

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
body{
    height:100vh;
}
/*image preview/zoom style code */
/*Eliminates padding, centers the thumbnail */

body, html {
padding: 0;
margin: 0;
/*text-align: center;*/
}

/* Styles the thumbnail */

a.lightbox img {
height: 150px;
border: 3px solid white;
box-shadow: 0px 0px 8px rgba(0,0,0,.3);
margin: 0px 20px 20px 20px;
}

/* Styles the lightbox, removes it from sight and adds the fade-in transition */

.lightbox-target {
position: fixed;
top: -100%;
width: 100%;
background: rgba(0,0,0,.7);
width: 100%;
opacity: 0;
-webkit-transition: opacity .5s ease-in-out;
-moz-transition: opacity .5s ease-in-out;
-o-transition: opacity .5s ease-in-out;
transition: opacity .5s ease-in-out;
overflow: hidden;
 
}

/* Styles the lightbox image, centers it vertically and horizontally, adds the zoom-in transition and makes it responsive using a combination of margin and absolute positioning */

.lightbox-target img {
margin: auto;
position: absolute;
top: 0;
left:0;
right:0;
bottom: 0;
max-height: 0%;
max-width: 0%;
border: 3px solid white;
box-shadow: 0px 0px 8px rgba(0,0,0,.3);
box-sizing: border-box;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
  
}

/* Styles the close link, adds the slide down transition */

a.lightbox-close {
display: block;
width:50px;
height:50px;
box-sizing: border-box;
background: white;
color: black;
text-decoration: none;
position: absolute;
top: -80px;
right: 0;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:before {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(45deg);
-moz-transform:rotate(45deg);
-o-transform:rotate(45deg);
transform:rotate(45deg);
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:after {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(-45deg);
-moz-transform:rotate(-45deg);
-o-transform:rotate(-45deg);
transform:rotate(-45deg);
}

/* Uses the :target pseudo-class to perform the animations upon clicking the .lightbox-target anchor */

.lightbox-target:target {
opacity: 1;
top: 0;
bottom: 0;
  overflow:scroll;
}

.lightbox-target:target img {
max-height: 100%;
max-width: 100%;
}

.lightbox-target:target a.lightbox-close {
top: 0;
}

</style>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" enctype="multipart/form-data">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <a class="btn btn-secondary ml-4" style="margin-left:8px;" href=""><?php echo session('username'); ?></a>
      <a class="btn btn-secondary ml-4" style="margin-left:8px;" href="<?php echo base_url('/logout'); ?>">Logout</a>
    </div>
  </div>
</nav>


<div class="container d-flex justify-content-center align-items-center"  style="height:100vh;">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="card rounded-3 shadow" style="width: 30rem; margin-top: 7rem!important;">
        <h4 class="d-flex justify-content-center align-items-center pt-4">Update Your Profile</h4>
            <div class="card-body  ">
            <form action="<?=  base_url('/user/editrecord/').$data['id']; ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
              
                    <label for="exampleInputEmail1" class="form-label">Enter Username</label>
                    <input type="text" class="form-control col" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="<?= $data['username'] ?>">
                    <?php if (session()->has('errors') && isset(session('errors')['username'])): ?>
                        <div class="text-danger"><?= session('errors')['username'] ?></div>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Enter Email</label>
                    <input type="email" name="email" readonly  class="form-control col" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['email'] ?>">
                    <?php if (session()->has('errors') && isset(session('errors')['email'])): ?>
                        <div class="text-danger"><?= session('errors')['email'] ?></div>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control col" id="exampleInputPassword1">
                   <?php if (session()->has('errors') && isset(session('errors')['password'])): ?>
                        <div class="text-danger"><?= session('errors')['password'] ?></div>
                    <?php endif ?>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control col mb-5" name="myPhoto" type="file" id="formFile">
                    <?php if (session()->has('errors') && isset(session('errors')['myPhoto'])): ?>
                        <div class="text-danger"><?= session('errors')['myPhoto'] ?></div>
                    <?php endif ?>
                    <div class="alert alert-danger">
                                    <ul>
                                        <!-- Iterate through the errors and display them -->
                                        <?php foreach (session('errors') as $error): ?>
                                            <li><?= esc($error) ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            <?php endif ?>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                     
                     <?php if ($imageData): ?> 
                     <a class="lightbox" href="#dog">
                       <img src="<?= base_url()?>assets/Uploads/<?= $imageData['profilename']?>"/>
                    </a> 
                    <div class="lightbox-target" id="dog">
                       <img src="<?= base_url()?>assets/Uploads/<?= $imageData['profilename']?>"/>
                       <a class="lightbox-close" href="#"></a>
                    </div> 
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary " style="float:right;">Update Record</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script type="text/javascript">
    
</script>
<?= $this->endSection() ?>