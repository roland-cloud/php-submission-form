<?php
include "db.php"; 

if(isset($_POST['submit'])) {

    
    $position = $_POST['position'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $advert_reference = $_POST['ref_no'];
    $province = $_POST['country'];
    $message = $_POST['message'];

    
    $cv = $_FILES['cv']['name'];
    $letter = $_FILES['letter']['name'];
    $application = $_FILES['application']['name'];
    $idcard = $_FILES['idcard']['name'];

    
    if(!is_dir("uploads")){
        mkdir("uploads", 0777, true);
    }

  
    move_uploaded_file($_FILES['cv']['tmp_name'], "uploads/".$cv);
    move_uploaded_file($_FILES['letter']['tmp_name'], "uploads/".$letter);
    move_uploaded_file($_FILES['application']['tmp_name'], "uploads/".$application);
    move_uploaded_file($_FILES['idcard']['tmp_name'], "uploads/".$idcard);

    
    $table = ($position == "Driver") ? "drivers" : "teachers";

    
    $sql = "INSERT INTO `$table` 
        (`position`, `first_name`, `last_name`, `advert_ref`, `cv`, `letter`, `application`, `idcard`, `province`, `message`) 
        VALUES 
        ('$position', '$first_name', '$last_name', '$advert_ref', '$cv', '$letter', '$application', '$idcard', '$province', '$message')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Application submitted successfully');</script>";
    } else {
        echo "<h3>Database Error:</h3> " . mysqli_error($conn);
        echo "<br><b>SQL:</b> $sql";
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>KGM Application Form</title>
    <link rel="stylesheet" href="deco.css">
</head>
<body>
<div class="container">
    <div class="header" style="text-align:center;">
        <img src="kbl.jpg" style="width:150px;">
        <h2>KGM Recruitment - Application Form</h2>
    </div>

    <form method="POST" enctype="multipart/form-data">

        <label>Position Applying For</label>
        <select name="position" required>
            <option value="">Select</option>
            <option value="Driver">Driver</option>
            <option value="Teacher">Teacher</option>
        </select>

        <div class="two-columns">
            <div class="column">
                <label>First Name</label>
                <input type="text" name="first_name" placeholder="First Name" required>
            </div>

            <div class="column">
                <label>Last Name</label>
                <input type="text" name="last_name" placeholder="Last Name" required>
            </div>
        </div>

        <label>Advert Reference Number</label>
        <input type="text" name="ref_no" required>

        <label>Upload CV</label>
        <input type="file" name="cv" required>

        <label>Upload Letter</label>
        <input type="file" name="letter" required>

        <label>Upload Application</label>
        <input type="file" name="application" required>

        <label>Upload ID Card</label>
        <input type="file" name="idcard" required>

        <label>Province</label>
        <select name="country" required>
            <option>Tshopo</option>
            <option>Bas-uele</option>
            <option>Tshuapa</option>
            <option>Tanganyika</option>
            <option>Maniema</option>
            <option>Haut-Katanga</option>
            <option>NigerMai-ndombeia</option>
            <option>Lualaba</option>
            <option>Haut-lomami</option>
            <option>Sankuru</option>
            <option>Equateur</option>
            <option>Kasai</option>
            <option>Kwango</option>
            <option>Haut-uele</option>
            <option>Kwilu</option>
            <option>Ituri</option>
            <option>South Kivu</option>
            <option>North-Kivu</option>
            <option>Kasi-central</option>
            <option>Mongala</option>
            <option>Nord-Ubangi</option>
            <option>Lomami</option>
            <option>Kongo Central</option>
            <option>Sud-Ubangi</option>
            <option>Kinshasa</option>
            <option>Kasi-oriental</option>
        </select>

        <label>Message</label>
        <textarea name="message" rows="4" placeholder="Write your message here..." required></textarea>

        <br>
        <button type="submit" name="submit">Apply Now</button>
    </form>
</div>
</body>
</html>
