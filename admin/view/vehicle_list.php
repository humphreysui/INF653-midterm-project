<?php include 'header.php'; ?> 

<!-- make type and class dropdown menu -->

<section class="dropdown row">

  <form action="." method="get" class="dropdown_form col l10 offset-l1 m8 offset-m2 s12">
    <input type="hidden" name="action" value="list_vehicles">
    
    <!-- makes dropdown -->
    <label class="label_text black-text">Menu:</label><br>
    <select name="makeID" required>

      <option value="." ><span >View All Makes</span> </option>
      
      <!-- #TODO: show selected (remove extra padding) -->
      <?php foreach ($makes as $make): ?>
        <?php if ($makeID == $make['makeID']){ ?>
      <option value="<?php echo $make['makeID'];?>" selected >
        <?php }else{ ?>
      <option value="<?php echo $make['makeID'];?>">
        <?php } ?>
            <?php echo $make['makeName'];?>
      </option>
      <?php endforeach; ?> 
  
    </select>

    <!-- types dropdown -->
    <select name="typeID" required>

      <option selected value=".">View All Types</option>
      <?php foreach ($types as $type) : ?>
        <?php if ($typeID == $type['typeID']){ ?>
          <option value="<?php echo $type['typeID'];?>" selected>
        <?php }else{ ?>
          <option value="<?php echo $type['typeID'];?>">
        <?php } ?>
            <?=$type['typeName']?>
          </option>
      <?php endforeach; ?>  

    </select>
  
    <!-- classes dropdown -->   
    <select name="classID" required>

      <option selected value=".">View All Classes</option>
      <?php foreach ($classes as $class) : ?>
        <?php if ($classID == $class['classID']){ ?>
          <option value="<?php echo $class['classID'];?>" selected>
        <?php }else{ ?>
          <option value="<?php echo $class['classID'];?>">
        <?php } ?>
            <?php echo $class['className']; ?>
          </option>
      <?php endforeach; ?>  

    </select>
     
    <!-- radio button -->
    <div class="sort_by col l10 offset-l1 m12 s12 section">

      <label><span class="sort_by_text">Sort By:</span></label> 

      <!-- sort by price radio -->  
      <label>
        <input class="with-gap" type="radio" name="sort" value="price" >
        <span class="sort_by_text">Price</span> 
      </label>

      <!-- sort by year radio -->
      <label>
        <input class="with-gap" type="radio" name="sort" value="year" >
        <span class="sort_by_text">Year</span> 
      </label>

      <!-- submit button for all -->
      <button class="right btn-small waves-effect waves-light indigo darken-1">Submit</button>  
    
    </div> 
  </form>  
</section>

<!-- the admin vehicle table -->
<section class="row section">
  <table class="col l10 offset-l1 m8 offset-m2 s12 responsive-table centered highlight">
    <thead>
      <tr>
        <th>Year</th> 
        <th>Make</th>
        <th>Model</th>
        <th>Type</th>
        <th>Class</th>
        <th>Price</th>
        <th>&nbsp;</th>
      </tr>
    </thead>

    <?php if($vehicles){ ?>

      <?php foreach($vehicles as $vehicle) : ?> 
      <tr>
        <td><?php echo $vehicle['year']; ?></td> 
        <td><?php echo get_makeName_from_makes($vehicle['makeID']); ?></td> 
        <td><?php echo $vehicle['model']; ?></td> 
        <td><?php echo get_typeName_from_types($vehicle['typeID']); ?></td> 
        <td><?php echo get_className_from_classes($vehicle['classID']); ?></td>
        <td><?php echo '$'.number_format($vehicle['price'], 2, '.', ','); ?></td>

        <!-- delete button -->
        <td>
          <form action=".?controllers/vehicle_controller.php" method="post"> 
            <input type="hidden" name="action" value="delete_vehicle">
            <input type="hidden" name="vehicleID" value="<?php echo $vehicle['vehicleID']; ?>"> 
            <button class="btn-small waves-effect waves-light deep-orange darken-2">Remove</button>
          </form>
        </td>   
      </tr> 
      <?php endforeach; ?> 
    
    <!-- TODO -->
    <?php }else{ ?>
      <br>
      <?php if($makeID){ ?>
        <p>No make.</p>
      <?php }else if(!$typeID){ ?>
        <p>No Type.</p>
      <?php }else if($classID){ ?>
        <p>No Class.</p>
      <?php }else{ ?>
      <p>Nothing Found. </p>
      <?php } ?>
    <?php } ?>

  </table>
</section> 

 
<section class="row page-link">
  <div class="col l6 offset-l1 m8 offset-m3 s12">
    
    <p><a class="black-text" href="index.php">View Full Vehicle List</a></p>
    <p><a class="black-text" href="?action=show_make_form">View/Edit Vehicle Makes</a></p>
    <p><a class="black-text" href="?action=show_vehicle_form">Click here</a> to add a vehicle.</p> 
    <p><a class="black-text" href="?action=show_type_form">View/Edit Vehicle Types</a></p>
    <p><a class="black-text" href="?action=show_class_form">View/Edit Vehicle Classes</a></p> 

  </div>
</section>


<?php include 'footer.php'; ?> 