<?php
session_start();
include 'config/config.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';

$sql = "SELECT * FROM properties WHERE title LIKE '%$search%'";

if ($type) {
  $sql .= " AND type='$type'";
}

$result = $conn->query($sql);
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
  <main>
    <article>
      <section class="section px-10 pt-28 bg-white">
        <div class="hero min-h-screen rounded-3xl " style="background-image: url('assets/images/hero-bg.jpg');">
          <div class="hero-overlay bg-opacity-60 rounded-3xl"></div>
          <div class=" text-center text-neutral-content">
            <div class="max-w-md">
              <h1 class="mb-5 text-5xl font-bold max-w-[19ch] mx-auto text-white leading-0">We will help you find your <span class="inline-block text-green-600">Wonderful</span> home</h1>
              <p class="mb-5 text-white text-1xl leading-relaxed">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
            </div>

          </div>
          <div class="w-full">
            <form action="index.php" method="get" class="mt-[360px] lg:flex lg:gap-4  px-44">
              <input type="text" name="search" placeholder="Search by title" class="w-full border h-full p-3 rounded-md text-slate-800 bg-white">
              <select name="type" class="w-full border p-2 lg:my-0 my-2 rounded-md text-slate-800 bg-white">
                <option value="">Select Type</option>
                <option value="apartment">Apartment</option>
                <option value="house">House</option>
                <option value="land">Land</option>
              </select>
              <button type="submit" class="bg-[#16a249] text-white px-4 py-2 rounded-md">Search</button>
            </form>
          </div>
        </div>

      </section>

      <!-- ABOUT -->
      <section id="add_property" class="about px-52 py-28 bg-white">
        <div class="container mx-auto flex flex-col md:flex-row items-center space-y-8 md:space-y-0 md:space-x-8">
          <div class="flex-1">
            <div class="relative overflow-hidden rounded-2xl size-3/4">
              <img src="assets/images/about-banner.jpg" alt="about banner" class="w-full">
            </div>
          </div>
          <div class="flex-1 text-center md:text-left">
            <h2 class="text-3xl font-bold mb-4 text-black/80" style="max-width: 20ch;">Efficiency. Transparency. Control.</h2>
            <p class="mb-4 text-black/50 text-lg" style="margin-block: 20px 25px;">Hously developed a platform for the Real Estate marketplace
              that allows buyers and sellers to easily execute a transaction on their own. The platform drives
              efficiency, cost transparency and control into the hands of the consumers. Hously is Real Estate
              Redefined.</p>
            <a href="addProperty.php" class="bg-[#16a249] text-white px-7 py-2 rounded">Add Property</a>
          </div>
        </div>
      </section>


      <!-- PROPERTIES -->
      <section id="listing" class="section property px-28 py-12 bg-white" aria-label="property">
        <div class="container mx-auto text-center">

          <h2 class="h2 section-title text-3xl font-bold mb-4 text-black/80">Featured Properties</h2>

          <p class="section-text mb-16 text-black/50 text-lg">A great platform to buy, sell and rent your properties without any agent or
            commissions.</p>

          <ul class="property-list grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            <?php $query = mysqli_query($conn, "SELECT * FROM properties ORDER BY property_id DESC");
            while ($row = mysqli_fetch_array($query)) { ?>
              <li>
                <div class="property-card relative rounded-2xl shadow-lg overflow-hidden transition-shadow duration-300 hover:shadow-xl">

                  <figure class="card-banner relative">
                    <img src="assets/images/<?php echo $row['property_image']; ?>" loading="lazy" alt="<?php echo "{$row['title']}, {$row['address']}"; ?>" class="w-full h-auto">
                  </figure>

                  <div class="card-content p-6 text-blue-900">
                    <div class="min-h-16">
                      <h3 class="h3 text-xl font-semibold mb-4">
                        <a href="property_details.php?property_id=<?php echo $row['property_id']; ?>" class="card-title transition-colors duration-300 hover:text-green-600"><?php echo "{$row['title']}, {$row['address']}, {$row['district']}"; ?></a>
                      </h3>
                    </div>

                    <ul class="card-list flex flex-wrap justify-evenly gap-x-4 gap-y-2 py-4 border-t border-b border-gray-300 mb-6">
                      <li class="card-item flex items-center gap-2">
                        <ion-icon name="cube-outline" class="text-green-600 text-2xl"></ion-icon>
                        <span class="item-text"><?php echo $row['area_size']; ?> sqf</span>
                      </li>
                      <li class="card-item flex items-center gap-2">
                        <ion-icon name="bed-outline" class="text-green-600 text-2xl"></ion-icon>
                        <span class="item-text"><?php echo $row['bedroom']; ?> Beds</span>
                      </li>
                      <li class="card-item flex items-center gap-2">
                        <ion-icon name="man-outline" class="text-green-600 text-2xl"></ion-icon>
                        <span class="item-text"><?php echo $row['bathroom']; ?> Baths</span>
                      </li>
                    </ul>

                    <div class="card-meta flex flex-wrap justify-between items-center gap-4">
                      <div class="flex flex-col justify-start">
                        <span class="meta-title text-start text-gray-500">Price</span>
                        <div>
                          <span class="meta-text text-xl font-medium"><?php echo $row['price']; ?>৳</span>
                        </div>
                      </div>
                      <div class="flex flex-col justify-end">
                        <span class="meta-title text-end text-gray-500">Type</span>
                        <div class="">
                          <span class="meta-text text-xl font-medium"><?php echo $row['property_type'];?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>   <?php } ?>



          </ul>

        </div>
      </section>

      <!-- CONTACT -->

      <section id="contact" class="section contact bg-white" aria-label="contact">
        <div class="container text-center py-16">

          <h2 class="text-3xl font-semibold text-black/80">Have Question? Get in touch!</h2>

          <p class="text-gray-600 my-6">
            A great platform to buy, sell, and rent your properties without any agents or commissions.
          </p>

          <button class="btn btn-primary flex items-center gap-2 mx-auto bg-blue-500 text-white py-2 px-4 rounded-lg">
            <ion-icon name="call-outline" class="text-xl   rounded "></ion-icon>
            <span>Contact us</span>
          </button>

        </div>
      </section>



    </article>
  </main>

  <!-- 
    - #FOOTER
  -->

  <?php include 'includes/footer.php'; ?>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>