<?php include("topbit.php"); 

$pokemon_name = "";
$poke_type_1 = "";
$poke_type_2 = "";
$hp = "";
$attack = "";
$defense = "";
$spatk = "";
$spdef = "";
$speed = "";
$generation = "";
$legendary = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $has_errors = "no";
    $pokemon_name = mysqli_real_escape_string($dbconnect, $_POST['pokemon_name']);

    if ($pokemon_name == ""){
        $has_errors = "yes";
    }

    $poke_type_1 = mysqli_real_escape_string($dbconnect, $_POST['poke_type_1']);
    if ($poke_type_1 == ""){
        $has_errors == "yes";
    }

    $poke_type_2 = mysqli_real_escape_string($dbconnect, $_POST['poke_type_2']);
    if ($poke_type_2 == ""){
        $has_errors == "yes";
    }

    $hp = mysqli_real_escape_string($dbconnect, $_POST['hp']);
    
    if ($hp == ""){
        $has_errors == "yes";
    }

    $attack = mysqli_real_escape_string($dbconnect, $_POST['attack']);
    if ($attack == ""){
        $has_errors == "yes";
    }

    $defense = mysqli_real_escape_string($dbconnect, $_POST['defense']);
    if ($defense == ""){
        $has_errors == "yes";
    }
    
    $spatk = mysqli_real_escape_string($dbconnect, $_POST['spatk']);
    if ($spatk == ""){
        $has_errors == "yes";
    }

    $spdef = mysqli_real_escape_string($dbconnect, $_POST['spdef']);
    if ($spdef == ""){
        $has_errors == "yes";
    }

    $speed = mysqli_real_escape_string($dbconnect, $_POST['speed']);
    if ($speed == ""){
        $has_errors == "yes";
    }
    
    $generation = mysqli_real_escape_string($dbconnect, $_POST['generation']);
    if ($generation == ""){
        $has_errors == "yes";
    }
    
    $legendary = mysqli_real_escape_string($dbconnect, $_POST['legendary']);
    if ($legendary == ""){
        $has_errors == "yes";
    }

    if ($has_errors != "yes"){

    // calculate total based on stats given
    $total = $hp + $attack + $defense + $spatk + $spdef + $speed;

    // add entry to database
    $add_entry_sql = "INSERT INTO `pokemon_details` (`ID`, `Name`, 
    `PokemonType1ID`, `PokemonType2ID`, `Total`, `HP`, `Attack`, `Defense`, `Sp. Atk`, `Sp. Def`, `Speed`, `Generation`, `Legendary`) 
    VALUES (NULL, '$pokemon_name', '$poke_type_1', '$poke_type_2', '$total', '$hp', '$attack', '$defense', '$spatk', 
    '$spdef', '$speed', '$generation', '$legendary')
    ";

    $add_entry_query = mysqli_query($dbconnect, $add_entry_sql);

    // get id for next page
    $get_id_sql = "SELECT * FROM `pokemon_details` 
    WHERE `Name` LIKE '$pokemon_name'
    AND `PokemonType1ID` = '$poke_type_1'
    AND `PokemonType2ID` = '$poke_type_2'
    AND `Total` = '$total'
    AND `HP` = '$hp'
    AND `Attack` = '$attack'
    AND `Defense` = '$defense'
    AND `Sp. Atk` = '$spatk'
    AND `Sp. Def` = '$spdef'
    AND `Speed` = '$speed'
    AND `Generation` = '$generation'
    AND `Legendary` = '$legendary'
    ";
    $get_id_query = mysqli_query($dbconnect, $get_id_sql);
    $get_id_rs = mysqli_fetch_assoc($get_id_query);

    $ID = $get_id_rs['ID'];
    $_SESSION['ID'] = $ID;

    // go to success page
    header('Location: add_success.php');
    }

}

?>
                       
            
        <div class="box main">
            <div class="add-entry">
            <h2>Pokemon Entry Form</h2>

            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            
            <!-- Pokemon Name -->
            <input class="add-field" type="text" name="pokemon_name" placeholder="Pokemon Name..." required/>
                
            <!-- Pokemon Type 1 -->
            <select class="adv" name="poke_type_1" required>
            <option value="" selected disabled>Pokemon Type 1...</option>

            <!-- get options from database -->

            <?php 

            $type_sql_1 = "SELECT * FROM `pokemon_type` ORDER BY `TypeID` ASC
            ";
            $type_query_1 = mysqli_query($dbconnect, $type_sql_1);
            $type_rs_1 = mysqli_fetch_assoc($type_query_1);


            do {
            ?>
            <option value="<?php echo $type_rs_1['TypeID']; ?>"><?php echo $type_rs_1['Type']; ?></option>

            <?php
            } // end type do loop

            while ($type_rs_1 = mysqli_fetch_assoc($type_query_1))
            ?>

            </select>

            <!-- Pokemon Type 2 -->
            <select class="adv" name="poke_type_2" required>
            <option value="" selected disabled>Pokemon Type 2...</option>

            <!-- get options from database -->

            <?php 

            $type_sql_2 = "SELECT * FROM `pokemon_type` ORDER BY `TypeID` ASC
            ";
            $type_query_2 = mysqli_query($dbconnect, $type_sql_2);
            $type_rs_2 = mysqli_fetch_assoc($type_query_2);

            do {
            ?>
            <option value="<?php echo $type_rs_2['TypeID']; ?>"><?php echo $type_rs_2['Type']; ?></option>

            <?php
            } // end type do loop

            while ($type_rs_2 = mysqli_fetch_assoc($type_query_2))
            ?>

            </select>

            <input class="add-field" type="text" name="hp" placeholder="HP..." required/>

            <input class="add-field" type="text" name="attack" placeholder="Attack..." required/>

            <input class="add-field" type="text" name="defense" placeholder="Defense..." required/>

            <input class="add-field" type="text" name="spatk" placeholder="Special Attack..." required/>

            <input class="add-field" type="text" name="spdef" placeholder="Special Defense..." required/>

            <input class="add-field" type="text" name="speed" placeholder="Speed..." required/>

            <input class="add-field" type="text" name="generation" placeholder="Generation..." required/>
            
            <br />
            <br />

            <!-- defaults to 'no' -->
            <!-- NOTE: value in database is boolean, 1 is yes and 0 is no -->
            <b>Legendary: </b>
            <input type="radio" name="legendary" value="1"/>Yes
            <input type="radio" name="legendary" value="0" checked="checked"/>No

            <br />
            <br />

            <input class="submit advanced-button" type="submit" value="Submit" />

            </form>

            </div> <!-- / add entry --> 
        </div> <!-- / main -->

<?php include("bottombit.php"); ?>