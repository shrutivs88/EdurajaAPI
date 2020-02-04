<!DOCTYPE html>
<html>
    <head>
        <title>Read Data From Database Using PHP - Demo Preview</title>
        <meta content="noindex, nofollow" name="robots">
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
<body>
    <div class="maindiv">
        <div class="divA">
            <div class="title">
                <h2>Read Data Using PHP</h2>
            </div>
                <div class="divB">
                        <div class="divD">
                            <p>Click On Menu</p>

                            <?php
                            $connection = mysqli_connect("localhost", "root", "", "api_test"); // Establishing Connection with Server
                            // $db = mysql_select_db("api_test", $connection); // Selecting Database
                            //MySQL Query to read data
                            $sql = "select * from emp";
                            $query = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_array($query)) {
                            echo " <b><a href='reademp.php?id={$row["id"]}'>{$row['fullname']}</a></b>";
                            echo "<br />";
                            }
                            ?>
                        </div>
                        <?php
                        if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql1 = "select * from emp where id=$id";
                        $query1 = mysqli_query($connection, $sql1);
                        while ($row1 = mysqli_fetch_array($query1)) {
                        ?>
                        <div class="form">
                            <h2>---Details---</h2>
                            <!-- Displaying Data Read From Database -->
                            <span>Name:</span> <?php echo $row1['fullname']; ?><br>
                            <span>Phone:</span> <?php echo $row1['phone']; ?><br>
                            <span>E-mail:</span> <?php echo $row1['emailaddress']; ?><br>
                            <span>Date Of Birth:</span> <?php echo $row1['dob']; ?><br>
                            <span>City:</span> <?php echo $row1['city']; ?><br>
                            <span>State:</span> <?php echo $row1['state']; ?><br>
                            <span>Pincode:</span> <?php echo $row1['pincode']; ?>
                        </div>
                            <?php
                            }
                        }
                            ?>
                        <div class="clear"></div>
                </div>
                    <div class="clear"></div>
        </div>
    </div>
        <?php
        mysqli_close($connection); // Closing Connection with Server
        ?>
    </body>
</html>

 