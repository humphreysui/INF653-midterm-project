<?php include 'header.php'; ?> 

<!-- make type and class dropdown menu -->
<section class="dropdown row">
  <form action="." method="get" class="dropdown_form col l10 offset-l1 m6 offset-m3 s12">
    
    <input type="hidden" name="action" value="list_vehicles">
    <!-- onChange="this.form.submit()" --> 

    <!-- makes dropdown -->
    <select name="makeID" required onChange="this.form.submit()">

      <option value="." >View All Makes</option>
      
      <!-- <?php foreach ($makes as $make) : ?>
      <option value="<?php echo $make['makeID']; ?>">
      <?php echo $make['makeName']; ?>
      </option>
      <?php endforeach; ?> -->

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
    <select name="typeID" required onChange="this.form.submit()" >

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
    <select name="classID" required onChange="this.form.submit()" >

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
     
  </form>
</section >

<!-- sort option radio buttons-->
<section class="sort_by row section">
  <?php 
     
    $year_check = 'unchecked';
    $price_check = 'unchecked';
    
    if ($year){
      $year_check = 'checked';
       
    }else if ($price){
      $price_check = 'checked';
       
    }
  ?>
  <form action="." method="get" class="col l8 offset-l2 m8 offset-m2 s12">
    <label class="sort_by_text">Sort By:</label> 
    <label>
      <input class="with-gap" type="radio" name="action" value="list_vehicles_by_price" <?php echo $price_check;?>>
      <span>Price</span> 
    </label>
    <label>
      <input class="with-gap" type="radio" name="action" name="group3" value="list_vehicles_by_year" <?php echo $year_check;?>>
      <span>Year</span> 
    </label>
    <button class="right submit_btn btn-small waves-effect waves-light indigo darken-1">Submit</button>   
  </form>  
</section>

<!-- the user vehicle table -->
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
      </tr> 
      <?php endforeach; ?> 
    
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
<div class="divider"></div>

<?php include 'footer.php'; ?> 