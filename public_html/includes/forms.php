<?php require('includes/db.php'); ?>

<section class="forms">
    <form class="hide" id=1 action="mvAdd.php" onSubmit="return validate(this)">
        <br>
        <h2 id="subTitle"><u>Add Movie</u></h2>
        <br> <hr><br>
        <table>
            <tr>
                <td><label for="AddM1">Movie Title: </label></td>
                <td><input type="text" id="AddM1" name="movie" placeholder="Enter movie name" required></td>
            </tr>
            <tr>
                <td><label for="AddM2">Movie Year: </label></td>
                <td><input type="number" id="AddM2" name="year" placeholder="Enter year of release" min="1878" max="2030" required></td>
            </tr>
            <tr>
                <td><label for="AddM3">Movie Genre: </label></td>
                <td><select type="text" id="AddM3" name="genre" placeholder="Enter movie genre" required>
                        <option value="" disabled selected>Enter genre</option>
                        <option value="Action">Action</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Animation">Animation</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Crime">Crime</option>
                        <option value="Documentry">Documentry</option>
                        <option value="Drama">Drama</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Horror">Horror</option>
                        <option value="Musical">Musical</option>
                        <option value="Romance">Romance</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Thriller">Thriller</option>
                        <option value="War">War</option>
                        <option value="Western">Western</option>
                        <option value="Other">Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="AddM4">Movie Price: </label></td>
                <td><input type="number" id="AddM4" name="price" placeholder="Enter movie price" step="0.01" min="0.00" max="1000.00" required></td>
            </tr>
            <tr>
                <td><label for="AddM5">Actor Name: </label></td>
                <td><input type="text" id="AddM5" name="actor" placeholder="Enter actor name" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Add"></td>
            </tr>
        </table>
        <br> <hr><br>
    </form>

    <form class="hide" id=2 action="actAdd.php" onSubmit="return validate(this)">
        <br>
        <h2 id="subTitle"><u>Add Actor</u></h2>
        <br><hr><br>
        <table>
            <tr>
                <td><label for="addA">Actor Name: </label></td>
                <td><input type="text" id="addA" name="actor" placeholder="Enter actor" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Add"></td>
            </tr>
        </table>
        <br><hr><br>
    </form>

    <form class="hide" id=3 action="mvSearch.php" onSubmit="return validate(this)">
        <br>
        <h2 id="subTitle"><u>Movie Search</u></h2>
        <br><hr><br>
        <table>
            <tr>
                <td><label for="searchM">Movie Title: </label></td>
                <td><input type="text" id="searchM" name="movie" placeholder="Enter movie" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Search"></td>
            </tr>
        </table>
        <br><hr><br>
    </form>

    <form class="hide" id=4 action="actSearch.php" onSubmit="return validate(this)">
        <br>
        <h2 id="subTitle"><u>Actor Search</u></h2>
        <br><hr><br>
        <table>
            <tr>
                <td><label for="searchA">Actor Name: </label></td>
                <td><input type="text" id="searchA" name="actor" placeholder="Enter actor" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Search"></td>
            </tr>
        </table>
        <br><hr><br>
    </form>

    <form class="hide" id=5 action="mvDelete.php">
        <br>
        <h2 id="subTitle"><u>Delete Movie</u></h2>
        <br> <hr><br>
        <table>
            <tr>
                <td><label for="deleteM">Movie Title: </label></td>
                <td><select type="text" id="deleteM" name="movie" required>
                    <option value="" disabled selected>Select movie</option>
                    <?php
                        $sql = "SELECT mvTitle FROM Movie WHERE mvTitle LIKE '%'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $stmt->bind_result($DelM);

                        while($stmt->fetch())
                        {
                            echo "<option>" . htmlentities($DelM) . "</option>";
                        }
                        $stmt->close();
                    ?>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Delete"></td>
            </tr>
        </table>
        <br><hr><br>
    </form>

    <form class="hide" id=6 action="actDelete.php">
        <br>
        <h2 id="subTitle"><u>Delete Actor</u></h2>
        <br><hr><br>
        <table>
            <tr>
                <td><label for="deleteA">Actor Name: </label></td>
                <td><select type="text" id="deleteA" name="actor" required>
                    <option value="" disabled selected>Select actor</option>
                    <?php                
                        $sql = "SELECT actName FROM Actor WHERE actName LIKE '%'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $stmt->bind_result($DelA);

                        while($stmt->fetch())
                        {
                            echo "<option>" . htmlentities($DelA) . "</option>";
                        }
                        $stmt->close();
                    ?>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Delete"></td>
            </tr>
        </table>
        <br><hr><br>
    </form>

    <form class="hide" id=7 action="mvEdit.php" onSubmit="return validate(this)">
        <br>
        <h2 id="subTitle"><u>Edit Movie Entry</u></h2>
        <br><hr><br>
        <table>
            <tr>
                <td><label for="EditM0">Movie ID: </label></td>
                <td><input class="read" type="text" id="EditM0" name="id" readonly></td>
            </tr>
            <tr>
                <td><label for="EditM1">Movie Title: </label></td>
                <td><input type="text" id="EditM1" name="movie" required></td>
            </tr>
            <tr>
                <td><label for="EditM2">Movie Year: </label></td>
                <td><input type="number" id="EditM2" name="year" min="1878" max="2030" required></td>
            </tr>
            <tr>
                <td><label for="EditM3">Movie Genre: </label></td>
                <td><select type="text" id="EditM3" name="genre" placeholder="Enter movie genre" required>
                        <option value="" disabled selected>Enter genre</option>
                        <option value="Action">Action</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Animation">Animation</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Crime">Crime</option>
                        <option value="Documentry">Documentry</option>
                        <option value="Drama">Drama</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Horror">Horror</option>
                        <option value="Musical">Musical</option>
                        <option value="Romance">Romance</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Thriller">Thriller</option>
                        <option value="War">War</option>
                        <option value="Western">Western</option>
                        <option value="Other">Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="EditM4">Movie Price: </label></td>
                <td><input type="number" id="EditM4" name="price" step="0.01" min="0.00" max="1000.00" required></td>
            </tr>
            <tr>
                <td><label for="EditM5">Actor Name: </label></td>
                <td><input type="text" id="EditM5" name="actor" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update"></td>
            </tr>
        </table>
        <br><hr><br>
    </form>

    <form class="hide" id=8 action="actEdit.php" onSubmit="return validate(this)">
        <br>
        <h2 id="subTitle"><u>Edit Actor Entry</u></h2>
        <br><hr><br>
        <table>
            <tr>
                <td><label for="EditA0">Actor ID: </label></td>
                <td><input class="read" type="text" id="EditA0" name="id" readonly></td>
            </tr>
            <tr>
                <td><label for="EditA1">Actor Name: </label></td>
                <td><input type="text" id="EditA1" name="actor" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update"></td>
            </tr>
        </table>
        <br><hr><br>
    </form>
</section>
