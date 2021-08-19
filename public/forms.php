<?php
// This file will be accessed after the user uploads the file
// On this page the user will be asked to write the title and description of the task

session_start();
if(!isset($_SESSION['status'])){
    header("location: login.php");
}

include 'navbar.php';
include 'header.php';
?>

<!--Main-->
<main class="bg-white-300 flex-1 p-3 overflow-hidden">

<div class="flex flex-col">
    <!-- Card Sextion Starts Here -->

    <?php
    if(isset($_POST["action"]) && $_POST["action"] == "submit"){
        $files = array_filter($_FILES['upload']['name']);

        $name = explode(".", $filename);
        $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
        foreach($accepted_types as $mime_type) {
            if($mime_type == $type) {
                $okay = true;
                break;
            } 
        }
    
        $continue = strtolower($name[1]) == 'zip' ? true : false;
        if(!$continue) {
            $message = "The file you are trying to upload is not a .zip file. Please try again.";
            echo "<script type='text/javascript'>alert('$message');
            window.location.href='http://localhost/TaskManagement/public/formFileUpload.php';
            </script>";
	}

        // Count # of uploaded files in array
        $total = count($_FILES['upload']['name']);

        // Loop through each file
        for( $i=0 ; $i < $total ; $i++ ) {

            //Get the file name
            $fileName[$i] = $_FILES['upload']['name'][$i];
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            //Make sure we have a file path
            if (file_exists($tmpFilePath)){
                //Setup our new file path
                $uniqName[$i] = uniqid($fileName[$i] . "_") .'.rar';
                $newFilePath = "../uploadFiles/" . $uniqName[$i];

                //Upload the file into the temp dir
                move_uploaded_file($tmpFilePath, $newFilePath);
            }
        
    ?>
    <!--Grid Form-->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                New Task
            </div>
            <div class="p-3">
                <form class="w-full" action="formAction.php" action="formAction.php" method="post" enctype="multipart/form-data">
                    <!--Task File Name Input-->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-black-darker text-xs font-bold mb-1"
                                    for="grid-name">
                                File Name
                            </label>
                            <input disabled required class="appearance-none block w-full bg-grey-200 text-black-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                    id="grid-name" type="text" placeholder="Enter File Name" name="file[]" value="<?php echo($fileName[$i]); ?>">
                        </div>
                    </div>
                
                    <!--Task Name Input-->
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-black-darker text-xs font-bold mb-1"
                                    for="grid-name">
                                Task Title
                            </label>
                            <input required class="appearance-none block w-full bg-grey-200 text-black-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                    id="grid-name" type="text" placeholder="Enter Task Title"  name="title[]">
                        </div>
                    </div>

                    <!--Description Input-->
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-black-darker text-xs font-bold mb-1"
                                    for="grid-description">
                                Description
                            </label>
                            <textarea class="appearance-none block w-full bg-grey-200 text-black-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                    id="grid-name" placeholder="Enter Task Description" name="description[]"></textarea>
                        </div>
                    </div>

                    <!--Hidden File Name-->
                    <input type="hidden" id="file-path" name="file-path[]" value="<?php echo ($uniqName[$i]); ?>">
            </div>
        </div>
    </div>
    <!--/Grid Form-->
    <?php
        }
    }
    ?>
    
    <!--Submit Button-->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2 px-3 py-2">
        <button class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded" type="submit" name="kirim">
                Submit
            </button>
        </form>
    </div>
</div>
</main>
<!--/Main-->

<?php
include 'footer.php';
?>