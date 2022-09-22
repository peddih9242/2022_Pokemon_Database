<?php include("topbit.php"); 

// get information from form
$pokemon_name = mysqli_real_escape_string($dbconnect, $_POST['pokemon_name']);
$pokemon_type1 = mysqli_real_escape_string($dbconnect, $_POST['type_1']);
$pokemon_type2 = mysqli_real_escape_string($dbconnect, $_POST['type_2']);

// legendary
if (isset($_POST['legendary']))
{
    $legendary = 1;
}

else{
    $legendary = 0;
} // end else

// total
$total = mysqli_real_escape_string($dbconnect, $_POST['total']);
$total_more_less = mysqli_real_escape_string($dbconnect, $_POST['total_more_less']);

if ($total_more_less == "lower")
{
    $total_op = "<=";
}
elseif ($total_more_less == "equal")
{
    $total_op = "=";
}
elseif ($total_more_less == "higher")
{
    $total_op = ">=";
}
else {
    $total_op = ">=";
    $total = 0;
}

// generation
$gen = mysqli_real_escape_string($dbconnect, $_POST['gen']);
$gen_more_less = mysqli_real_escape_string($dbconnect, $_POST['gen_more_less']);

if ($gen_more_less == "lower")
{
    $gen_op = "<=";
}
elseif ($gen_more_less == "equal")
{
    $gen_op = "=";
}
elseif ($gen_more_less == "higher")
{
    $gen_op = ">=";
}
else {
    $gen_op = ">=";
    $gen = 0;
}


// $type_1_sql = "SELECT * FROM `pokemon_type` WHERE `Type` == $pokemon_type1
// ";
// $type_1_query = mysqli_query($dbconnect, $type_1_sql);
// $type_1_rs = mysqli_fetch_assoc($type_1_query);
// $type_1ID = $type_1_rs['TypeID'];

// $type_2_sql = "SELECT * FROM `pokemon_type` WHERE `Type` == $pokemon_type2
// ";
// $type_2_query = mysqli_query($dbconnect, $type_2_sql);
// $type_2_rs = mysqli_fetch_assoc($type_2_query);
// $type_2ID = $type_1_rs['TypeID'];

$find_sql = "SELECT * FROM `pokemon_details`
WHERE `Name` LIKE '%$pokemon_name%'
AND `PokemonType1ID` = '$pokemon_type1'
AND `PokemonType2ID` = '$pokemon_type2'
AND `Total` $total_op '$total'
AND `Generation` $gen_op '$gen'
AND (`Legendary` = $legendary OR `Legendary` = 0)
";
$find_query = mysqli_query($dbconnect, $find_sql);
$find_rs = mysqli_fetch_assoc($find_query);
$count = mysqli_num_rows($find_query);

?>
                       
            
        <div class="box main">
        <h2>Advanced Search</h2>
        <?php include("results.php"); ?>
        </div> <!-- / main -->

<?php include("bottombit.php"); ?>