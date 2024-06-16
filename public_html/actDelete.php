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

    $sql="SELECT actID FROM Actor WHERE actName = '$titlesearch'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($actIDreturn);
    $stmt->fetch();
    $stmt->close();

    $sql="DELETE FROM Movie WHERE actID = '$actIDreturn'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->close();

    $sql="DELETE FROM Actor WHERE actID = '$actIDreturn'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->close();

    $sql="SELECT actID, actName FROM Actor WHERE actName LIKE '%' ORDER BY actID desc";
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
          echo("<p>Entry '" . htmlentities($titlesearch) . "' deleted successfully</p><br>");
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
