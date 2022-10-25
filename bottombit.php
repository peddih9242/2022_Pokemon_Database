        
        <div class="box side">
           
           <h2><a href="addentry.php">Add a Pokemon</a> | <a href="showall.php">Show All</a></h2>
           
            <hr />

            
           <form class="searchform" method="post" action="pokemon_name.php" enctype="multipart/form-data">

           <input class="search" type="text" name="poke_name" size="30" value="" required placeholder="Pokemon Name..." />
            <input class="submit" type="submit" name="find_pokemon" value="&#xf002;" />

           </form>

           <form class="searchform" method="post" action="legendary.php" enctype="multipart/form-data">

            <input class="submit legendary" type="submit" name="legendary" value="Legendary Pokemon &nbsp; &#xf002;" />

           </form>

           <hr />
           <div class="advanced-frame">
           <form class="searchform" method="post" action="advanced.php" enctype="multipart/form-data">

           <!-- pokemon name text input box -->
           <input class="adv" type="text" name="pokemon_name" size="30" value="" placeholder="Pokemon Name..."/>

           <!-- Pokemon type 1 dropdown -->
           <select class="search adv" name="type_1">

            <option value="" selected>Pokemon Type 1...</option>

            <!-- get options from database -->

            <?php 
            
            $type_1_sql = "SELECT * FROM `pokemon_type`
            WHERE `TypeID` NOT LIKE '0' ORDER BY `Type` ASC
            ";
            $type_1_query = mysqli_query($dbconnect, $type_1_sql);
            $type_1_rs = mysqli_fetch_assoc($type_1_query);

            do {
                ?>
                <option value="<?php echo $type_1_rs['TypeID']; ?>"><?php echo $type_1_rs['Type']; ?></option>
            
            <?php
            }

            while($type_1_rs=mysqli_fetch_assoc($type_1_query))

            ?>

           </select>

            <!-- Pokemon type 2 dropdown -->
            <select class="search adv" name="type_2">
            <option value="" selected>Pokemon Type 2...</option>
            
            <!-- get options from database -->
            <?php
            $type_2_sql = "SELECT * FROM `pokemon_type` ORDER BY `TypeID` ASC
            ";
            $type_2_query = mysqli_query($dbconnect, $type_2_sql);
            $type_2_rs = mysqli_fetch_assoc($type_2_query);

            do {
            ?>
            <option value="<?php echo $type_2_rs['TypeID']; ?>"><?php echo $type_2_rs['Type']; ?></option>
        
            <?php
            }

            while($type_2_rs=mysqli_fetch_assoc($type_2_query))

            ?>
            
            <!-- Total stats -->
            </select>
            <div class="flex-container">
            <div class="adv-txt">Total</div> <!-- / total label -->
            <div>
            <select class="search adv" name="total_more_less">
                <option value="">Choose</option>
                <option value="higher">Higher than</option>
                <option value="lower">Lower than</option>
                <option value="equal">Equal to</option>
            </select>
            </div> <!-- / total dropdown -->
             
            <div>
                <input class="adv" type="text" name="total" size="3" value="" placeholder=""/>
            </div> <!-- / total amount -->

        </div> <!-- / total flexbox-->


        <!-- generation -->

        </select>
            <div class="flex-container">
            <div class="adv-txt">Generation</div> <!-- / gen label -->
            <div>
            <select class="search adv" name="gen_more_less">
                <option value="">Choose</option>
                <option value="higher">Higher than</option>
                <option value="lower">Lower than</option>
                <option value="equal">Equal to</option>
            </select>
            </div> <!-- / generation dropdown -->
            
            <div>
                <input class="adv" type="text" name="gen" size="3" value="" placeholder=""/>
            </div> <!-- / generation amount -->

        </div> <!-- / generation flexbox-->

        <!-- legendary checkbox -->

        <select class="search adv" name="legendary">
            <option value="">Legendary Search...</option>
            <option value="1">Non-Legendary Only</option>
            <option value="2">Legendary Only</option>
            <option value="3">Legendary and Non-Legendary</option>

        </select>

        <!-- submit button -->
        <input class="submit advanced-button" type="submit" name="advanced" value="Search &nbsp; &#xf002;" />

        </form>
        </div> <!-- / advanced frame -->
        </div> <!-- / side bar -->
        
        <div class="box footer">
            CC HP 2022
        </div> <!-- / footer -->
                
        
    </div> <!-- / wrapper -->
    
            
</body>