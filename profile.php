<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config/config.php");
if (!isset($_SESSION['user_id'])) {
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="main.css">
    <!-- "test": "echo \"Error: no test specified\" && exit 1" -->
    <title>Document</title>
</head>

<body class="bg-gray-100">

    <?php include 'includes/header.php'; ?>

    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mt-28 mb-8 text-gray-700">User Listed Property</h1>
        <?php
        if (isset($_GET['msg']))
            echo $_GET['msg'];
        ?>
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider">Properties</th>
                        <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider">Type</th>
                        <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider">Added Date</th>
                        <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider">Update</th>
                        <th class="px-6 py-4 text-center text-xs font-medium uppercase tracking-wider">Delete</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $query = mysqli_query($conn, "SELECT * FROM `properties` WHERE user_id='$user_id'");
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-20 w-30">
                                        <img class="h-20 w-30 rounded-lg" src="assets/images/<?php echo $row['property_image']; ?>" alt="Property Image">
                                    </div>
                                    <div class="ml-4">
                                        <a href="property_details.php?property_id=<?php echo $row['property_id'];?>" >
                                        <div class="text-sm font-medium text-gray-900"><?php echo $row['title']; ?></div>
                                        <div class="text-sm text-gray-500"><?php echo "{$row['address']}, {$row['district']}"; ?></div>
                                        <div class="text-sm text-green-500 font-bold"><?php echo $row['price']; ?>৳</div>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-900"><?php echo $row['property_type']; ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-900"><?php echo $row['created_at']; ?></div>
                        
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Available</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <a href="edit_property.php?property_id=<?php echo $row['property_id'];?>">
                                    <button class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-md">Update</button>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <a href="delete_property.php?property_id=<?php echo $row['property_id'];?>">
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">Delete</button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>