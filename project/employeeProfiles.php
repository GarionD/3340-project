<!-- employeeProfiles.php -->
<?php
// database connection settings
$host = 'localhost';
$db   = 'dejongeg_project';
$user = 'dejongeg_project'; 
$pass = 'npEXvXTwVrvqUwXXhwVZ'; 

// create connection
$conn = new mysqli($host, $user, $pass, $db);

// check connection
if ($conn->connect_error) 
{
    die("conn failed: " . $conn->connect_error);
}

// query all employee records
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>

<!-- html for displaying all the employees from the employee table with their profile pictures -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta name="author" content="Garion DeJonge">
    <meta name="description" content="Employee Profile Photos">
    <meta name="keywords" content="Employee Images, Display, Staff Profiles, Media, GSS">

    <!-- page title -->
    <title>Employee Profiles | GSS</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- home icon -->
    <a href="index.html" class="home-button">
        <span class="iconHome">home</span>
    </a>

    <!-- settings dropdown -->
    <div class="dropdown settings-dropdown">
        <button class="btn btn-light dropdown-toggle material-icons" type="button" id="settingsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            settings
        </button>
        <ul class="dropdown-menu" aria-labelledby="settingsDropdown">
            <li>
                <button class="dropdown-item" onclick="toggleDarkMode()">
                    <span class="material-icons">dark_mode</span> Toggle Dark Mode
                </button>
            </li>
            <li>
                <button class="dropdown-item" onclick="toggleFont()">
                    <span class="material-icons">text_fields</span> Toggle Font Style
                </button>
            </li>
            <li>
                <button class="dropdown-item" onclick="toggleFontWeight()">
                    <span class="material-icons">format_bold</span> Toggle Bold Text
                </button>
            </li>
        </ul>

        <!-- wiki page for help with the employee profile view -->
        <a href="employeeProfilesHelp.html" class="btn" style="background-color: gold; color: black; font-weight: bold;">
            WIKI Help
        </a>

    </div>

    <!-- header -->
    <header>
        <div class="header-content">
            <svg class="logo" width="160" height="130" viewBox="0 0 200 200">
                <path d="M10,50 L100,150 L190,50 L170,50 L100,120 L30,50 Z" class="logo-shape" />
                <text x="50%" y="45%" text-anchor="middle" class="logo-text">GSS</text>
            </svg>
            <h1>Employee Profiles</h1>
        </div>
    </header>

    <!-- main content -->
    <main class="container my-5">
        <h2 class="mb-4 text-center">Staff Profile Photos</h2>

        <!-- PHP for getting the employee record data -->
        <?php if ($result && $result->num_rows > 0): ?>
            <!-- div to hold table rows and columns -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                <!-- loop to get all the records and the records values while also getting the current records image from the image folder using the employee id -->
                <?php while($row = $result->fetch_assoc()): 
                    $id = htmlspecialchars($row["employee_id"]);
                    $name = htmlspecialchars($row["name"]);
                    $age = htmlspecialchars($row["age"]);
                    $email = htmlspecialchars($row["email"]);
                    $phone = htmlspecialchars($row["phone"]);
                    $dept = htmlspecialchars($row["department"]);
                    $status = htmlspecialchars($row["status"]);
                    // get image from folder during loop as they are named using the record employee ids
                    $imagePath = "images/" . $id . ".jpg";
                ?>
                    <!-- format columns with information retrived above -->
                    <div class="col text-center">
                        <!-- use a card to hold the image and record info -->
                        <div class="card h-100">
                            <!-- check if the image exists in the images folder -->
                            <?php if (file_exists($imagePath)): ?>
                                <!-- add the image as the card top -->
                                <img src="<?= $imagePath ?>" class="card-img-top img-fluid" alt="Employee Image">
                            <?php else: ?>
                                <!-- add text to explain there is no image availible for this staff -->
                                <img src="images/default.jpg" class="card-img-top img-fluid" alt="No Image">
                            <?php endif; ?>
                            <!-- add the record details to the card as well in the card body with new lines inbetween them -->
                            <div class="card-body">
                                <!-- let the card title be the employees name -->
                                <h5 class="card-title"><?= $name ?></h5>
                                <p class="card-text text-start">
                                    <strong>ID:</strong> <?= $id ?><br>
                                    <strong>Name:</strong> <?= $name ?><br>
                                    <strong>Age:</strong> <?= $age ?><br>
                                    <strong>Email:</strong> <?= $email ?><br>
                                    <strong>Phone:</strong> <?= $phone ?><br>
                                    <strong>Department:</strong> <?= $dept ?><br>
                                    <strong>Status:</strong> <?= $status ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <!-- if no employee records were found use this text -->
            <p class="text-center">No employee profiles found.</p>
        <?php endif; ?>

        <!-- close the conn now that we are done with it -->
        <?php $conn->close(); ?>
    </main>

    <!-- footer -->
    <footer>
        <div class="footer-content">
            <!-- use logo again at bottom of page -->
            <svg class="logo" width="100" height="80" viewBox="0 0 200 200">
                <path d="M10,50 L100,150 L190,50 L170,50 L100,120 L30,50 Z" class="logo-shape" />
                <text x="50%" y="45%" text-anchor="middle" class="logo-text">GSS</text>
            </svg>
            <!-- add footer text with company information -->
            <div class="footer-text">
                <p>2025 Garion's Super Site. <i>All rights reserved.</i></p>
                <p>Contact Us: supersitesupport@gmail.com</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Java Script external style sheet -->
    <script src="project.js"></script>
</body>

</html>
