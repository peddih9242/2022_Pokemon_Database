        
        <div class="box side">
           
           <h2>Add an App | <a href="showall.php">Show All</a></h2>
           
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
            
            $type_sql = "SELECT * FROM `pokemon_type` ORDER BY `TypeID` ASC
            ";
            $type_query = mysqli_query($dbconnect, $type_sql);
            $type_rs = mysqli_fetch_assoc($type_query);

            do {
                ?>
                <option value="<?php echo $type_rs['Type']; ?>"><?php echo $type_rs['Type']; ?></option>
            
            <?php
            }

            while($type_rs=mysqli_fetch_assoc($type_query))

            ?>

           </select>

            <!-- Pokemon type 2 dropdown -->
            <select class="search adv" name="type_2">
            <option value="" selected>Pokemon Type 2...</option>
            
            <!-- get options from database -->
            <?php
            $type_sql = "SELECT * FROM `pokemon_type` ORDER BY `TypeID` ASC
            ";
            $type_query = mysqli_query($dbconnect, $type_sql);
            $type_rs = mysqli_fetch_assoc($type_query);

            do {
            ?>
            <option value="<?php echo $type_rs['Type']; ?>"><?php echo $type_rs['Type']; ?></option>
        
            <?php
            }

            while($type_rs=mysqli_fetch_assoc($type_query))

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

        <!-- HP -->
        
        </select>
            <div class="flex-container">
            <div class="adv-txt">HP</div> <!-- / hp label -->
            <div>
            <select class="search adv" name="hp_more_less">
                <option value="">Choose</option>
                <option value="higher">Higher than</option>
                <option value="lower">Lower than</option>
                <option value="equal">Equal to</option>
            </select>
            </div> <!-- / hp dropdown -->
            
            <div>
                <input class="adv" type="text" name="hp" size="3" value="" placeholder=""/>
            </div> <!-- / hp amount -->

        </div> <!-- / hp flexbox-->

        <!-- attack -->

        </select>
            <div class="flex-container">
            <div class="adv-txt">Attack</div> <!-- / attack label -->
            <div>
            <select class="search adv" name="atk_more_less">
                <option value="">Choose</option>
                <option value="higher">Higher than</option>
                <option value="lower">Lower than</option>
                <option value="equal">Equal to</option>
            </select>
            </div> <!-- / attack dropdown -->
            
            <div>
                <input class="adv" type="text" name="atk" size="3" value="" placeholder=""/>
            </div> <!-- / attack amount -->

        </div> <!-- / attack flexbox-->

        <!-- defense -->

        </select>
            <div class="flex-container">
            <div class="adv-txt">Defense</div> <!-- / defense label -->
            <div>
            <select class="search adv" name="def_more_less">
                <option value="">Choose</option>
                <option value="higher">Higher than</option>
                <option value="lower">Lower than</option>
                <option value="equal">Equal to</option>
            </select>
            </div> <!-- / defense dropdown -->
            
            <div>
                <input class="adv" type="text" name="def" size="3" value="" placeholder=""/>
            </div> <!-- / defense amount -->

        </div> <!-- / defense flexbox-->

        <!-- special attack -->

        </select>
            <div class="flex-container">
            <div class="adv-txt">Special Attack</div> <!-- / special attack label -->
            <div>
            <select class="search adv" name="spatk_more_less">
                <option value="">Choose</option>
                <option value="higher">Higher than</option>
                <option value="lower">Lower than</option>
                <option value="equal">Equal to</option>
            </select>
            </div> <!-- / special attack dropdown -->
            
            <div>
                <input class="adv" type="text" name="spatk" size="3" value="" placeholder=""/>
            </div> <!-- / special attack amount -->

        </div> <!-- / special attack flexbox-->

        <!-- special defense -->

        </select>
            <div class="flex-container">
            <div class="adv-txt">Special Defense</div> <!-- / special defense label -->
            <div>
            <select class="search adv" name="spdef_more_less">
                <option value="">Choose</option>
                <option value="higher">Higher than</option>
                <option value="lower">Lower than</option>
                <option value="equal">Equal to</option>
            </select>
            </div> <!-- / special defense dropdown -->
            
            <div>
                <input class="adv" type="text" name="spdef" size="3" value="" placeholder=""/>
            </div> <!-- / special defense amount -->

        </div> <!-- / special defense flexbox-->

        <!-- speed -->

        </select>
            <div class="flex-container">
            <div class="adv-txt">Speed</div> <!-- / speed label -->
            <div>
            <select class="search adv" name="speed_more_less">
                <option value="">Choose</option>
                <option value="higher">Higher than</option>
                <option value="lower">Lower than</option>
                <option value="equal">Equal to</option>
            </select>
            </div> <!-- / speed dropdown -->
            
            <div>
                <input class="adv" type="text" name="speed" size="3" value="" placeholder=""/>
            </div> <!-- / speed amount -->

        </div> <!-- / speed flexbox-->

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

        <input class="adv-txt" type="checkbox" name="legendary" value="0"/>Legendary

        </form>
        </div> <!-- / advanced frame -->
        </div> <!-- / side bar -->
        
        <div class="box footer">
            CC HP 2022
        </div> <!-- / footer -->
                
        
    </div> <!-- / wrapper -->
    
            
</body>