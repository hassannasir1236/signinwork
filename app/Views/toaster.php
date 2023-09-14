<!-- Extending the layout -->
<?= $this->extend('layouts/main') ?>

<!-- Defining the content section -->
<?= $this->section('title') ?>
echo "Signup page"
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
    /* Style the toaster container */
.toaster {
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #f44336; /* Change this color to your desired color */
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

<!-- Toaster container -->
<div id="toaster" class="toaster">
    <div class="toaster-content">
        This is a toaster message.This is a toaster message.This is a toaster message.This is a toaster message.
    </div>
</div>
<script>
    // Function to show the toaster
    function showToast() {
        var toaster = document.getElementById('toaster');
        toaster.style.display = 'block';

        setTimeout(function () {
            toaster.style.display = 'none';
        }, 3000); // Display for 3 seconds (adjust as needed)
    }
    // Call the showToast function when the page loads
    window.onload = showToast;
</script>
<button onclick="showToast()">Show Toaster</button>

<?= $this->endSection() ?>