<?php include 'header.php'; ?> 

<h2>Add Vehicle</h2>

<section>
  <form action="." method="get" id="add_vehicle">
      <input type="hidden" name="action" value="add_vehicle">
      
      <label>Make:</label><br>
      <select name="makeID">
        <?php foreach ($makes as $make) : ?>
        <option value="<?php echo $make['makeID']; ?>">
          <?php echo $make['makeName']; ?>
        </option>
        <?php endforeach; ?>
      </select><br>

      <label>Type:</label><br>
      <select name="typeID">
        <?php foreach ($types as $type) : ?>
        <option value="<?php echo $type['typeID']; ?>">
          <?php echo $type['typeName']; ?>
        </option>
        <?php endforeach; ?>
      </select><br>

      <label>Class:</label><br>
      <select name="classID">
        <?php foreach ($classes as $class) : ?>
        <option value="<?php echo $class['classID']; ?>">
          <?php echo $class['className']; ?>
        </option>
        <?php endforeach; ?>
      </select><br>

      <label>Year:</label><br>
      <input type="text" name="year"><br>

      <label>Model:</label><br>
      <input type="text" name="model"><br>

      <label>Price:</label><br>
      <input type="text" name="price"><br>

      <label>&nbsp;</label><br>
      <button>Add Vehicle</button><br>
    </form>
</section>

<section>
  <a href="?action=show_make_form">View/Edit Vehicle Makes</a>
  <p>View/Edit Vehicle Types</p>
  <p>View/Edit Vehicle Classes</p>
</section>


<?php include 'footer.php'; ?> 