<?php
session_start();
if ($_SESSION['username'] == "" || $_SESSION["usertype"] != "admin") {
    header("location:adminLogin.php");
}
require_once '../controllers/showPendingPosts.php';
$pendings = fetchPendingPosts();
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/adminDashboard.css">
    <link rel="stylesheet" type="text/css" href="css/header_admin.css">
    <link rel="stylesheet" type="text/css" href="css/sidebar_admin.css">
    <link rel="stylesheet" type="text/css" href="../HnF/Footer.css">

</head>

<body>
    <?php
    include 'sidebar_admin.html';
    include 'header_admin.php';
    ?>
    <div class="main">
        <?php foreach ($pendings as $i => $pending) : ?>
            <fieldset>
                <div>
                    <div style="font-size: larger;font-weight: bold;"><?php echo $pending["name"] ?></div><br>
                    <div style="font-size: large;"><?php echo $pending["title"] ?></div>
                    <div style="font-style: italic;"><?php echo $pending["time"] ?></div>
                    <div>
                        <?php $fileName =  "../../" . $pending['image'];
                        if (file_exists($fileName)) { ?>
                            <img src="<?php echo $fileName; ?>" class="profileImage" height="40%" width="40%">
                        <?php } else {
                            echo "";
                        } ?>
                    </div>
                    <br>
                    <div style="font-family:Georgia, 'Times New Roman', Times, serif;"><?php echo $pending["text"] ?></div>
                </div>
                <div>
                    <input type="submit" name="approveBtn" id="approveBtn" value="Approve">
                    <input type="submit" name="declineBtn" id="declineBtn" value="Decline">
                </div>
            </fieldset>
            <br>
        <?php endforeach; ?>
    </div>

    <?php
    include '../HnF/Footer.php';
    ?>
</body>

</html>