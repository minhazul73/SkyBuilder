<?php
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
session_start();
include("config/config.php");
if (!(isset($_SESSION['user_id']) || isset($_SESSION['admin_id']))) {
    header("location:login.php");
}

//// code insert
//// add code

$msg = "";
if (isset($_POST['add'])) {
    $property_id = $_REQUEST['property_id'];

    $title = $_POST['title'];
    $description = $_POST['description'];
    $property_type = $_POST['property_type'];
    $bedroom = $_POST['bedroom'];
    $bathroom = $_POST['bathroom'];
    $balcony = $_POST['balcony'];
    $total_floor = $_POST['total_floor'];
    $area_size = $_POST['area_size'];
    $price = $_POST['price'];
    $address = $_POST['address'];
    $district=$_POST['district'];
    $parking = $_POST['parking'];
    $cctv = $_POST['cctv'];
    $security = $_POST['security'];
    $elevator = $_POST['elevator'];
    $user_id = $_SESSION['user_id'];

    $property_image = $_FILES['property_image']['name'];
    $temp_name  = $_FILES['property_image']['tmp_name'];

    if (!empty($property_image)) {
        move_uploaded_file($temp_name, "assets/images/$property_image.jpg");
    } else {
        $property_image = $_POST['existing_image'];
    }

    $sql = "UPDATE properties SET title= '{$title}', property_description= '{$description}', property_type='{$property_type}', 
    bedroom='{$bedroom}', bathroom='{$bathroom}', balcony='{$balcony}', total_floor='{$total_floor}', 
    area_size='{$area_size}', price='{$price}', address='{$address}',district='{$district}', parking='{$parking}',cctv='{$cctv}',security='{$security}',elevator='{$elevator}',
    property_image='{$property_image}', user_id='{$user_id}' WHERE property_id = {$property_id}";

    $result = mysqli_query($conn, $sql);
    if ($result == true) {
        $msg = "<p class='alert alert-success'>Property Updated</p>";
        header("Location:profile.php?msg=$msg");
    } else {
        $msg = "<p class='alert alert-warning'>Property Not Updated</p>";
        header("Location:profile.php?msg=$msg");
    }
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
    <title>Document</title>
</head>

<body>

    <?php include 'includes/header.php'; ?>

    <div class="pt-28 bg-white text-center">
        <h2 class="h2 section-title text-3xl font-bold  text-black/80">Update Property</h2>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <?php

        $property_id = $_REQUEST['property_id'];
        $query = mysqli_query($conn, "SELECT * FROM `properties` WHERE property_id='$property_id'");
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="px-28 py-8 bg-white text-black text-2xl">
                <h4 class="">Basic Information</h4>
                <div class="grid gird-cols-1 place-items-center m-8">
                    <label class="form-control w-full max-w-5xl">
                        <div class="label">
                            <span class="label-text text-black">Title</span>
                        </div>
                        <input type="text" name="title" class="input input-bordered w-full bg-white  border-slate-950 " required value="<?php echo $row['title']; ?>" />
                    </label>

                    <label class="form-control w-full max-w-5xl">
                        <div class="label">
                            <span class="label-text text-black">Description</span>
                        </div>
                        <textarea name="description" class="textarea textarea-bordered w-full bg-white  border-slate-950 h-44" placeholder=" Write your property Descriptipn here"><?php echo $row['property_description']; ?></textarea>
                    </label>

                    <label class="form-control w-full max-w-5xl">
                        <div class="label">
                            <span class="label-text text-black">Address</span>
                        </div>
                        <input type="text" name="address" class="input input-bordered w-full bg-white  border-slate-950 " required value="<?php echo $row['address']; ?>" />
                    </label>
                </div>

                <div class="grid grid-cols-2 place-items-center gap-x-8 gap-y-2 m-8">
                    <label class="form-control w-full max-w-sm">
                        <div class="label">
                            <span class="label-text text-black">Property Type</span>
                        </div>
                        <select name="property_type" class="select select-bordered w-full bg-white  border-slate-950">
                            <option disabled>Select Type</option>
                            <option value="Apartment" <?php if($row['property_type'] == 'Apartment') echo 'selected'; ?>>Apartment</option>
                            <option value="Flat" <?php if($row['property_type'] == 'Flat') echo 'selected'; ?>>Flat</option>
                            <option value="Building" <?php if($row['property_type'] == 'Building') echo 'selected'; ?>>Building</option>
                            <option value="House" <?php if($row['property_type'] == 'House') echo 'selected'; ?>>House</option>
                            <option value="Vilaa" <?php if($row['property_type'] == 'Vilaa') echo 'selected'; ?>>Vilaa</option>
                        </select>
                    </label>

                    <label class="form-control w-full max-w-sm">
                        <div class="label">
                            <span class="label-text text-black">Bedroom</span>
                        </div>
                        <input type="text" name="bedroom" class="input input-bordered w-full bg-white  border-slate-950" required value="<?php echo $row['bedroom']; ?>" />
                    </label>

                    <label class="form-control w-full max-w-sm">
                        <div class="label">
                            <span class="label-text text-black">Bathroom</span>
                        </div>
                        <input type="text" name="bathroom" class="input input-bordered w-full bg-white  border-slate-950" required value="<?php echo $row['bathroom']; ?>" />
                    </label>
                    <label class="form-control w-full max-w-sm">
                        <div class="label">
                            <span class="label-text text-black">Balcony</span>
                        </div>
                        <input type="text" name="balcony" class="input input-bordered w-full bg-white  border-slate-950" required value="<?php echo $row['balcony']; ?>" />
                    </label>
                </div>
            </div>

            <div class="px-28 py-8 bg-white text-black text-2xl">
                <h4 class="">Price and Location</h4>

                <div class="grid grid-cols-2 place-items-center gap-x-8 gap-y-2 m-8">
                    <label class="form-control w-full max-w-sm">
                        <div class="label">
                            <span class="label-text text-black">Total Floor</span>
                        </div>
                        <select name="total_floor" class="select select-bordered w-full bg-white  border-slate-950">
                            <option disabled>Select Floor</option>
                            <option value="1 floor" <?php if($row['total_floor'] == '1 floor') echo 'selected'; ?>>1 floor</option>
                            <option value="2 floor" <?php if($row['total_floor'] == '2 floor') echo 'selected'; ?>>2 floor</option>
                            <option value="3 floor" <?php if($row['total_floor'] == '3 floor') echo 'selected'; ?>>3 floor</option>
                            <option value="4 floor" <?php if($row['total_floor'] == '4 floor') echo 'selected'; ?>>4 floor</option>
                            <option value="5 floor" <?php if($row['total_floor'] == '5 floor') echo 'selected'; ?>>5 floor</option>
                            <option value="6 floor" <?php if($row['total_floor'] == '6 floor') echo 'selected'; ?>>6 floor</option>
                            <option value="7 floor" <?php if($row['total_floor'] == '7 floor') echo 'selected'; ?>>7 floor</option>
                            <option value="8 floor" <?php if($row['total_floor'] == '8 floor') echo 'selected'; ?>>8 floor</option>
                            <option value="9 floor" <?php if($row['total_floor'] == '9 floor') echo 'selected'; ?>>9 floor</option>
                            <option value="10 floor" <?php if($row['total_floor'] == '10 floor') echo 'selected'; ?>>10 floor</option>
                            <option value="11 floor" <?php if($row['total_floor'] == '11 floor') echo 'selected'; ?>>11 floor</option>
                            <option value="12 floor" <?php if($row['total_floor'] == '12 floor') echo 'selected'; ?>>12 floor</option>
                            <option value="13 floor" <?php if($row['total_floor'] == '13 floor') echo 'selected'; ?>>13 floor</option>
                            <option value="14 floor" <?php if($row['total_floor'] == '14 floor') echo 'selected'; ?>>14 floor</option>
                            <option value="15 floor" <?php if($row['total_floor'] == '15 floor') echo 'selected'; ?>>15 floor</option>
                        </select>
                    </label>

                    <label class="form-control w-full max-w-sm">
                        <div class="label">
                            <span class="label-text text-black">Area Size</span>
                        </div>
                        <input type="text" name="area_size" class="input input-bordered w-full bg-white  border-slate-950" required value="<?php echo $row['area_size']; ?>" />
                    </label>

                    <label class="form-control w-full max-w-sm">
                        <div class="label">
                            <span class="label-text text-black">Price</span>
                        </div>
                        <input type="text" name="price" class="input input-bordered w-full bg-white  border-slate-950" required value="<?php echo $row['price']; ?>" />
                    </label>

                    <label class="form-control w-full max-w-sm">
                        <div class="label">
                            <span class="label-text text-black">District</span>
                        </div>
                        <input type="text" name="district" class="input input-bordered w-full bg-white  border-slate-950" required value="<?php echo $row['district']; ?>" />
                    </label>
                </div>
            </div>

            <div class="px-28 py-8 bg-white text-black text-2xl">
                <h4 class="">Features</h4>

                <div class="grid grid-cols-2 place-items-center gap-x-8 gap-y-2 m-8">
                    <label class="form-control w-full max-w-sm">
                        <div class="label">
                            <span class="label-text text-black">Parking</span>
                        </div>
                        <select name="parking" class="select select-bordered w-full bg-white  border-slate-950">
                            <option disabled>Pick one</option>
                            <option value="1" <?php if($row['parking'] == '1') echo 'selected'; ?>>Yes</option>
                            <option value="0" <?php if($row['parking'] == '0') echo 'selected'; ?>>No</option>
                        </select>
                    </label>

                    <label class="form-control w-full max-w-sm">
                        <div class="label">
                            <span class="label-text text-black">CCTV</span>
                        </div>
                        <select name="cctv" class="select select-bordered w-full bg-white  border-slate-950">
                            <option disabled>Pick one</option>
                            <option value="1" <?php if($row['cctv'] == '1') echo 'selected'; ?>>Yes</option>
                            <option value="0" <?php if($row['cctv'] == '0') echo 'selected'; ?>>No</option>
                        </select>
                    </label>

                    <label class="form-control w-full max-w-sm">
                        <div class="label">
                            <span class="label-text text-black">Security</span>
                        </div>
                        <select name="security" class="select select-bordered w-full bg-white  border-slate-950">
                            <option disabled>Pick one</option>
                            <option value="1" <?php if($row['security'] == '1') echo 'selected'; ?>>Yes</option>
                            <option value="0" <?php if($row['security'] == '0') echo 'selected'; ?>>No</option>
                        </select>
                    </label>

                    <label class="form-control w-full max-w-sm">
                        <div class="label">
                            <span class="label-text text-black">Elevator</span>
                        </div>
                        <select name="elevator" class="select select-bordered w-full bg-white  border-slate-950">
                            <option disabled>Pick one</option>
                            <option value="1" <?php if($row['elevator'] == '1') echo 'selected'; ?>>Yes</option>
                            <option value="0" <?php if($row['elevator'] == '0') echo 'selected'; ?>>No</option>
                        </select>
                    </label>
                </div>
            </div>

            <div class="px-28 py-8 bg-white text-black text-2xl">
                <h4 class="">Image</h4>

                <div class="grid grid-cols-2 place-items-center gap-x-8 gap-y-2 m-8">
                    <label class="form-control w-full max-w-xs">
                        <div class="label">
                            <span class="label-text text-black">Pick a image file</span>
                        </div>
                        <input type="file" name="property_image" class="file-input file-input-bordered w-full bg-white  border-slate-950 max-w-xs" />
                        <input type="hidden" name="existing_image" value="<?php echo $row['property_image']; ?>">
                    </label>
                </div>
            </div>

            <div class="px-28 pb-8 flex justify-center bg-white">
                <button type="submit" name="add" value="Submit Property" class="bg-[#16a249] text-white px-4 py-2 rounded-md">Submit Property</button>
            </div>
    </form>
      <?php
        }
       ?>

<?php include 'includes/footer.php'; ?>
</body>
</html>
