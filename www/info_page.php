<?php

require "database_connect.php";

$id = $_GET['id'];

$sql = "SELECT * FROM holiday_db WHERE id = $id";
$result = mysqli_query($conn, $sql);
$holidays = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">
<style>
    html,
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        padding: 20px;
        overflow: hidden;
        height: 100vh;
        background: rgb(180, 211, 238);
    }

    .super_container {
        background-color: rgb(180, 211, 238);
        display: flex;
        height: 100%;
        width: 100%;
        overflow: hidden;
        padding: 0 30;
    }

    .foto_container {
        width: 60%;
        height: 100%;
        padding: 0;
        border: 2px solid white;
        box-sizing: border-box;
        margin-right: 20px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 7px;
    }

    .text_container {
        background-color: rgb(125, 158, 187);
        width: 40%;
        padding: 15px;
        box-sizing: border-box;
    }

    .thumbnail {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .h1_text {
        text-align: center;
        font-size: 40px;
    }

    .h3_text {
        font-size: 34px;
    }

    .p_text {
        font-size: 24px
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $holidays['name'] ?></title>
</head>

<body>
    <div class="super_container">
        <div class="foto_container">
            <img src="<?php echo $holidays['thumbnail_url'] ?>" class="thumbnail">
        </div>
        <div class="text_container">
            <h1 class="h1_text"><?php echo $holidays['name'] ?> </h1>
            <h3 class="h3_text"><?php echo $holidays['prijs'] ?> </h3>
            <p class="p_text"> <?php echo $holidays['beschrijving'] ?> </p>
        </div>
    </div>

</body>

</html>