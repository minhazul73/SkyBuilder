<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config/config.php");								
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>

<body>

    <?php include 'includes/header.php'; ?>

    <div class="pt-28 bg-white text-center">
        <h2 class="h2 section-title text-3xl font-bold  text-black/80">Property Details</h2>
    </div>

    <div class=" bg-white">

        <?php
        $property_id = $_REQUEST['property_id'];
        $query = mysqli_query($conn, "SELECT properties.*, users.* FROM `properties`,`users` WHERE properties.user_id=users.user_id and property_id='$property_id'");
        while ($row = mysqli_fetch_array($query)) { ?>

            <div class="max-w-6xl mx-auto bg-white p-6 shadow-xl rounded-lg">
                <!-- Property Image -->
                <div class="w-full h-full bg-gray-300 rounded-lg overflow-hidden">
                    <img src="assets/images/<?php echo $row['property_image']; ?>" alt="<?php echo $row['property_image']; ?>" class="w-full h-full object-cover">
                </div>

                <!-- Property Title and Price -->
                <div class="mt-4 flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl text-slate-700 font-bold"><?php echo $row['title']; ?></h1>
                        <p class="text-green-600">For Sale</p>
                        <p class="text-gray-600"><?php echo "{$row['address']}, {$row['district']}"; ?></p>
                    </div>
                    <div>
                        <p class="text-end text-gray-600">Price</p>
                        <p class="text-3xl text-green-500"><?php echo $row['price']; ?>৳</p>
                    </div>
                </div>

                <!-- Property Info -->
                <div class="mt-4 grid grid-cols-2 gap-4 text-center">
                    <div class="border-4 border-slate-300 rounded-lg text-gray-600 p-2"><?php echo $row['area_size']; ?> Sqf</div>
                    <div class="border-4 border-slate-300 rounded-lg text-gray-600 p-2"><?php echo $row['bedroom']; ?> Bedrooms</div>
                    <div class="border-4 border-slate-300 rounded-lg text-gray-600 p-2"><?php echo $row['bathroom']; ?> Bathrooms</div>
                    <div class="border-4 border-slate-300 rounded-lg text-gray-600 p-2"><?php echo $row['balcony']; ?> Balconies</div>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <h2 class="text-xl text-slate-700 font-bold">Description</h2>
                    <p class="text-gray-600 mt-2">Detailed description of the property...</p>
                </div>

                <!-- Property Summary -->
                <div class="mt-6">
                    <h2 class="text-xl text-slate-700 font-bold">Property Summary</h2>
                    <table class="w-full mt-2 text-slate-600 text-left">
                        <tbody>
                            <tr class="border-b">
                                <td class="py-2">Property Type :</td>
                                <td><?php echo $row['property_type']; ?></td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">Total Floor :</td>
                                <td><?php echo $row['total_floor']; ?></td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">Address :</td>
                                <td><?php echo $row['address']; ?></td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">District :</td>
                                <td><?php echo $row['district']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Features -->
                <div class="mt-6">
                    <h2 class="text-xl text-slate-700 font-bold">Features</h2>
                    <div class="grid grid-cols-2 gap-4 text-slate-600 mt-2">
                        <div>Security: <?php if($row['security']) echo "Yes"; else echo "No"; ?></div>
                        <div>Parking: <?php if($row['parking']) echo "Yes"; else echo "No"; ?></div>
                        <div>Elevator: <?php if($row['elevator']) echo "Yes"; else echo "No"; ?></div>
                        <div>CCTV: <?php if($row['cctv']) echo "Yes"; else echo "No"; ?></div>
                    </div>
                </div>



                <!-- Contact Seller -->
                <div class="mt-6">
                    <h2 class="text-xl text-slate-700 font-bold">Contact Seller</h2>
                    <div class="flex items-center mt-2">
                        <img src="assets/images/property-1.jpg" alt="Seller Image" class="w-16 h-16 rounded-full shadow-lg">
                        <div class="ml-4 text-slate-700">
                            <p class="font-bold"><?php echo $row['name']; ?></p>
                            <p class="text-gray-600"><?php echo $row['phone']; ?></p>
                            <p class="text-gray-600"><?php echo $row['email']; ?></p>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>








    <?php include 'includes/footer.php'; ?>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>