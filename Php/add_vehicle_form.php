<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: ../Php/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle | SLMoto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../Css/homepage.css">
    <link rel="stylesheet" href="../Css/addVehicle.css">
</head>

<body>
    <!-- Navigation bar -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="brand">
                <a href="#">SL<Span class="subbrand">Moto</Span></a>
            </div>
            <ul class="nav-links">
                <li><a href="../Home.php">Home</a></li>
                <li><a href="#vehicle-list-container">Vehicles</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="./Php/add_vehicle_form.php">Post</a></li>
            </ul>
            <div class="mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="account">
                <?php
                // Check if the user is logged in
                if (isset($_SESSION['user_id'])) {
                    echo '<div class="dropdown">';
                    echo '<button class="dropbtn"><i class="fas fa-user-circle"></i></button>';
                    echo '<div class="dropdown-content">';
                    echo '<a href="account.php">Account</a>';
                    echo '<a href="logout.php">Logout</a>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<a href="./Php/login.php" class="login-btn">Login/Register</a>';
                }
                ?>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="text">
            <h2>Welcome to SLMoto</h2>
            <p>Start by adding a new vehicle to our platform.</p>
            <img src="../Images/png-image.png" alt="car-Image">
        </div>
        <div class="form-container">
            <!-- Your form content here -->
            <div class="container">
                <h1>Add New Vehicle</h1>
                <form action="../process_add_vehicle.php" method="POST" enctype="multipart/form-data">
                    <!-- Vehicle Name -->
                    <label for="vehicle_name">Vehicle Name:</label><br>
                    <input type="text" id="vehicle_name" name="vehicle_name" required><br><br>

                    <!-- Description -->
                    <label for="description">Description:</label><br>
                    <textarea id="description" name="description" rows="4" required></textarea><br><br>

                    <!-- Price per Day -->
                    <label for="price">Price per Day ($):</label><br>
                    <input type="number" id="price" name="price" min="0" step="0.01" required><br><br>

                    <!-- Image File -->
                    <label for="image_file">Image File:</label><br>
                    <input type="file" id="image_file" name="image_file" accept="image/*" required><br><br>

                    <!-- Phone Number -->
                    <label for="phone_number">Phone Number:</label><br>
                    <input type="text" id="phone_number" name="phone_number" required><br><br>

                    <!-- Available Time Duration (Dropdown) -->
                    <label for="time_duration">Available Time Duration:</label><br>
                    <select id="time_duration" name="time_duration" required>
                        <option value="1_day">1 Day</option>
                        <option value="3_days">3 Days</option>
                        <option value="1_week">1 Week</option>
                        <!-- Add more options as needed -->
                    </select><br><br>

                    <!-- Hidden Fields for User Name and Email (Retrieved from Session) -->
                    <?php
    

                    // Check if the user is logged in
                    if (isset($_SESSION['user_id'])) {
                        $user_name = $_SESSION['user_name'];
                        $user_email = $_SESSION['email'];
                        echo '<input type="hidden" name="user_name" value="' . $user_name . '">';
                        echo '<input type="hidden" name="email" value="' . $user_email . '">';
                    }
                    ?>

                    <!-- Submit Button -->
                    <input type="submit" value="Add Vehicle">
                </form>
            </div>
        </div>
    </div>

    <script>
        const mobileMenu = document.querySelector('.mobile-menu');
        const navLinks = document.querySelector('.nav-links');

        mobileMenu.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
            navLinks.classList.toggle('show');
        });
    </script>

</body>

</html>
