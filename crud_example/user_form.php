<?php include('includes/header.php'); ?>




<form method="post" action="user_submit.php">

  <?php
    $isEditing = false;
    if (isset($_GET['id'])){
      $isEditing = true;

      $sql = "SELECT * FROM `exp` WHERE id =".$_GET['id']." LIMIT 1;";

      $result = $conn->query($sql);

      $row = $result->fetch_assoc();

      print "<input type=\"hidden\" name=\"id\" value=\"". $_GET['id']. "\"/>";

    }
  ?>



  <input name="name" placeholder="name" <?php if ($isEditing) { ?> value="<?php print $row['name']?>"<?php } ?> />
  <input name="phone" placeholder="phone"<?php if ($isEditing) { ?>  value="<?php print $row['phone']?>" <?php } ?>/>
  <input name="address" placeholder="address" <?php if ($isEditing) { ?>  value="<?php print $row['address']?>" <?php } ?>/>

  <input type = "submit" value="GO!" />
</form>


<?php include('includes/footer.php'); ?>
