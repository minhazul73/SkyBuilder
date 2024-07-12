<?php
include 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['googleUid'])) {
        $name = $conn->real_escape_string($input['name']);
        $email = $conn->real_escape_string($input['email']);
        $googleUid = $conn->real_escape_string($input['googleUid']);
        $profilePicture = $conn->real_escape_string($input['profilePicture']);

        $sql = "INSERT INTO users (name, email, google_uid, profile_picture) VALUES ('$name', '$email', '$googleUid', '$profilePicture') 
                ON DUPLICATE KEY UPDATE name='$name', email='$email', profile_picture='$profilePicture'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => $conn->error]);
        }
    } else {
        $name = $conn->real_escape_string($_POST['name']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$passwordHash')";

        if ($conn->query($sql) === TRUE) {
            header('Location: login.php');
            exit();
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
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
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.1/firebase-auth.js"></script>
    <link rel="stylesheet" href="main.css">
    <title>Register</title>
</head>

<body class="flex font-poppins items-center justify-center bg-white">
    <div class="h-screen w-screen flex justify-center items-center bg-white">
        <div class="grid gap-8">
            <div id="back-div" class="bg-gradient-to-r from-[#16a249] to-teal-600 rounded-[26px] m-4">
                <div class="border-4 border-transparent rounded-[16px] bg-white shadow-lg xl:p-10 2xl:p-10 lg:p-10 md:p-10 sm:p-2 m-2">
                    <h1 class="pb-6 font-bold text-slate-600 text-5xl text-center cursor-default">Register</h1>
                    <form action="register.php" method="post" class="space-y-4">
                        <div>
                            <label for="name" class="mb-2 text-lg text-slate-600">Name</label>
                            <input type="text" name="name" id="name" class="border p-3 shadow-md bg-slate-200 text-slate-700 placeholder:text-base  ease-in-out duration-300 border-gray-300 rounded-lg w-full" placeholder="Name" required />
                        </div>
                        <div>
                            <label for="phone" class="mb-2 text-lg text-slate-600">Phone</label>
                            <input type="text" name="phone" id="phone" class="border p-3 shadow-md bg-slate-200 text-slate-700 placeholder:text-base  ease-in-out duration-300 border-gray-300 rounded-lg w-full" placeholder="Phone" required />
                        </div>
                        <div>
                            <label for="email" class="mb-2 text-lg text-slate-600">Email</label>
                            <input type="email" name="email" id="email" class="border p-3 shadow-md bg-slate-200 text-slate-700 placeholder:text-base  ease-in-out duration-300 border-gray-300 rounded-lg w-full" placeholder="example@gmail.com" required />
                        </div>
                        <div>
                            <label for="password" class="mb-2 text-slate-600 text-lg">Password</label>
                            <input type="password" name="password" id="password" class="border p-3 shadow-md bg-slate-200 text-slate-700 placeholder:text-base  ease-in-out duration-300 border-gray-300 rounded-lg w-full" placeholder="Password" required />
                        </div>
                        <button type="submit" class="bg-gradient-to-r from-[#16a249] to-teal-600 shadow-lg mt-6 p-2 text-white rounded-lg w-full hover:from-teal-600 hover:to-[#16a249] transition duration-300 ease-in-out">Register</button>
                    </form>
                    <div class="flex flex-col mt-4 items-center justify-center text-sm">
                        <h3 class="text-slate-500">Already have an account?
                            <a href="login.php" class="group text-blue-400 transition-all duration-100 ease-in-out">
                                <span class="bg-left-bottom bg-gradient-to-r from-blue-400 to-blue-400 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out">login</span>
                            </a>
                        </h3>
                    </div>
                    <div class="flex flex-col mt-4 items-center justify-center text-sm">
                        <button id="googleSignInButton" class="flex items-center bg-slate-100 border border-gray-300 rounded-lg shadow-md px-6 py-2 text-sm font-medium text-gray-800 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px" viewBox="-0.5 0 48 48" version="1.1"><title>Google-color</title><desc>Created with Sketch.</desc><defs> </defs><g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Color-" transform="translate(-401.000000, -860.000000)"><g id="Google" transform="translate(401.000000, 860.000000)"><path d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24" id="Fill-1" fill="#FBBC05"> </path><path d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333" id="Fill-2" fill="#EB4335"> </path><path d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667" id="Fill-3" fill="#34A853"> </path><path d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24" id="Fill-4" fill="#4285F4"> </path></g></g></g></svg><span>Continue with Google</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Firebase configuration
        const firebaseConfig = {
            apiKey: "YOUR_API_KEY",
            authDomain: "YOUR_AUTH_DOMAIN",
            projectId: "YOUR_PROJECT_ID",
            storageBucket: "YOUR_STORAGE_BUCKET",
            messagingSenderId: "YOUR_MESSAGING_SENDER_ID",
            appId: "YOUR_APP_ID"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        // Google sign-in
        document.getElementById('googleSignInButton').addEventListener('click', () => {
            const provider = new firebase.auth.GoogleAuthProvider();
            firebase.auth().signInWithPopup(provider)
                .then(result => {
                    const user = result.user;
                    const userData = {
                        name: user.displayName,
                        email: user.email,
                        googleUid: user.uid,
                        profilePicture: user.photoURL
                    };
                    fetch('register.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(userData)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                window.location.href = 'login.php';
                            } else {
                                console.error('Error:', data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                })
                .catch(error => console.error('Error during authentication:', error));
        });
    </script>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>