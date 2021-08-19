<?php
// File ini merupakan halaman login

session_start();
if(isset($_SESSION['status'])){
    header("location: index.php");
}

include 'header.php';
include 'config.php';
?>

<body class="h-screen font-sans login bg-cover">
<div class="container mx-auto h-full flex flex-1 justify-center items-center">
    <div class="w-full max-w-lg">
        <div class="leading-loose">

        <!--Form Starts Here-->
        <form action="loginAction.php" method="POST" class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
            <p class="text-gray-800 font-medium text-center text-lg font-bold">Login</p>
            <!--Username Input-->
            <div class="">
                <label class="block text-sm text-gray-00" for="username">Username</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="username" name="username" type="text" required="" placeholder="User Name" aria-label="username">
            </div>
            <!--Password Input-->
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="password">Password</label>
                <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="text" required="" placeholder="*******" aria-label="password">
            </div>
            <div class="mt-4 items-center justify-between">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit" name="submit">Login</button>
            </div>
        </form>
        <!--Form Ends Here-->
            
        </div>
    </div>
</div>
</body>

</html>