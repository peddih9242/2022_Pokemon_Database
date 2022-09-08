<?php include("topbit.php");

        $find_sql = "SELECT * FROM `pokemon_details` WHERE `Legendary` = 1
        ";
        $find_query = mysqli_query($dbconnect, $find_sql);
        $find_rs = mysqli_fetch_assoc($find_query);
        $count = mysqli_fetch_assoc($find_query);

        ?>

        <div class="box main">

        <?php include("results.php"); ?>

        </div> <!-- / main -->

<?php include("bottombit.php"); ?>