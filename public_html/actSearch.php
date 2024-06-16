<!DOCTYPE html>
<html>

<?php
  require('includes/head.php');
?>

<body>
  <?php
    require('includes/header.php');
    require('includes/forms.php');

    require('includes/db.php');

    $titlesearch = $_GET['actor'];

    $sql="SELECT actID,actName FROM Actor WHERE actName LIKE '%$titlesearch%'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($ID, $Actor);
  ?>

  <section class="main">
    <h2 id="subTitle"><u>Actor Search Result</u></h2>
    <br><hr><br>

    <div class="data">
      <table>
        <?php
          echo "<p>Your Search: " . htmlentities($titlesearch) . "<p><br>";
          require('includes/aTable.php');
        ?>
      </table>
      
      <?php
        echo "<br><p>" . htmlentities($count) . " results found.</p>";
      ?>
    </div>

    <br><hr><br>
  </section>

  <?php
    require('includes/footer.php');
  ?>
</body>

</html>
