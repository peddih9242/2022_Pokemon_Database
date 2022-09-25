<?php include("topbit.php"); 

// get information from form
$pokemon_name = mysqli_real_escape_string($dbconnect, $_POST['pokemon_name']);
$pokemon_type1 = mysqli_real_escape_string($dbconnect, $_POST['type_1']);
$pokemon_type2 = mysqli_real_escape_string($dbconnect, $_POST['type_2']);

if (empty($pokemon_type1))
{
    $pokemon_type1 = 0;
    $type_op_1 = ">=";
} 
else
{
    $type_op_1 = "=";
}


if (empty($pokemon_type2))
{
    $pokemon_type2 = 0;
    $type_op_2 = ">=";
} 
else
{
    $type_op_2 = "=";
}

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

// legendary
$legendary = mysqli_real_escape_string($dbconnect, $_POST['legendary']);

if ($legendary == "1")
{
    $legendary_op = "=";
    $legendary = 0;
}
elseif ($legendary == "2")
{
    $legendary_op = "=";
    $legendary = 1;
}
else
{
    $legendary_op = ">=";
    $legendary = 0;
}

$find_sql = "SELECT * FROM `pokemon_details`
WHERE `Name` LIKE '%$pokemon_name%'
AND (`PokemonType1ID` $type_op_1 '$pokemon_type1' OR `PokemonType1ID` $type_op_1 '$pokemon_type2')
AND (`PokemonType2ID` $type_op_2 '$pokemon_type2' OR `PokemonType2ID` $type_op_2 '$pokemon_type1')
AND `Total` $total_op '$total'
AND `Generation` $gen_op '$gen' 
AND `Legendary` $legendary_op '$legendary'
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