<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Caf&eacute;!</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fdfdfd;
            margin: 0;
            padding: 0;
        }
        .mainHeader {
            text-align: center;
            font-size: 2em;
            color: #4B2E2E;
            margin-top: 20px;
        }
        .topnav {
            background-color: #333;
            overflow: hidden;
            text-align: center;
        }
        .topnav a {
            display: inline-block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }
        .center {
            text-align: center;
        }
        .employeeTable {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .employeeTable th, .employeeTable td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .employeeTable thead {
            background-color: #f4f4f4;
            color: #333;
            font-weight: bold;
        }
        .employeeTable tr:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>

    <div id="header" class="mainHeader">
        <hr>
        <div class="center">Azodo Caf&eacute;</div>
    </div>
    <br>
    <hr>
    <div class="topnav">
        <a href="index.php">Home</a>
        <a href="#aboutUs">About Us</a>
        <a href="#contactUs">Contact Us</a>
    </div>
    <hr>
    <div id="mainContent">

        <div id="mainPictures" class="center">
            <table>
                <tr>
                    <td><img src="images/Coffee-and-Pastries.jpg" width="490"></td>
                    <td><img src="images/Cake-Vitrine.jpg" width="450"></td>
                </tr>
            </table>
            <hr>
            <div class="mainHeader"><p>Azodo Caf&eacute; Employee List!</p></div>
            <br>

            <?php
            $connection_string = "host=database-1.cluster-cz4aeocckjuf.us-east-2.rds.amazonaws.com port=5432 dbname=postgres user=postgres password=Passord2025123321";
            $connection = pg_connect($connection_string) or die("Could not connect to the database: " . pg_last_error());

            $query = "SELECT * FROM employee ORDER BY created_at DESC";
            $result = pg_query($connection, $query) or die("Error reading data: " . pg_last_error());

            echo '<table class="employeeTable">';
            echo '<thead><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Created At</th></tr></thead>';
            echo '<tbody>';

            while ($row = pg_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                echo '<td>' . htmlspecialchars($row['fname']) . '</td>';
                echo '<td>' . htmlspecialchars($row['lname']) . '</td>';
                echo '<td>' . htmlspecialchars(date("F j, Y, g:i a", strtotime($row['created_at']))) . '</td>';
                echo '</tr>';
            }

            echo '</tbody></table>';
            ?>
        </div>
    </div>
</body> 
</html>
