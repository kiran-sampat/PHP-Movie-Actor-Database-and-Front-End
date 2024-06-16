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

    $titlesearch = $_GET['movie'];

    $sql="DELETE FROM Movie WHERE mvTitle = '$titlesearch'";
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
    <h2 id="subTitle"><u>Movie Search Result</u></h2>
    <br><hr><br>

    <div class="data">
      <table>
        <?php
          echo "<p>Entry '" . htmlentities($titlesearch) . "' deleted successfully</p><br>";
          require('includes/mTable.php');
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
