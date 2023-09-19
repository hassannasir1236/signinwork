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
input {
    display: block;
    width: 100%;
    font-size: 1rem;
    font-weight: 400;
    margin-left: 4px;
    line-height: 1.5;
    color: rgb(33, 37, 41);
    background-color: rgb(255, 255, 255);
    background-clip: padding-box;
    appearance: none;
    position: relative;
    padding: 0.375rem 0.75rem;
    border-radius: 0.25rem;
    border:1px solid;
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


<?php if(session()->getFlashdata('success')): ?>
<div id="toaster" class="toaster">
    <div class="toaster-content">
    congratulations, Your Profile is Updated
    </div>
</div>
<?php endif; ?>


<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-sm-12 col-md-4 w-25">
        <div class="card shadow rounded-3" >
        <?php if ($imageData): ?>  
            <img id="imagePreview" src="<?= base_url()?>assets/Uploads/<?= $imageData['profilename']?>" class="card-img-top" alt="..."> 
            <img id="uploadPreview" class="w-100">
                  
        <?php else: ?>
            <img id="imagePreview" src="<?= base_url()?>/assets/images/profile.jpg" class="card-img-top">
           
                <img id="uploadPreview" class="w-100">
        <?php endif; ?>
           
            <div class="card-body">

                <form action="/image-upload/upload" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" id="uploadImage" type="file" name="myPhoto" onchange="PreviewImage();">
                    </div>
                    <?php if (isset($validation)): ?>
                        
                            <?php if ($validation->getError('myPhoto')): ?>
                             <span class="text-danger">
                                <?= $validation->getError('myPhoto') ?>
                            </span>
                             <?php endif; ?>
                             <?php endif; ?>
                             <?php if (session()->has('errors')): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <!-- Iterate through the errors and display them -->
                                        <?php foreach (session('errors') as $error): ?>
                                            <li><?= esc($error) ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            <?php endif ?>
                    <input type="submit"  id="imageInput" class="rounded-3 btn btn-primary">
                </form>
            </div>
        </div>
        </div>
        <div class="col-12 col-sm-12 col-md-8">
            <button class="btn btn-info m-4 " id="fetchButton">Fetch Data</button>
        <table id="example" class="table is-striped" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody  id="dataList">
            <!-- <?php foreach ($userdata as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td class="d-flex">
                        <a href="<?=  site_url('user/edit/').$user['id']; ?>" class="btn btn-success rounded-2"><i class="fa-solid fa-pen-to-square" style="color: #f6f7f9;"></i></a>
                        <form action="<?=  site_url('user/delete/').$user['id']; ?>" method="post">
                            <button type="submit" class="btn btn-danger rounded-2 show_confirm" style="margin-left:3px;">
                            <i class="fa-solid fa-trash" style="color: #f6f7f9;"></i>
                            </button>
                        </form>
                       
                    </td>
                </tr>
                <?php endforeach; ?> -->
            </tbody>
            <tfoot>
                <tr>
                <th>id</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th class="text-center">Action</th>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('js') ?>
<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
            document.getElementById("imagePreview").style.display = "none";
        };
    };

</script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bulma.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bulma.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<!-- <script>
   $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        "pageLength": 20,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    // Insert at the top left of the table
 table.buttons().container().appendTo( $('div.column.is-half', table.table().container()).eq(0));
} );
</script> -->
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
<script>
    $('#fetchButton').click(function() {
    new DataTable('#example', {
    ajax: '<?php echo base_url('fetch'); ?>',
    columns: [
        { data: 'id' },
        { data: 'username' },
        { data: 'email' },
        {
                // Create a column for action buttons
                data: null, // Use null as the data source because buttons are custom
                render: function(data, type, full, meta) {
                    return '<a href="<?=  site_url('user/edit/')?>' + data.id + '" class="btn btn-primary btn-edit" data-id="' + data.id + '"><i class="fa-solid fa-pen-to-square" style="color: #f6f7f9;"></i></a>' +
                           '<form  class="show_confirm" action="<?=  site_url('user/delete/') ?>' + data.id + '" method="post"><button class="btn btn-danger btn-delete show_confirm" data-id="' + data.id + '"><i class="fa-solid fa-trash" style="color: #f6f7f9;"></i></button></form>';
                }
            }
        
    ],
    processing: true,
});
});
$(document).on('click', '.show_confirm', function() {
    var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
});
$('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
<!-- ajax ddata fetch -->
<!-- <script>
        $(document).ready(function() {
              var table = $('#example').DataTable( {
        lengthChange: true,
        "pageLength": 3,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 table.buttons().container().appendTo( $('div.column.is-half', table.table().container()).eq(0));
            $('#fetchButton').click(function() {
                // Make an Ajax request to fetch data
               
                $.ajax({
                    url: '<?php echo base_url('fetch'); ?>',
                    method: 'GET',
                    success: function(response) {
                        // Handle the JSON response (data) and populate the data list
                        // alert("kjsdaf");
                        console.warn(response.students);
                        var dataList = $('#dataList');
                        dataList.empty(); // Clear existing data
                        if (typeof response !== 'undefined') {
                        $.each(response.students, function(index, item) {
                            // dataList.append('');
                            // dataList.append('' + + '</td>');
                            // dataList.append('' +  + '');
                            // dataList.append(''  '</td>');
                            dataList.append('<tr><td>'+item.id +'</td><td>'+item.username+'</td><td>'+ item.email +'</td><td class="d-flex justify-content-center align-items-center"><a href="user/edit/'+item.id+'" class="btn btn-success bg-success rounded-2"><i class="fa-solid fa-pen-to-square" style="color: #f6f7f9;"></i></a>                  <form class="show_confirm" action="/user/delete/' + item.id + 
                                '"method="post"><button type="submit" class="btn btn-danger rounded-2 show_confirm" style="margin-left:3px;"><i class="fa-solid fa-trash" style="color: #f6f7f9;"></i></button></form></td></tr>');
                            // dataList.append('<td> </td>');
                            // dataList.append('');

                            // Replace 'field_name' with the actual field name you want to display
                        });
                         $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
                    } else {
                        console.error('Invalid or undefined data received in the response.');
                    }
                      
                    }, 
                    error: function(xhr, textStatus, errorThrown) {
                        alert("error");
                        console.error('Ajax request failed:', textStatus, errorThrown);
                    }
                });
            });
        });
</script> -->
<!-- Confirmation delete pop scripte -->
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>

<?= $this->endSection() ?>