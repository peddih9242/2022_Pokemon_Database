<?php include("topbit.php"); 

    $find_sql = "SELECT * FROM `pokemon_details`
    JOIN pokemon_type ON (pokemon_details.PokemonType1ID) = pokemon_type.TypeID)
    JOIN pokemon_type ON (pokemon_details.PokemonType2ID) = pokemon_type.TypeID)
    ";

    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>
                       
            
        <div class="box main">
            <h2>All Results</h2>
            
            
            <p>
                    
                    <?php 
                    if($count < 1) {
                    ?>
                    
                    <div class="error">
                        Sorry! There are no results that match your search.
                        Please use the search box in the side bar to try again.
                    </div> <!-- end error -->
                    
                    <?php
                    } // end no results if

                    else {
                        do
                        {
                            ?>

                            <div class="results">
                                <!-- heading and subtitle -->
                                <div class="flex-container">
                                    <div>
                                        <span class="sub-heading">
                                            <?php echo $find_rs['Name']; ?>
                                        </span>
                                    </div> <!-- Title -->

                                </div> <!-- / flex container div -->
                            
                            <!-- / heading and subtitle -->

                            <p>
                                <b>Pokemon Type 1</b>
                                <?php 
                                $type_1 = $find_rs['PokemonType1ID']; 
                                $find_id_sql_1 = "SELECT * FROM `pokemon_type` WHERE `TypeID` $type_1
                                ";
                                $find_id_query_1 = mysqli_query($dbconnect, $find_id_sql_1);
                                $find_id_rs_1 = mysqli_fetch_assoc($find_id_query_1);
                                echo $find_id_rs_1['Type'];
                                ?>

                                <br />
                            
                                <b>Pokemon Type 2</b>
                                <?php

                                $type_2 = $find_rs['PokemonType2ID']; 
                                $find_id_sql_2 = "SELECT * FROM `pokemon_type` WHERE `TypeID` $type_2
                                ";
                                $find_id_query_2 = mysqli_query($dbconnect, $find_id_sql_2);
                                $find_id_rs_2 = mysqli_fetch_assoc($find_id_query_2);
                                echo $find_id_rs_2['Type'];

                                ?>

                                <br />

                                <b>Total Stats</b>
                                <?php echo $find_rs['Total']; ?>

                                <br />

                                <b>HP</b>
                                <?php echo $find_rs['HP']; ?>

                                <br />

                                <b>Attack</b>
                                <?php echo $find_rs['Attack']; ?>

                                <br />

                                <b>Defense</b>
                                <?php echo $find_rs['Defense']; ?>
                                
                                <br />

                                <b>Special Attack</b>
                                <?php echo $find_rs['Sp. Atk']; ?>

                                <br />

                                <b>Special Defense</b>
                                <?php echo $find_rs['Sp. Def']; ?>

                                <br />

                                <b>Speed</b>
                                <?php echo $find_rs['Speed']; ?>

                                <br />

                                <b>Generation</b>
                                <?php echo $find_rs['Generation']; ?>

                                <br />

                                <?php 
                                if($find_rs['Legendary'] == "1")
                                {
                                ?>
                                    Legendary Pokemon

                                <?php
                                } 
                                ?>
                                
                            </p>
                         
                            </div> <!-- results div -->

                            <br />

                    <?php

                        } // end results do

                        while($find_rs=mysqli_fetch_assoc($find_query));
                    } // end results else
                    ?>


            </p>
            
        </div> <!-- / main -->

<?php include("bottombit.php"); ?>