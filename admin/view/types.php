<?php include 'header.php'; ?> 

<h2>Vehicle Type List</h2>

<section>
  <table>

    <tr>
      <th>Name</th>
      <th>&nbsp;</th>
    </tr>  

    <?php foreach ($types as $type) : ?>
    <tr>
      <td><?php echo $type['typeName']; ?></td>
      <td class="remove">
        <form action="." method="get">
          <input type="hidden" name="action" value="delete_type">
          <input type="hidden" name="typeID" value="<?php echo $type['typeID']; ?>"/>
          <button>Remove</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>  

  </table>
</section>

<section>
  <h2>Add Vehicle Type</h2>
  <form action="." method="get" id="add_type">
    <input type="hidden" name="action" value="add_type">
    <label>Name:</label><br>
    <input type="text" name="typeName"/><br>
    <button>Add Type</button>
  </form>
</section>

<section>
  <p><a href="index.php">View Full Vehicle List</a></p>
  <p><a href="?action=show_make_form">View/Edit Vehicle Makes</a></p>
  <p><a href="?action=show_class_form">View/Edit Vehicle Classes</a></p> 
  <!-- Click here to add a vehicle in footer -->
</section>

<?php include 'footer.php'; ?> 