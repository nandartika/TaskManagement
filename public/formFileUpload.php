<?php
session_start();
if(!isset($_SESSION['status'])){
    header("location: login.php");
}

include 'header.php';
include 'navbar.php';
?>

<!--Main-->
<main class="bg-white-300 flex-1 p-3 overflow-hidden">

<div class="flex flex-col">
    <!-- Card Sextion Starts Here -->
    <!-- Form upload file, form dilanjutkan ke forms.php -->
    <form class="w-full" action="forms.php" method="post" enctype="multipart/form-data">
        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2 p-4">
            <input type="file" name="upload[]" multiple id="fileupload" onchange="this.form.submit('submit')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"/>
        </div>
        <input type="hidden" name="action" value="submit" />
    </form>

</div>
</main>
<!--/Main-->

<?php
include 'footer.php';
?>