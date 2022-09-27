<?php include("topbit.php"); 

$type_sql = "SELECT * FROM `pokemon_type` ORDER BY `TypeID` ASC
";
$type_query = mysqli_query($dbconnect, $type_sql);
$type_rs = mysqli_fetch_assoc($type_query);


$pokemon_name = "";
$poke_type_1 = "";
$poke_type_2 = "";
$total = "";
$hp = "";
$attack = "";
$defense = "";
$spatk = "";
$spdef = "";
$speed = "";
$generation = "";
$legendary = "";

?>
                       
            
        <div class="box main">
            <div class="add-entry">
            <h2>Pokemon Entry Form</h2>

            <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            
            <!-- Pokemon Name -->
            <input class="add-field" type="text" name="pokemon_name" placeholder="Pokemon Name..."/>
                
            <!-- Pokemon Type 1 -->
            <select class="adv" name="poke_type_1">
            <option value="" selected>Pokemon Type 1...</option>

            <!-- get options from database -->

            <?php 
            do {
            ?>
            <option value="<?php echo $type_rs['TypeID']; ?>"></option>

            <?php
            } // end type do loop

            while ($type_rs = mysqli_fetch_assoc($type_query))
            ?>

            </select>

            <!-- Pokemon Type 2 -->
            <select class="adv" name="poke_type_2">
            <option value="" selected>Pokemon Type 2...</option>

            <!-- get options from database -->

            <?php 
            do {
            ?>
            <option value="<?php echo $type_rs['TypeID']; ?>"></option>

            <?php
            } // end type do loop

            while ($type_rs = mysqli_fetch_assoc($type_query))
            ?>

            </select>

            <input class="add-field" type="text" name="total" placeholder="Total..." />

            <input class="add-field" type="text" name="hp" placeholder="HP..." />

            <input class="add-field" type="text" name="attack" placeholder="Attack..." />

            <input class="add-field" type="text" name="defense" placeholder="Defense..." />

            <input class="add-field" type="text" name="spatk" placeholder="Special Attack..." />

            <input class="add-field" type="text" name="spdef" placeholder="Special Defense..." />

            <input class="add-field" type="text" name="speed" placeholder="Speed..." />

            <input class="add-field" type="text" name="gen" placeholder="Generation..." />

            <!-- defaults to 'no' -->
            <!-- NOTE: value in database is boolean, 1 is yes and 0 is no -->
            <b>Legendary: </b>
            <input type="radio" name="legendary" value="1"/>Yes
            <input type="radio" name="legendary" value="0" checked="checked"/>No

            </form>

            </div> <!-- / add entry --> 
        </div> <!-- / main -->

<?php include("bottombit.php"); ?>