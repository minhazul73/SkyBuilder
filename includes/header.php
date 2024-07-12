<header>
    <nav>
        <div class="navbar fixed px-10 bg-white shadow z-10">
            <div class="navbar-start">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="#add_property">Add Property</a></li>
                        <li><a href="#">Listing</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                </div>
                <a href="index.php" class="btn btn-ghost text-xl text-neutral-900"><ion-icon name="business-outline" class="text-[#16a249]"></ion-icon>SkyBuilder</a>
            </div>
            <div class="navbar-end">
                <div class="navbar-center hidden lg:flex text-neutral-900">
                    <ul class="menu menu-horizontal px-1">
                    <li><a href="#add_property">Add Property</a></li>
                        <li><a href="#listing">Listing</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#about_us">About Us</a></li>
                    </ul>
                </div>
                <div class="dropdown dropdown-end">
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <div tabindex="0" role="button" class="btn rounded-full px-6 border-none bg-[#16a249] text-slate-100 font-medium">Profile</div>
                        <ul tabindex="0" class="menu dropdown-content z-[1] p-2 shadow bg-slate-50 rounded-box text-[#16a249] font-medium w-36 mt-4">
                            <li><a href="profile.php"> My Profile</a></li>
                            <li><a href="logout.php">Sign Out</a></li>
                        </ul><?php } else { ?>
                        <div tabindex="0" role="button" class="btn rounded-full px-6 border-none bg-[#16a249] text-slate-100 font-medium">Sign In</div>
                        <ul tabindex="0" class="menu dropdown-content z-[1] p-2 shadow bg-slate-50 rounded-box text-[#16a249] font-medium w-36 mt-4">
                            <li><a href="login.php">User SignIn</a></li>
                            <li><a href="admin/login.php">Admin SignIn</a></li>
                        </ul><?php } ?>
                </div>
            </div>
        </div>
    </nav>
</header>





