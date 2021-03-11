<?php include 'header.php'; ?> 

<h2>Vehicle Class List</h2>

<section class="row">
  <table class="responsive-table centered highlight col l6 offset-l3 m6 offset-m3 s12">
    
    <thead>
      <tr>
        <th>Name</th>
        <th>&nbsp;</th>
      </tr>  
    </thead>

    <?php foreach ($classes as $class) : ?>
    <tr>
      <td><?php echo $class['className']; ?></td>
      <td class="remove">
        <form action="." method="get">
          <input type="hidden" name="action" value="delete_class">
          <input type="hidden" name="classID" value="<?php echo $class['classID']; ?>"/>
          <button class="btn-small waves-effect waves-light deep-orange darken-2">Remove</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>  

  </table>
</section>

<section class="row section">
  <h2>Add Vehicle Class</h2>
  <form action="." method="get" id="add_class" class="col l6 offset-l3 m6 offset-m3 s12">
    <input type="hidden" name="action" value="add_class">
    <label class="black-text">Name:</label><br>
    <input type="text" name="className"/><br>
    <button class="btn right waves-effect waves-light indigo darken-1">Add Class</button>
  </form>
</section>

<section class="row page-link section">
  <div class="col l6 offset-l3 m8 offset-m3 s12">
    
    <p><a class="black-text" href="index.php">View Full Vehicle List</a></p>
    <p><a class="black-text" href="?action=show_vehicle_form">Click here</a> to add a vehicle.</p>
    <p><a class="black-text" href="?action=show_make_form">View/Edit Vehicle Makes</a></p>  
    <p><a class="black-text" href="?action=show_type_form">View/Edit Vehicle Types</a></p>
    

  </div>
</section>
<div class="divider"></div>

<?php include 'footer.php'; ?> 