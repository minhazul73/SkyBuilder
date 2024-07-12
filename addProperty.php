<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config/config.php");
if(!isset($_SESSION['user_id']))
{
  header("location:login.php");
}

//// code insert
//// add code
$error="";
$msg="";
if(isset($_POST['add']))
{
  
  $title=$_POST['title'];
  $description=$_POST['description'];
  $property_type=$_POST['property_type'];
  $bedroom=$_POST['bedroom'];
  $bathroom=$_POST['bathroom'];
  $balcony=$_POST['balcony'];
  $total_floor=$_POST['total_floor'];
  $area_size=$_POST['area_size'];
  $price=$_POST['price'];
  $address=$_POST['address'];
  $district=$_POST['district'];
  $parking=$_POST['parking'];
  $cctv=$_POST['cctv'];
  $security=$_POST['security'];
  $elevator=$_POST['elevator'];
  $user_id=$_SESSION['user_id'];
  
  
  $property_image=$_FILES['property_image']['name'];

  $temp_name  =$_FILES['property_image']['tmp_name'];
  
  move_uploaded_file($temp_name,"assets/images/$property_image");
  
  $sql="insert into properties (title,property_description,property_type,bedroom,bathroom,balcony,total_floor,area_size,price,address,district,parking,cctv,security,elevator,property_image,user_id)
  values('$title','$description','$property_type','$bedroom','$bathroom','$balcony','$total_floor','$area_size','$price','$address','$district','$parking','$cctv','$security','$elevator','$property_image','$user_id')";
  $result=mysqli_query($conn,$sql);
  if($result)
    {
      $msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
          
    }
    else
    {
      $error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
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
  <!-- "test": "echo \"Error: no test specified\" && exit 1" -->
  <title>Document</title>
</head>

<body>

  <?php include 'includes/header.php'; ?>

  <div class="pt-28 bg-white text-center">
    <h2 class="h2 section-title text-3xl font-bold text-black/80">Featured Properties</h2>
  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="px-28 py-8 bg-white text-black text-2xl">
      <h4 class="">Basic Information</h4>
      <div class="grid gird-cols-1 place-items-center m-8">
      <?php echo $error; ?>
      <?php echo $msg; ?>
        <label class="form-control w-full max-w-5xl">
          <div class="label">
            <span class="label-text text-black">Title</span>
          </div>
          <input type="text" name="title" placeholder="Enter : Title" class="input input-bordered w-full bg-white  border-slate-950	 " />
        </label>

        <label class="form-control w-full max-w-5xl">
          <div class="label">
            <span class="label-text text-black">Description</span>
          </div>
          <textarea name="description" class="textarea textarea-bordered w-full bg-white  border-slate-950 h-44" placeholder=" Write your property Descriptipn here"></textarea>
        </label>

        <label class="form-control w-full max-w-5xl">
          <div class="label">
            <span class="label-text text-black">Address</span>
          </div>
          <input type="text" name="address" placeholder="Enter : Address" class="input input-bordered w-full bg-white  border-slate-950	 " />
        </label>
      </div>


      <div class="grid grid-cols-2 place-items-center gap-x-8 gap-y-2 m-8">
        <label class="form-control w-full max-w-sm">
          <div class="label">
            <span class="label-text text-black">Property Type</span>
          </div>
          <select name="property_type" class="select select-bordered w-full bg-white  border-slate-950">
            <option disabled selected>Select Type</option>
            <option>Apartment</option>
            <option>Flat</option>
            <option>Building</option>
            <option>House</option>
            <option>Vilaa</option>
          </select>
        </label>

        <label class="form-control w-full max-w-sm">
          <div class="label">
            <span class="label-text text-black">Bedroom</span>
          </div>
          <input type="text" name="bedroom" placeholder="Enter : Bedroom" class="input input-bordered w-full bg-white  border-slate-950" />
        </label>

        <label class="form-control w-full max-w-sm">
          <div class="label">
            <span class="label-text text-black">Bathroom</span>
          </div>
          <input type="text" name="bathroom" placeholder="Enter : Bathroom" class="input input-bordered w-full bg-white  border-slate-950" />
        </label>
        <label class="form-control w-full max-w-sm">
          <div class="label">
            <span class="label-text text-black">Balcony</span>
          </div>
          <input type="text" name="balcony" placeholder="Enter : Balcony" class="input input-bordered w-full bg-white  border-slate-950" />
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
            <option disabled selected>Select Floor</option>
            <option>1 floor</option>
            <option>2 floor</option>
            <option>3 floor</option>
            <option>4 floor</option>
            <option>5 floor</option>
            <option>6 floor</option>
            <option>7 floor</option>
            <option>8 floor</option>
            <option>9 floor</option>
            <option>10 floor</option>
            <option>11 floor</option>
            <option>12 floor</option>
            <option>13 floor</option>
            <option>14 floor</option>
            <option>15 floor</option>
          </select>
        </label>

        <label class="form-control w-full max-w-sm">
          <div class="label">
            <span class="label-text text-black">Area Size</span>
          </div>
          <input type="text" name="area_size" placeholder="Enter : Area Size (in sqft)" class="input input-bordered w-full bg-white  border-slate-950" />
        </label>

        <label class="form-control w-full max-w-sm">
          <div class="label">
            <span class="label-text text-black">Price</span>
          </div>
          <input type="text" name="price" placeholder="Enter : Price (in Taka)" class="input input-bordered w-full bg-white  border-slate-950" />
        </label>

        <label class="form-control w-full max-w-sm">
          <div class="label">
            <span class="label-text text-black">District</span>
          </div>
          <input type="text" name="district" placeholder="Enter : District" class="input input-bordered w-full bg-white  border-slate-950" />
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
            <option disabled selected>Pick one</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </label>

        <label class="form-control w-full max-w-sm">
          <div class="label">
            <span class="label-text text-black">CCTV</span>
          </div>
          <select name="cctv" class="select select-bordered w-full bg-white  border-slate-950">
            <option disabled selected>Pick one</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </label>

        <label class="form-control w-full max-w-sm">
          <div class="label">
            <span class="label-text text-black">Security</span>
          </div>
          <select name="security" class="select select-bordered w-full bg-white  border-slate-950">
            <option disabled selected>Pick one</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </label>

        <label class="form-control w-full max-w-sm">
          <div class="label">
            <span class="label-text text-black">Elevator</span>
          </div>
          <select name="elevator" class="select select-bordered w-full bg-white  border-slate-950">
            <option disabled selected>Pick one</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
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
          <input type="file" name="property_image" class="file-input file-input-bordered w-full bg-white  border-slate-950 max-w-xs" required/>
        </label>
      </div>
    </div>

    <div class="px-28 pb-8 flex justify-center bg-white">
      <button type="submit" name="add" value="Submit Property" class="bg-[#16a249] text-white px-4 py-2 rounded-md">Submit Property</button>
    </div>
  </form>

  <?php include 'includes/footer.php'; ?>
</body>
</html>