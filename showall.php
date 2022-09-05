<?php include("topbit.php"); 

    $find_sql = "SELECT * FROM `pokemon_details` ORDER BY `pokemon_details`.`Name` ASC
    ";

    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>
                       
            
        <div class="box main">
            <h2>All Results</h2>
            
            
        <?php include('results.php'); ?>
            
        </div> <!-- / main -->

<?php include("bottombit.php"); ?>