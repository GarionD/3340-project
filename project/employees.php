<!-- employees.php -->
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

<!-- html for employee table -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta name="author" content="Garion DeJonge">
    <meta name="description" content="View All Employees">
    <meta name="keywords" content="Employee Portal, View, GSS, Employees">

    <!-- page title -->
    <title>View Employees | GSS</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- External CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- home icon to go to homepage -->
    <a href="index.html" class="home-button">
        <span class="iconHome">home</span>
    </a>

    <!-- settings dropdown to change common template-->
    <div class="dropdown settings-dropdown d-flex align-items-center gap-2">
        <!-- this button is a dropdown button that conatins the template buttons -->
        <button class="btn btn-light dropdown-toggle d-flex align-items-center gap-1" type="button" id="settingsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="material-icons">settings</span>
        </button>
        <!-- ul list to display the template buttons -->
        <ul class="dropdown-menu" aria-labelledby="settingsDropdown">
            <!-- this button toggles dark mode -->
            <li>
                <button class="dropdown-item" onclick="toggleDarkMode()">
                    <span class="material-icons">dark_mode</span> Toggle Dark Mode
                </button>
            </li>
            <!-- this button toggles a more professional font across webpage text -->
            <li>
                <button class="dropdown-item" onclick="toggleFont()">
                    <span class="material-icons">text_fields</span> Toggle Font Style
                </button>
            </li>
            <!-- this button toggles bold styles to text for users who need bigger brighter text to read -->
            <li>
                <button class="dropdown-item" onclick="toggleFontWeight()">
                    <span class="material-icons">format_bold</span> Toggle Bold Text
                </button>
            </li>
        </ul>
        <a href="employeesHelp.html" class="btn" style="background-color: gold; color: black; font-weight: bold;">WIKI Help</a>
    </div>

    <!-- header -->
    <header>
        <div class="header-content">
            <!-- custom logo design to represent the company -->
            <svg class="logo" width="160" height="130" viewBox="0 0 200 200">
                <path d="M10,50 L100,150 L190,50 L170,50 L100,120 L30,50 Z" class="logo-shape" />
                <text x="50%" y="45%" text-anchor="middle" class="logo-text">GSS</text>
            </svg>
            <h1>All Employees</h1>
        </div>
    </header>

    <!-- main content -->
    <main class="container my-5">
        <h2 class="mb-4 text-center">Employee Records</h2>

        <!-- php for keeping track of rows outputted -->
        <?php if ($result && $result->num_rows > 0): ?>
            <!-- responsive table container -->
            <div class="table-responsive">
                <!-- striped table -->
                <table class="table table-bordered table-striped">
                    <!-- table header -->
                    <thead class="table-primary">
                        <!-- table header -->
                        <tr>
                            <!-- table columns -->
                            <th>ID</th><th>Name</th><th>Age</th><th>Email</th><th>Phone</th><th>Department</th><th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php to populate the tables values by iterating over records in a while loop -->
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <!-- get the current iteration values in row -->
                            <td><?= htmlspecialchars($row["employee_id"]) ?></td>
                            <td><?= htmlspecialchars($row["name"]) ?></td>
                            <td><?= htmlspecialchars($row["age"]) ?></td>
                            <td><?= htmlspecialchars($row["email"]) ?></td>
                            <td><?= htmlspecialchars($row["phone"]) ?></td>
                            <td><?= htmlspecialchars($row["department"]) ?></td>
                            <td><?= htmlspecialchars($row["status"]) ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <!-- if no employee record were found -->
            <p class="text-center">No employees found.</p>
        <?php endif; ?>

        <!-- close conn we are done with it -->
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