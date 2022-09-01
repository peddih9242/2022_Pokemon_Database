<?php include("topbit.php"); 

    $find_sql = "SELECT * FROM `pokemon_details`
    JOIN pokemon_type ON (pokemon_details.PokemonType1ID) = pokemon_type.TypeID)
    JOIN pokemon_type ON (pokemon_details.PokemonType2ID) = pokemon_type.TypeID)
    ";

    $find_query = mysqli_query($find_sql, $dbconnect);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>
                       
            
        <div class="box main">
            <h2>All Results</h2>
            
            
            <p>
                <div class="results">
                    
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
                                
                                <div>
                                    &nbsp; &nbsp; | &nbsp; &nbsp;
                                    <?php echo $find_rs['Subtitle']; ?>
                                </div> <!-- Subtitle -->

                                </div> <!-- / flex container div -->
                            
                            <!-- / heading and subtitle -->

                            <p>
                                <b>Pokemon Type 1</b>
                                <?php echo $find_rs['Type']; ?>
                            
                                <b>Pokemon Type 2</b>
                                <?php echo $find_rs['Type']; ?>

                                <b>Total Stats</b>
                                <?php echo $find_rs['Total']; ?>

                                <b>HP</b>
                                <?php echo $find_rs['HP']; ?>

                                <b>Attack</b>
                                <?php echo $find_rs['Attack']; ?>

                                <b>Defense</b>
                                <?php echo $find_rs['Defense']; ?>
                                
                                <b>Special Attack</b>
                                <?php echo $find_rs['Sp. Atk']; ?>

                                <b>Special Defense</b>
                                <?php echo $find_rs['Sp. Def']; ?>

                                <b>Speed</b>
                                <?php echo $find_rs['Speed']; ?>

                                <b>Generation</b>
                                <?php echo $find_rs['Speed']; ?>

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

                    <?php

                        } // end results do

                        while($find_rs=mysqli_fetch_assoc($find_query));
                    } // end results else
                    ?>


                </div>
            </p>
            
        </div> <!-- / main -->

<?php include("bottombit.php"); ?>