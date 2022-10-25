<?php include("topbit.php"); 

$pokemon_name = "";
$poke_type_1ID = "";
$poke_type_2ID = "";
$hp = "";
$attack = "";
$defense = "";
$spatk = "";
$spdef = "";
$speed = "";
$generation = "";
$legendary = "";

// set up error field colours

$name_error = $type_error_1 = $type_error_2 = $hp_error = $attack_error = $defense_error = $spatk_error = $spdef_error = $speed_error = $gen_error = "no-error";

$name_field = $type_field_1 = $type_field_2 = $hp_field = $attack_field = $defense_field = $spatk_field = $spdef_field = $speed_field = $gen_field = "form-ok";

// set up and check for errors when submit button pressed, then add entry
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $has_errors = "no";
    // checking for many blanks and number errors
    $pokemon_name = mysqli_real_escape_string($dbconnect, $_POST['pokemon_name']);
    if ($pokemon_name == ""){
        $has_errors = "yes";
        $name_error = "error-text";
        $name_field = "form-error";
    }

    $poke_type_1ID = mysqli_real_escape_string($dbconnect, $_POST['poke_type_1ID']);
    $poke_type_2ID = mysqli_real_escape_string($dbconnect, $_POST['poke_type_2ID']);
    if ($poke_type_1ID == "" || $poke_type_1ID == "0" || $poke_type_1ID == $poke_type_2ID) { 
        $has_errors = "yes";
        $type_error_1 = "error-text";
        $type_field_1 = "form-error";
    }    
    else{
    $type_sql_1 = "SELECT * FROM `pokemon_type` WHERE `TypeID` = $poke_type_1ID
    ";
    $type_query_1 = mysqli_query($dbconnect, $type_sql_1);
    $type_rs_1 = mysqli_fetch_assoc($type_query_1);
    $poke_type_1 = $type_rs_1['Type'];
    }
    
    if ($poke_type_2ID == "" || $poke_type_2ID == $poke_type_1ID){
        $has_errors == "yes";
        $type_error_2 = "error-text";
        $type_field_2 = "form-error";
    }    
    else{
        $type_sql_2 = "SELECT * FROM `pokemon_type` WHERE `TypeID` = $poke_type_2ID
        ";
        $type_query_2 = mysqli_query($dbconnect, $type_sql_2);
        $type_rs_2 = mysqli_fetch_assoc($type_query_2);
        $poke_type_2 = $type_rs_2['Type'];
    }


    $hp = mysqli_real_escape_string($dbconnect, $_POST['hp']);
    if ($hp == ""){
        $has_errors = "yes";
        $hp_error = "error-text";
        $hp_field = "form-error";
    }
    elseif (!ctype_digit($hp) || $hp <= 0) {
        $has_errors = "yes";
        $hp_error = "error-text";
        $hp_field = "form-error";
    }

    $attack = mysqli_real_escape_string($dbconnect, $_POST['attack']);
    if ($attack == ""){
        $has_errors = "yes";
        $attack_error = "error-text";
        $attack_field = "form-error";
    }
    elseif(!ctype_digit($attack) || $attack <= 0) {
        $has_errors = "yes";
        $attack_error = "error-text";
        $attack_field = "form-error";
    }

    $defense = mysqli_real_escape_string($dbconnect, $_POST['defense']);
    if ($defense == ""){
        $has_errors = "yes";
        $defense_error = "error-text";
        $defense_field = "form-error";
    }
    elseif(!ctype_digit($defense) || $defense <= 0) {
        $has_errors = "yes";
        $defense_error = "error-text";
        $defense_field = "form-error";
    }
    
    $spatk = mysqli_real_escape_string($dbconnect, $_POST['spatk']);
    if ($spatk == ""){
        $has_errors = "yes";
        $spatk_error = "error-text";
        $spatk_field = "form-error";
    }
    elseif(!ctype_digit($spatk) || $spatk <= 0){
        $has_errors = "yes";
        $spatk_error = "error-text";
        $spatk_field = "form-error";
    }

    $spdef = mysqli_real_escape_string($dbconnect, $_POST['spdef']);
    if ($spdef == ""){
        $has_errors = "yes";
        $spdef_error = "error-text";
        $spdef_field = "form-error";
    }
    elseif(!ctype_digit($spdef) || $spdef <= 0){
        $has_errors = "yes";
        $spdef_error = "error-text";
        $spdef_field = "form-error";
    }

    $speed = mysqli_real_escape_string($dbconnect, $_POST['speed']);
    if ($speed == ""){
        $has_errors = "yes";
        $speed_error = "error-text";
        $speed_field = "form-error";
    }
    elseif(!ctype_digit($speed) || $speed <= 0)
    {
        $has_errors = "yes";
        $speed_error = "error-text";
        $speed_field = "form-error";
    }
    
    $generation = mysqli_real_escape_string($dbconnect, $_POST['generation']);
    if ($generation == ""){
        $has_errors = "yes";
        $gen_error = "error-text";
        $gen_field = "form-error";
    }
    elseif(!ctype_digit($generation) || $generation <= 0)
    {
        $has_errors = "yes";
        $gen_error = "error-text";
        $gen_field = "form-error";
    }
    
    $legendary = mysqli_real_escape_string($dbconnect, $_POST['legendary']);

    // if there are no errors in the data given, calculate
    // total stat and add pokemon into database
    if ($has_errors != "yes"){

    // calculate total based on stats given
    $total = $hp + $attack + $defense + $spatk + $spdef + $speed;

    // add entry to database
    $add_entry_sql = "INSERT INTO `pokemon_details` (`ID`, `Name`, 
    `PokemonType1ID`, `PokemonType2ID`, `Total`, `HP`, `Attack`, `Defense`, `Sp. Atk`, `Sp. Def`, `Speed`, `Generation`, `Legendary`) 
    VALUES (NULL, '$pokemon_name', '$poke_type_1ID', '$poke_type_2ID', '$total', '$hp', '$attack', '$defense', '$spatk', 
    '$spdef', '$speed', '$generation', '$legendary')
    ";

    $add_entry_query = mysqli_query($dbconnect, $add_entry_sql);

    // get the pokemon that was just added
    $get_id_sql = "SELECT * FROM `pokemon_details` 
    WHERE `Name` LIKE '$pokemon_name'
    AND `PokemonType1ID` = '$poke_type_1ID'
    AND `PokemonType2ID` = '$poke_type_2ID'
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

    // get the id of pokemon that was just added to show on success page
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
            <div class="<?php echo $name_error; ?>">
            Please fill in the 'Pokemon Name' field
            </div>
            <input class="add-field <?php echo $name_field; ?>" type="text" value = "<?php echo $pokemon_name?>"name="pokemon_name" placeholder="Pokemon Name..."/>
                
            <!-- Pokemon Type 1 -->
            <div class="<?php echo $type_error_1; ?>">
                Please select a first type in the 'Pokemon Type 1' dropdown
            </div>
            <select class="adv <?php echo $type_field_1; ?>" name="poke_type_1ID">
            <?php 
            // display type normally if invalid input given
            if ($poke_type_1ID == "" || $poke_type_1ID == "0" || $poke_type_1ID == $poke_type_2ID) { 
                ?>
                <option value="" selected>Pokemon Type 1...</option>
            <?php
            }
            // if valid input is given then have it selected when page reloaded
            else {
                ?>
                <option value="<?php echo $poke_type_1ID; ?>"><?php echo $poke_type_1 ?></option>
            <?php
            }
            ?>
            

            <!-- get options from database -->

            <?php 

            $type_sql_1 = "SELECT * FROM `pokemon_type` WHERE
            `TypeID` NOT LIKE '0' ORDER BY `Type` ASC
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
            <div class="<?php echo $type_error_2; ?>">
            Please select a second type in the 'Pokemon Type 2' dropdown
            </div>
            <select class="adv <?php echo $type_field_2; ?>" name="poke_type_2ID">
            <?php
            // display type normally if invalid input given
            if ($poke_type_2ID == "" || $poke_type_2ID == $poke_type_1ID) {
            ?>
            <option value="" selected>Pokemon Type 2...</option>
            <?php
            }
            // if valid input given then have it selected when page reloaded
            else {
                ?>
                <option value="<?php echo $type_rs_2['TypeID']; ?>"><?php echo $poke_type_2; ?></option>
            <?php
            }
            ?>
            

            <!-- get options from database -->

            <?php 

            $type_sql_2 = "SELECT * FROM `pokemon_type` ORDER BY `Type` ASC
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

            <!-- pokemon stat error and input fields -->
            <div class="<?php echo $hp_error; ?>">
            Please enter a number above 0 in the 'HP' field
            </div>
            <input class="add-field <?php echo $hp_field; ?>" type="text" value="<?php echo $hp?>" name="hp" placeholder="HP..."/>

            <div class="<?php echo $attack_error; ?>">
            Please enter a number above 0 in the 'Attack' field
            </div>
            <input class="add-field <?php echo $attack_field; ?>" type="text" value="<?php echo $attack ?>" name="attack" placeholder="Attack..."/>

            <div class="<?php echo $defense_error; ?>">
            Please enter a number above 0 in the 'Defense' field
            </div>
            <input class="add-field <?php echo $defense_field; ?>" type="text" value="<?php echo $defense?>" name="defense" placeholder="Defense..."/>

            <div class="<?php echo $spatk_error; ?>">
            Please enter a number above 0 in the 'Special Attack' field
            </div>
            <input class="add-field <?php echo $spatk_field; ?>" type="text" value="<?php echo $spatk ?>"name="spatk" placeholder="Special Attack..."/>

            <div class="<?php echo $spdef_error; ?>">
            Please enter a number above 0 in the 'Special Defense' field
            </div>
            <input class="add-field <?php echo $spdef_field; ?>" type="text" value="<?php echo $spdef ?>" name="spdef" placeholder="Special Defense..."/>

            <div class="<?php echo $speed_error; ?>">
            Please enter a number above 0 in the 'Speed' field
            </div>
            <input class="add-field <?php echo $speed_field; ?>" type="text" value="<?php echo $speed; ?>" name="speed" placeholder="Speed..."/>

            <div class="<?php echo $gen_error; ?>">
            Please enter a number above 0 in the 'Generation' field
            </div>
            <input class="add-field <?php echo $gen_field; ?>" type="text" value="<?php echo $generation; ?>" name="generation" placeholder="Generation..."/>
            
            <br />
            <br />

            <!-- defaults to 'no' -->
            <!-- NOTE: value in database is boolean, 1 is yes and 0 is no -->
            <b>Legendary: </b>
            <?php 
            if ($legendary == 1) {
                ?>

            <input type="radio" name="legendary" value="1" checked="checked"/>Yes
            <input type="radio" name="legendary" value="0"/>No

            <?php
            }
            
            else {
            ?>
            
            <input type="radio" name="legendary" value="1"/>Yes
            <input type="radio" name="legendary" value="0" checked="checked"/>No
            
            <?php
            }
            
            ?>

            <br />
            <br />

            <input class="submit advanced-button" type="submit" value="Submit" />

            </form>

            </div> <!-- / add entry --> 
        </div> <!-- / main -->

<?php include("bottombit.php"); ?>