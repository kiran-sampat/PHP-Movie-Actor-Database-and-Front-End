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
    $titlesearch = $_GET['movie'];
    $actsearch = $_GET['actor'];
    $pricesearch = $_GET['price'];
    $yearsearch = $_GET['year'];
    $genresearch = $_GET['genre'];

    $sql="INSERT INTO Actor SELECT '#', '$actsearch' FROM DUAL WHERE NOT EXISTS
          ( SELECT actID, actName FROM Actor WHERE actName='$actsearch' )";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->close();

    $sql="SELECT actID FROM Actor WHERE actName = '$actsearch'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($actidreturn);
    $stmt->fetch();
    $stmt->close();

    $sql="UPDATE `Movie` SET `mvTitle`='$titlesearch', `actID`='$actidreturn', `mvPrice`='$pricesearch',
          `mvYear`='$yearsearch', `mvGenre`='$genresearch' WHERE `mvID`='$idsearch'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->close();

    $sql="SELECT mvID,actName,mvTitle,mvPrice,mvYear,mvGenre 
          FROM Movie JOIN Actor ON Movie.actID = Actor.actID
          WHERE mvTitle LIKE '%' ORDER BY mvID asc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($ID, $Actor, $Title, $Price, $Year, $Genre);
  ?>

  <section class="main">
    <h2 id="subTitle"><u>Movie Added</u></h2>
    <br><hr><br>

    <div class="data">
      <table>
        <?php
          echo ("<p>Actor entry for ID: " . htmlentities($idsearch) . ", has been updated successfully</p><br>");
          require('includes/mTable.php');
        ?>
      </table>

      <?php
        echo ("<br><p>" . htmlentities($count) . " entries shown.</p>");
      ?>
    </div>

    <br><hr><br>
  </section>

  <?php
    require('includes/footer.php');
  ?>
</body>

</html>
