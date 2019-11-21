<!doctype html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="StyleSheet.css" rel="stylesheet" type="text/css" />

<body>
    <br>
    <div class="container">
        <div class="card">
            <div class="form-group">
                <form class="form-control" action="insert.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                    <input type="submit" value="submit" name="submit">
                </form>
            </div>
            <br>
            <table class="table table-sm" id="table" ;>
                <h5>Most common names from the last day</h5>
                <thead>
                    <tr>
                        <th id="table">Names</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $db = mysqli_connect("localhost", "root", "", "Names");
                    if($db === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                    }
                    $sql = "SELECT Name, COUNT(*) AS occurrences
                    FROM bookednames
                    Where Date > now() - Interval 1 day
                    GROUP BY Name
                    ORDER BY occurrences DESC
                    LIMIT 5;";
                    $result = $db-> query($sql);
                    if($result-> num_rows > 0) {
                    while ($row = $result-> fetch_assoc()) {
                    echo "
                    <tr><td id='text'>" . $row["Name"] . "</td></tr>";
                    }
                    echo "
                </tbody>
            </table>";
            }
            else {
            echo "There is no name in database!";
            }
            $db-> close();
            ?>
            <br>
            <table id="table" class="table table-sm">
                <h5>Most common names from the last week</h5>
                <thead>
                    <tr>
                        <th id="table">Names</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $db = mysqli_connect("localhost", "root", "", "Names");
                    if($db === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                    }
                    $sql = "SELECT Name, COUNT(*) AS occurrences
                    FROM bookednames
                    Where Date > now() - Interval 7 day
                    GROUP BY Name
                    ORDER BY occurrences DESC
                    LIMIT 5;";
                    $result = $db-> query($sql);
                    if($result-> num_rows > 0) {
                    while ($row = $result-> fetch_assoc()) {
                    echo "
                    <tr><td id='text'>" . $row["Name"] . "</td></tr>";
                    }
                    echo "
                </tbody>
            </table>";
            }
            else {
            echo "There is no name in database!";
            }
            $db-> close();
            ?>
        </div>
    </div>
</body>
</html>