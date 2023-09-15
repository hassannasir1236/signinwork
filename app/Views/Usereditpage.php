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
        <div class="card rounded-3 shadow" style="width: 38rem;">
        <h4 class="d-flex justify-content-center align-items-center pt-4">Update Your Profile</h4>
            <div class="card-body  ">
            <form >
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Enter Username</label>
                    <input type="text" class="form-control col" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['username'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Enter Email</label>
                    <input type="email" class="form-control col" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['username'] ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control col" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control col mb-5" type="file" id="formFile">
                </div>
                <button type="submit" class="btn btn-primary " style="float:right;">Update Record</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('js') ?>

<?= $this->endSection() ?>