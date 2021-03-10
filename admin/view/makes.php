<?php include 'header.php'; ?> 

<h2>Vehicle Make List</h2>

<section>
  <table>

    <tr>
      <th>Name</th>
      <th>&nbsp;</th>
    </tr>  

    <?php foreach ($makes as $make) : ?>
    <tr>
      <td><?php echo $make['makeName']; ?></td>
      <td class="remove">
        <form action="." method="get">
          <input type="hidden" name="action" value="delete_make">
          <input type="hidden" name="makeID" value="<?php echo $make['makeID']; ?>"/>
          <button>Remove</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>  

  </table>
</section>

<section>
  <h2>Add Vehicle Make</h2>
  <form action="." method="get" id="add_make">
    <input type="hidden" name="action" value="add_make">
    <label>Name:</label><br>
    <input type="text" name="makeName"/><br>
    <button>Add Make</button>
  </form>
</section>

<section>
  <p><a href="index.php">View Full Vehicle List</a></p>
  <p><a href="?action=show_type_form">View/Edit Vehicle Types</a></p>
  <p><a href="?action=show_class_form">View/Edit Vehicle Classes</a></p>
  <!-- Click here to add a vehicle in footer -->
</section>

<?php include 'footer.php'; ?> 