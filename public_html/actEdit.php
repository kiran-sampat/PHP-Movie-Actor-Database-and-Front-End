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

    $idsearch = $_GET['id'];
    $actsearch = $_GET['actor'];

    $sql="SELECT actName FROM Actor WHERE actName = '$actsearch'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($Test);
    $stmt->fetch();

    if(isset($Test))
    {
      $stmt->close();
    }
    else
    {
      $stmt->close();
      $sql="UPDATE Actor SET `actName`='$actsearch' WHERE `actID`='$idsearch'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $stmt->close();
    }

    $sql="SELECT actID, actName FROM Actor WHERE actName LIKE '%' ORDER BY actID asc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($ID, $Actor);
  ?>

  <section class="main">
    <h2 id="subTitle"><u>Movie Search Result</u></h2>
    <br><hr><br>

    <div class="data">
      <table>
        <?php
          if(isset($Test)) {
            echo("<p>You cannot enter an Actor/Actress that already exists in the database!</p><br>");
          }
          else {
            echo("<p>Actor Entry for ID: " . htmlentities($idsearch) . ", has been updated successfully</p><br>");
          }
          require('includes/aTable.php');
        ?>
      </table>
      
      <?php
        echo("<br><p>" . htmlentities($count) . " results found.</p>");
      ?>
    </div>

    <br><hr><br>
  </section>

  <?php
    require('includes/footer.php');
  ?>
</body>

</html>
