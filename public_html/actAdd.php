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

    $sql="SELECT actName FROM Actor WHERE actName = '$titlesearch'";
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
      $sql="INSERT INTO Actor (actName) VALUES ('$titlesearch')";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $stmt->close();
    }

    $sql="SELECT actID, actName FROM Actor WHERE actName LIKE '%' ORDER BY actID desc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($ID, $Actor);
  ?>

  <section class="main">
    <h2 id="subTitle"><u>Actor Added</u></h2>
    <br><hr><br>

    <div class="data">
      <table>
        <?php
          if(isset($Test)) {
            echo "<p>0 entries added, duplicate found: '" . htmlentities($titlesearch) . "'.<br>
            You cannot enter an Actor/Actress that already exists in the database!</p><br>";
          }
          else {
            echo "<p>1 entry added: '" . htmlentities($titlesearch) . "'</p><br>";
          }
          require('includes/aTable.php');
        ?>
      </table>
      
      <?php
        echo "<br><p>" . htmlentities($count) . " entries shown.</p>";
      ?>
    </div>

    <br><hr><br>
  </section>

  <?php
    require('includes/footer.php');
  ?>
</body>

</html>
