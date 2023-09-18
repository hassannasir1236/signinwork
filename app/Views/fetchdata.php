<!DOCTYPE html>
<html>
<head>
    <title>Fetch Data with Ajax</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Data List</h1>
    <button id="fetchButton">Fetch Data</button>
    <ul ></ul>
    <table  class="table table-hover">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">User Name</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        </tr>
    </thead>
    <tbody id="dataList" >
       
    </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#fetchButton').click(function() {
                // Make an Ajax request to fetch data
                $.ajax({
                    url: '<?php echo base_url('fetch'); ?>',
                    method: 'GET',
                    success: function(response) {
                        // Handle the JSON response (data) and populate the data list
                        alert("kjsdaf");
                        console.warn(response.students);
                        var dataList = $('#dataList');
                        dataList.empty(); // Clear existing data
                        $.each(response.students, function(index, item) {
                            dataList.append('<tr>');
                            dataList.append('<td>' + item.id + '</td>');
                            dataList.append('<td>' + item.username + '</td>');
                            dataList.append('<td>' + item.email + '</td>');
                            dataList.append('<td>' + item.password + '</td>');
                            dataList.append('</tr>');
                            // Replace 'field_name' with the actual field name you want to display
                        });
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.error('Ajax request failed:', textStatus, errorThrown);
                    }
                });
            });
        });
    </script>
</body>
</html>
