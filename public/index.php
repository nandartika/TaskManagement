<?php
// File ini merupakan halaman awal
// Antarmuka akan menapilkan tabel yang berisikan tugas-tugas beserta statusnya

session_start();
if(!isset($_SESSION['status'])){
    header("location: login.php");
}

include 'header.php';
include 'navbar.php';
include 'config.php';
?>

<!--Main-->
<main class="bg-white-300 flex-1 p-3 overflow-hidden">

<div class="flex flex-col">
    <!-- Stats Row Starts Here -->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row justify-between mx-2 py-5">
        <button onclick="JavaScript:window.location.href='formFileUpload.php';" class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded" stylr="justify-content: flex-end;">
            Add New Task
        </button>
    </div>
    <!-- /Stats Row Ends Here -->

    <!-- Card Sextion Starts Here -->
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">

        <!-- card -->

        <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
            <div class="px-6 py-2 border-b border-light-grey">
                <div class="font-bold text-xl">To-Do List</div>
            </div>
            <div class="table-responsive">

                <!--Show Table-->
                <table class="table text-grey-darkest">
                    <thead class="bg-grey-dark text-white text-normal">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Download</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <!--Get data from database and show in table-->
                    <?php 
                    $x = 1;
                    $results = $db->query("SELECT * FROM tasks");
                    while ($row = $results->fetchArray()) {
                        $id = $row['id_task'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $status = $row['status'];
                        $fileName = $row['file_name'];
                        $filePath = $row['file_path'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $x++; ?></th>
                        <td><?= $title ?></td>
                        <td><?= $description ?></td>
                        <td>
                            <?php
                            if($status == 1){
                                echo "Available";
                            } else if($status == 2){
                                echo "Booked";
                            } else {
                                echo "Unavailable";
                            }
                            ?>
                        </td>
                        <!--Column Download-->
                        <td>
                            <button onclick="JavaScript:window.location.href='downloadAction.php?file=<?= $filePath ?>';" <?php if($status!=2){echo "disabled";}?> class="bg-gray-200 hover:bg-gray-500 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                    <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/>
                                </svg>
                                <span>Download</span>
                            </button>
                        </td>
                        <!--Column Action-->
                        <td>
                            <?php
                            if($status == 1){
                            ?>
                                <button onclick="JavaScript:window.location.href='updateStatusAction.php?id=<?= $id ?>&status=2';" class="bg-green-500 hover:bg-blue-200 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-500 rounded">
                                    Booking
                                </button>
                            <?php
                            } else if($status == 2){
                            ?>
                                <button onclick="JavaScript:window.location.href='updateStatusAction.php?id=<?= $id ?>&status=1';" class="bg-orange-500 hover:bg-blue-200 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-500 rounded">
                                    Cancel
                                </button>
                            <?php
                            }
                            ?>
                            <button onclick="JavaScript:window.location.href='updateStatusAction.php?id=<?= $id ?>&status=3';" class="bg-red-500 hover:bg-blue-200 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-500 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /card -->

    </div>
    <!-- /Cards Section Ends Here -->

</div>
</main>
<!--/Main-->

<?php
include 'footer.php';
?>