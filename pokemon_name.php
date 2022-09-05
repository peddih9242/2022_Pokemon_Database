<?php include("topbit.php"); 

    $name_poke = $_POST['poke_name'];

    $find_sql = "SELECT * FROM `pokemon_details` WHERE `Name` LIKE '%$name_poke%'
    ";

    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>

        <div class="box main">
        <?php include('results.php'); ?>
        </div> <!-- / main -->

<?php include("bottombit.php"); ?>