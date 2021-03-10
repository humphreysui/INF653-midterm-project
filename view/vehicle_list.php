<?php include 'header.php'; ?> 

<!-- make type and class dropdown menu -->
<section>
  <form action="." method="get">
 
    <input type="hidden" name="action" value="list_vehicles">
    <!-- onChange="this.form.submit()" --> 
    
    <!-- makes dropdown -->
    <select name="makeID" required onChange="this.form.submit()" >

      <option value="0" selected>View All Makes</option>
      <?php foreach ($makes as $make): ?>
        <?php if ($makeID == $make['makeID']){ ?>
          <option value="<?php echo $make['makeID'];?>" selected>
        <?php }else{ ?>
          <option value="<?php echo $make['makeID'];?>">
        <?php } ?>
            <?php echo $make['makeName'];?>
          </option>
      <?php endforeach; ?> 
  
    </select><br>

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

    </select><br>
  

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

    </select><br>
    <!-- <button>submit</button> -->
  </form>
</section>

<!-- sort option radio buttons-->
<section>
  <?php 
     
    $year_check = 'unchecked';
    $price_check = 'unchecked';
    
    if ($year){
      $year_check = 'checked';
       
    }else if ($price){
      $price_check = 'checked';
       
    }
  ?>
  <form action="." method="get">
    <label>Sort By:</label> 
    <input type="radio" name="action" value="list_vehicles_by_price" <?php echo $price_check;?>>Price
    <input type="radio" name="action" value="list_vehicles_by_year" <?php echo $year_check;?>>Year
    <button>Submit</button>   
  </form>  
</section>

<!-- the user vehicle table -->
<section>
  <table> 
    <tr>
      <th>Year</th> 
      <th>Make</th>
      <th>Model</th>
      <th>Type</th>
      <th>Class</th>
      <th>Price</th>
      <th>&nbsp;</th>
    </tr>
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
    
<?php include 'footer.php'; ?> 