<!-- searchResults.php -->
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

// variables to help prepare WHERE clause
$where = [];
$params = [];
$types = "";

// build conditions by getting search form results
// employee id is an i type search meaning the entered value must match an id exactly not partially
if (!empty($_GET['employeeId'])) 
{
    $where[] = "employee_id = ?";
    $params[] = $_GET['employeeId'];
    $types .= "i";
}
// name is an s type search meaning the entered value can partially match its table value using LIKE in the query
if (!empty($_GET['name'])) 
{
    $where[] = "name LIKE ?";
    $params[] = "%" . $_GET['name'] . "%";
    $types .= "s";
}
// age is an i type search meaning the entered value must match an id exactly not partially
if (!empty($_GET['age'])) 
{
    $where[] = "age = ?";
    $params[] = $_GET['age'];
    $types .= "i";
}
// email is an s type search meaning the entered value can partially match its table value using LIKE in the query
if (!empty($_GET['email'])) 
{
    $where[] = "email LIKE ?";
    $params[] = "%" . $_GET['email'] . "%";
    $types .= "s";
}
// phone is an s type search meaning the entered value can partially match its table value using LIKE in the query
if (!empty($_GET['phone'])) 
{
    $where[] = "phone LIKE ?";
    $params[] = "%" . $_GET['phone'] . "%";
    $types .= "s";
}
// department is an s type search meaning the entered value can partially match its table value using LIKE in the query
if (!empty($_GET['department'])) 
{
    $where[] = "department LIKE ?";
    $params[] = "%" . $_GET['department'] . "%";
    $types .= "s";
}
// status is an s type search meaning the entered value can partially match its table value using LIKE in the query
if (!empty($_GET['status'])) 
{
    $where[] = "status LIKE ?";
    $params[] = "%" . $_GET['status'] . "%";
    $types .= "s";
}

// build SQL query
$sql = "SELECT * FROM employees";
if (count($where) > 0) 
{
    // get all the values from fields and implode them into the query all serperated by AND logic to get all employees matching all conditions
    $sql .= " WHERE " . implode(" AND ", $where);
}

// prepare the query
$stmt = $conn->prepare($sql);

// bind parameters if true
if (count($params) > 0) 
{
    // bind params to statement
    $stmt->bind_param($types, ...$params);
}

// execute query
$stmt->execute();

// get query results
$result = $stmt->get_result();
?>

<!-- searchResultsTable.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta name="author" content="Garion DeJonge">
    <meta name="description" content="Search Results for Employees">
    <meta name="keywords" content="Employee Portal, Search Results, Sort">

    <!-- page title -->
    <title>Search Results | GSS</title>

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

    <!-- header -->
    <header>
        <div class="header-content">
            <svg class="logo" width="160" height="130" viewBox="0 0 200 200">
                <path d="M10,50 L100,150 L190,50 L170,50 L100,120 L30,50 Z" class="logo-shape" />
                <text x="50%" y="45%" text-anchor="middle" class="logo-text">GSS</text>
            </svg>
            <h1>Search Results</h1>
        </div>
    </header>

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
    </div>

    <!-- main content -->
    <main class="container my-5">
        <h2 class="mb-4 text-center">Matching Employees</h2>

        <!-- php to keep track of rows dispalyed -->
        <?php if ($result && $result->num_rows > 0): ?>
            <!-- responsive table container -->
            <div class="table-responsive">
                <!-- striped table -->
                <table class="table table-bordered table-striped">
                    <!-- table header -->
                    <thead class="table-primary">
                        <tr>
                            <!-- table column names -->
                            <th>ID</th><th>Name</th><th>Age</th><th>Email</th><th>Phone</th><th>Department</th><th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- php to populate the table values by iterating over the records retrived from the search -->
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <!-- put in the field value from the current iterations record for each field -->
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
            <!-- if no employee records were found -->
            <p class="text-center">No employees matching search parameters found.</p>
        <?php endif; ?>

        <!-- back button -->
        <div class="text-center mt-4">
            <a href="search.html" class="btn btn-secondary">Return to Search</a>
        </div>

        <?php
        // close connection
        $stmt->close();
        $conn->close();
        ?>
    </main>

    <!-- footer -->
    <footer>
        <div class="footer-content">
            <svg class="logo" width="100" height="80" viewBox="0 0 200 200">
                <path d="M10,50 L100,150 L190,50 L170,50 L100,120 L30,50 Z" class="logo-shape" />
                <text x="50%" y="45%" text-anchor="middle" class="logo-text">GSS</text>
            </svg>
            <div class="footer-text">
                <p>2025 Garion's Super Site. <i>All rights reserved.</i></p>
                <p>Contact Us: supersitesupport@gmail.com</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS (for dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Java Script -->
    <script src="project.js"></script>

</body>
</html>