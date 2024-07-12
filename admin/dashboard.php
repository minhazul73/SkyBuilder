<?php
session_start();
require("../config/config.php");
////code

if(!isset($_SESSION['admin_id']))
{
	header("location:index.php");
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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .dropdown-menu {
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }

        .section {
            display: none;
        }

        .section.show {
            display: block;
        }
    </style>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <nav class="w-64 bg-gray-800 text-white min-h-screen flex flex-col justify-between">
            <div>
                <div class="p-4 text-lg font-bold">Real Estate</div>
                <ul>
                    <li class="p-4 hover:bg-gray-700 flex items-center cursor-pointer" onclick="showSection('dashboardSection')">
                        <ion-icon name="home-outline" class="mr-2"></ion-icon>
                        <span>Dashboard</span>
                    </li>
                    <li class="p-4 hover:bg-gray-700">
                        <a href="#" class="flex justify-between items-center" onclick="toggleDropdown('allUsersDropdown')">
                            <div class="flex items-center">
                                <ion-icon name="people-outline" class="mr-2"></ion-icon>
                                All Users
                            </div>
                            <span>&#9662;</span>
                        </a>
                        <ul id="allUsersDropdown" class="ml-4 mt-2 dropdown-menu">
                            <li class="p-2 hover:bg-gray-700 cursor-pointer" onclick="showSection('adminSection')">Admin</li>
                            <li class="p-2 hover:bg-gray-700 cursor-pointer" onclick="showSection('userSection')">Users</li>
                        </ul>
                    </li>
                    <li class="p-4 hover:bg-gray-700 flex items-center cursor-pointer" onclick="showSection('propertySection')">

                        <ion-icon name="business-outline" class="mr-2"></ion-icon>
                        Property Management
                    </li>

                    <li class="p-4 hover:bg-gray-700 flex items-center cursor-pointer" onclick="showSection('aboutSection')">
                        <ion-icon name="information-circle-outline" class="mr-2"></ion-icon>
                        <span>About Page</span>
                    </li>
                </ul>
            </div>
            <div>
                <li class="p-4 hover:bg-gray-700 flex items-center">
                    <ion-icon name="log-out-outline" class="mr-2"></ion-icon>
                    <a href="logout.php">Log Out</a>
                </li>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 p-10">
            <!-- Dashboard Section -->
            <div id="dashboardSection" class="section show">
                <h1 class="text-2xl text-black font-bold mb-6">Welcome Admin!</h1>
                <div class="grid grid-cols-4 gap-4">
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                        <ion-icon name="people-outline" class="text-4xl text-blue-500 mr-4"></ion-icon>
                        <div>
                            <h2 class="text-xl font-bold"><?php $sql = "SELECT * FROM users";
                                                            $query = $conn->query($sql);
                                                            echo "$query->num_rows"; ?></h2>
                            <p class="text-black">Registered Users</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                        <ion-icon name="home-outline" class="text-4xl text-green-500 mr-4"></ion-icon>
                        <div>
                            <h2 class="text-xl font-bold"><?php $sql = "SELECT * FROM properties";
                                                            $query = $conn->query($sql);
                                                            echo "$query->num_rows"; ?></h2>
                            <p class="text-black">Properties</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                        <ion-icon name="business-outline" class="text-4xl text-yellow-500 mr-4"></ion-icon>
                        <div>
                            <h2 class="text-xl font-bold"><?php $sql = "SELECT * FROM properties WHERE property_type = 'Apartment' ";
                                                            $query = $conn->query($sql);
                                                            echo "$query->num_rows"; ?></h2>
                            <p class="text-black">No. of Apartments</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                        <ion-icon name="home-outline" class="text-4xl text-red-500 mr-4"></ion-icon>
                        <div>
                            <h2 class="text-xl font-bold"><?php $sql = "SELECT * FROM properties WHERE property_type = 'House' ";
                                                            $query = $conn->query($sql);
                                                            echo "$query->num_rows"; ?></h2>
                            <p class="text-black">No. of Houses</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                        <ion-icon name="business-outline" class="text-4xl text-purple-500 mr-4"></ion-icon>
                        <div>
                            <h2 class="text-xl font-bold"><?php $sql = "SELECT * FROM properties WHERE property_type = 'Building' ";
                                                            $query = $conn->query($sql);
                                                            echo "$query->num_rows"; ?></h2>
                            <p class="text-black">No. of Buildings</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                        <ion-icon name="business-outline" class="text-4xl text-indigo-500 mr-4"></ion-icon>
                        <div>
                            <h2 class="text-xl font-bold"><?php $sql = "SELECT * FROM properties WHERE property_type = 'Flat' ";
                                                            $query = $conn->query($sql);
                                                            echo "$query->num_rows"; ?></h2>
                            <p class="text-black">No. of Flats</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                        <ion-icon name="business-outline" class="text-4xl text-indigo-500 mr-4"></ion-icon>
                        <div>
                            <h2 class="text-xl font-bold"><?php $sql = "SELECT * FROM properties WHERE property_type = 'Vilaa' ";
                                                            $query = $conn->query($sql);
                                                            echo "$query->num_rows"; ?></h2>
                            <p class="text-black">No. of Vilaas</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Section -->
            <div id="aboutSection" class="section">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4">View About</h2>
                    <nav class="text-gray-600 mb-6">
                        <ol class="list-reset flex">
                            <li><a href="#" class="text-blue-600">Dashboard</a></li>
                            <li><span class="mx-2">/</span></li>
                            <li>View About</li>
                        </ol>
                    </nav>
                    <h3 class="text-xl font-bold mb-4">List Of About</h3>
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200">#</th>
                                <th class="py-2 px-4 border-b border-gray-200">Title</th>
                                <th class="py-2 px-4 border-b border-gray-200">Content</th>
                                <th class="py-2 px-4 border-b border-gray-200">Image</th>
                                <th class="py-2 px-4 border-b border-gray-200">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">1</td>
                                <td class="py-2 px-4 border-b border-gray-200">About Us</td>
                                <td class="py-2 px-4 border-b border-gray-200">This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project.</td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    <img src="assets/images/property-1.jpg" alt="About Image" class="w-16 h-16 object-cover">
                                </td>
                                <td class="py-2 px-4 border-b border-gray-200">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Admin Section -->
            <div id="adminSection" class="section">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4 text-black">View Admin</h2>
                    <nav class="text-gray-600 mb-6">
                        <ol class="list-reset flex">
                            <li><a href="#" class="text-blue-600">Dashboard</a></li>
                            <li><span class="mx-2">/</span></li>
                            <li>View Admin</li>
                        </ol>
                    </nav>
                    <h3 class="text-xl font-bold mb-4">Admin List</h3>
                    <table class="table-fixed min-w-full shadow-md rounded-lg overflow-hidden divide-y divide-gray-200">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-4 px-6 border-b border-gray-200">#</th>
                                <th class="py-4 px-6 border-b border-gray-200">Name</th>
                                <th class="py-4 px-6 border-b border-gray-200">Email</th>
                                <th class="py-4 px-6 border-b border-gray-200">Date of Birth</th>
                                <th class="py-4 px-6 border-b border-gray-200">Contact</th>
                                <th class="py-4 px-6 border-b border-gray-200">Edit</th>
                                <th class="py-4 px-6 border-b border-gray-200">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-gray-700">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM admin");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td class="py-4 px-6 text-center border-b border-gray-200"><?php echo $cnt; ?></td>
                                    <td class="py-4 px-6 text-center border-b border-gray-200"><?php echo $row['admin_name']; ?></td>
                                    <td class="py-2 px-4 text-center border-b border-gray-200"><?php echo $row['admin_email']; ?></td>
                                    <td class="py-2 px-4 text-center border-b border-gray-200"><?php echo $row['admin_dob']; ?></td>
                                    <td class="py-2 px-4 text-center border-b border-gray-200"><?php echo $row['admin_phone']; ?></td>
                                    <td class="py-4 px-6 border-b border-gray-200 text-center">
                                        <a href="#">
                                            <button class="bg-teal-500 hover:bg-teal-600  text-white font-bold py-2 px-4 rounded-md">Edit</button>
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 border-b border-gray-200 text-center">
                                        <a href="#">
                                            <button class="bg-red-500 hover:bg-red-600  text-white font-bold py-2 px-4 rounded-md">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $cnt = $cnt + 1;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- User Section -->
            <div id="userSection" class="section">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4 text-black">View User</h2>
                    <nav class="text-gray-600 mb-6">
                        <ol class="list-reset flex">
                            <li><a href="#" class="text-blue-600">Dashboard</a></li>
                            <li><span class="mx-2">/</span></li>
                            <li>View User</li>
                        </ol>
                    </nav>
                    <h3 class="text-xl font-bold mb-4">User List</h3>
                    <table class="table-fixed min-w-full shadow-md rounded-lg overflow-hidden divide-y divide-gray-200">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-4 px-6 border-b border-gray-200">#</th>
                                <th class="py-4 px-6 border-b border-gray-200">Name</th>
                                <th class="py-4 px-6 border-b border-gray-200">Email</th>
                                <th class="py-4 px-6 border-b border-gray-200">Phone</th>
                                <th class="py-4 px-6 border-b border-gray-200">Registered In</th>
                                <th class="py-4 px-6 border-b border-gray-200">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-gray-700">
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM users");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($query)) {
                            ?>

                                <tr>
                                    <td class="py-4 px-6 text-center border-b border-gray-200"><?php echo $cnt; ?></td>
                                    <td class="py-4 px-6 text-center border-b border-gray-200"><?php echo $row['name']; ?></td>
                                    <td class="py-2 px-4 text-center border-b border-gray-200"><?php echo $row['email']; ?></td>
                                    <td class="py-2 px-4 text-center border-b border-gray-200"><?php echo $row['phone']; ?></td>
                                    <td class="py-2 px-4 text-center border-b border-gray-200"><?php echo $row['created_at']; ?></td>
                                    <td class="py-4 px-6 border-b border-gray-200 text-center">
                                        <a href="#">
                                            <button class="bg-red-500 hover:bg-red-600  text-white font-bold py-2 px-4 rounded-md">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $cnt = $cnt + 1;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Property Section -->
            <div id="propertySection" class="section">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4 text-black">View Property Management</h2>
                    <nav class="text-gray-600 mb-6">
                        <ol class="list-reset flex">
                            <li><a href="#" class="text-blue-600">Dashboard</a></li>
                            <li><span class="mx-2">/</span></li>
                            <li>View Property Management</li>
                        </ol>
                    </nav>
                    <h3 class="text-xl font-bold mb-4">Property List</h3>
                    <table class="table-fixed min-w-full shadow-md rounded-lg overflow-hidden divide-y divide-gray-200">
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
                            $query = mysqli_query($conn, "SELECT * FROM `properties`");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-20 w-30">
                                                <img class="h-20 w-30 rounded-lg" src="../assets/images/<?php echo $row['property_image']; ?>" alt="Property Image">
                                            </div>
                                            <div class="ml-4">
                                                <a href="../property_details.php?property_id=<?php echo $row['property_id']; ?>">
                                                    <div class="text-sm font-medium text-gray-900"><?php echo $row['title']; ?></div>
                                                    <div class="text-sm text-gray-500"><?php echo $row['address']; ?></div>
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
                                        <a href="../edit_property.php?property_id=<?php echo $row['property_id']; ?>">
                                            <button class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-md">Update</button>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <a href="../delete_property.php?property_id=<?php echo $row['property_id']; ?>">
                                            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">Delete</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>


    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('show');
        }

        function showSection(id) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                section.classList.remove('show');
            });
            const activeSection = document.getElementById(id);
            activeSection.classList.add('show');
        }
    </script>
</body>

</html>