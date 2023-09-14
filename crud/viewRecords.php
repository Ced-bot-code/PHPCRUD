<?php
    include "database.php";
    include "timers.php";

    $s = isset($_GET['res']) ? $_GET['res'] : null;
    
    switch($s){
        case "1":
            echo "Successfully updated.";
            break;
        case "0":
            echo "Successfully deleted.";
            break;
        case "-1":
            echo "Query not found.";
            break;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <link rel="stylesheet" href="tables.css">
    <style>
        *{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .listEdit{
            text-decoration:none;
        }

        .listEdit:hover{
            text-decoration:underline;
        }
    </style>
</head>
<body>
    <h1>List of accounts</h1>
    <table class="form_table">
        <tr>
            <td></td>
            <td>User name</td>
            <td>Date created</td>
            <td>Image</td>
            <td></td>
        </tr>
        <?php
            $i=0;
            
            foreach(requestData("SELECT * FROM accounts") as $lists){
                ?>
                    <tr>
                        <td><?= ($i+1);?></td>
                        <td><?= $lists['userName'];?></td>
                        <td><?= getLocalTime($lists['timeCreated']);?></td>
                        <td>
                            <a href="viewImage.php?imgID=<?= $lists['id'];?>" title="Click to view" target="_blank">
                              <img style="width:53px; height:auto" src="data:image/jpeg;base64,<?= base64_encode($lists['profilePic']);?>" alt="">
                            </a>
                        </td>
                        <td><a class="listEdit" href="editUser.php?userID=<?= $lists['id'];?>">Edit</a></td>
                    </tr>
                <?php
                $i++;
            }
        ?>
    </table>
</body>
</html>
<!-- https://codepen.io/adminHT/pen/QWwOpPX?editors=1010 -->