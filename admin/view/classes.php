<?php include 'header.php'; ?> 

<h2>Vehicle Class List</h2>

<section>
  <table>

    <tr>
      <th>Name</th>
      <th>&nbsp;</th>
    </tr>  

    <?php foreach ($classes as $class) : ?>
    <tr>
      <td><?php echo $class['className']; ?></td>
      <td class="remove">
        <form action="." method="get">
          <input type="hidden" name="action" value="delete_class">
          <input type="hidden" name="classID" value="<?php echo $class['classID']; ?>"/>
          <button>Remove</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>  

  </table>
</section>

<section>
  <h2>Add Vehicle Class</h2>
  <form action="." method="get" id="add_class">
    <input type="hidden" name="action" value="add_class">
    <label>Name:</label><br>
    <input type="text" name="className"/><br>
    <button>Add Class</button>
  </form>
</section>

<section>
  <p><a href="index.php">View Full Vehicle List</a></p>
  <p><a href="?action=show_make_form">View/Edit Vehicle Makes</a></p>
  <p><a href="?action=show_type_form">View/Edit Vehicle Types</a></p>
  <!-- Click here to add a vehicle in footer -->
</section>

<?php include 'footer.php'; ?> 