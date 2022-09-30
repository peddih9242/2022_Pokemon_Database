<?php include("topbit.php"); 

    // retrieve information from addentry
    $ID = $_SESSION['ID'];

    $find_sql = "SELECT * FROM `pokemon_details`
    WHERE `ID` = '$ID'
    ";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>
                       
            
        <div class="box main">
            <h2>Congratulations</h2>

            <p>You have successfully added the following entry</p>
            
            <?php include("results.php"); ?>

        </div> <!-- / main -->

<?php include("bottombit.php"); ?>