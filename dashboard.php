<?php
include "db.php"; // Connect to your kgm database
?>

<!DOCTYPE html>
<html>
<head>
    <title>KGM Applications Dashboard</title>
    <link rel="stylesheet" href="deco.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #0077b6;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table-container {
            overflow-x: auto;
        }
        .section-title {
            margin-top: 50px;
            margin-bottom: 10px;
            color: #0077b6;
            font-size: 1.4em;
        }
    </style>
</head>
<body>

<h2>KGM Applications Dashboard</h2>

<div class="table-container">
    <div class="section-title">Driver Applications</div>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Advert Ref</th>
            <th>CV</th>
            <th>Letter</th>
            <th>Application</th>
            <th>ID Card</th>
            <th>Province</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM drivers ORDER BY id DESC");
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['first_name']."</td>";
            echo "<td>".$row['last_name']."</td>";
            echo "<td>".$row['advert_ref']."</td>";
            echo "<td><a href='uploads/".$row['cv']."' target='_blank'>View</a></td>";
            echo "<td><a href='uploads/".$row['letter']."' target='_blank'>View</a></td>";
            echo "<td><a href='uploads/".$row['application']."' target='_blank'>View</a></td>";
            echo "<td><a href='uploads/".$row['idcard']."' target='_blank'>View</a></td>";
            echo "<td>".$row['province']."</td>";
            echo "<td>".$row['message']."</td>";
            echo "<td>".$row['created_at']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<div class="table-container">
    <div class="section-title">Teacher Applications</div>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Advert Ref</th>
            <th>CV</th>
            <th>Letter</th>
            <th>Application</th>
            <th>ID Card</th>
            <th>Province</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM teachers ORDER BY id DESC");
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['first_name']."</td>";
            echo "<td>".$row['last_name']."</td>";
            echo "<td>".$row['advert_ref']."</td>";
            echo "<td><a href='uploads/".$row['cv']."' target='_blank'>View</a></td>";
            echo "<td><a href='uploads/".$row['letter']."' target='_blank'>View</a></td>";
            echo "<td><a href='uploads/".$row['application']."' target='_blank'>View</a></td>";
            echo "<td><a href='uploads/".$row['idcard']."' target='_blank'>View</a></td>";
            echo "<td>".$row['province']."</td>";
            echo "<td>".$row['message']."</td>";
            echo "<td>".$row['created_at']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
