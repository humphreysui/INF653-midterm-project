<?php include 'header.php'; ?> 

<h2>Add Vehicle</h2> 

<section class="row dropdown">
  <form action="." method="get" id="add_vehicle" class="dropdown_form col l6 offset-l3 m6 offset-m3 s12">
      <input type="hidden" name="action" value="add_vehicle">
      
      <label class="label_text black-text">Make:</label><br>
      <select name="makeID">
        <?php foreach ($makes as $make) : ?>
        <option value="<?php echo $make['makeID']; ?>">
          <?php echo $make['makeName']; ?>
        </option>
        <?php endforeach; ?>  
      </select><br>

      <label class="label_text black-text">Type:</label><br>
      <select name="typeID">
        <?php foreach ($types as $type) : ?>
        <option value="<?php echo $type['typeID']; ?>">
          <?php echo $type['typeName']; ?>
        </option>
        <?php endforeach; ?>
      </select><br>

      <label class="label_text black-text">Class:</label><br>
      <select name="classID">
        <?php foreach ($classes as $class) : ?>
        <option value="<?php echo $class['classID']; ?>">
          <?php echo $class['className']; ?>
        </option>
        <?php endforeach; ?>
      </select><br>
      <br>    
      <label class="label_text black-text">Year:</label><br>
      <input type="text" name="year"><br>

      <label class="label_text black-text">Model:</label><br>
      <input type="text" name="model"><br>

      <label class="label_text black-text">Price:</label><br>
      <input type="text" name="price"><br>

      <label>&nbsp;</label><br>
      <button class="btn right waves-effect waves-light indigo darken-1">Add Vehicle</button><br>
    </form>
</section>

<section class="row page-link section">
  <div class="col l6 offset-l3 m8 offset-m3 s12">
    
    <p><a class="black-text" href="index.php">View Full Vehicle List</a></p>
    <p><a class="black-text" href="?action=show_make_form">View/Edit Vehicle Makes</a></p>
    <p><a class="black-text" href="?action=show_type_form">View/Edit Vehicle Types</a></p>
    <p><a class="black-text" href="?action=show_class_form">View/Edit Vehicle Classes</a></p> 

  </div>
</section>


<?php include 'footer.php'; ?> 