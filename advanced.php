<?php include("topbit.php"); 

// get information from form
$pokemon_name = mysqli_real_escape_string($dbconnect, $_POST['pokemon_name']);
$pokemon_type1 = mysqli_real_escape_string($dbconnect, $_POST['type_1']);
$pokemon_type2 = mysqli_real_escape_string($dbconnect, $_POST['type_2']);

if (isset($_POST['legendary']))
{
    $legendary = 1
}

else{
    $legendary = 0
} // end else

$total = mysqli_real_escape_string($dbconnect, $_POST['total'])

if $total=

?>
                       
            
        <div class="box main">
        <h2>Advanced Search</h2>
        <?php include("results.php"); ?>
        </div> <!-- / main -->

<?php include("bottombit.php"); ?>