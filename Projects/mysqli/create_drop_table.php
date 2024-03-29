<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "curso_php";

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function createLogsTable($conn) {
        $sql = "CREATE TABLE logs (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            log VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Table logs created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }

    function dropLogsTable($conn) {
        $sql = "DROP TABLE logs";

        if ($conn->query($sql) === TRUE) {
            echo "Table logs dropped successfully";
        } else {
            echo "Error dropping table: " . $conn->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['create'])) {
            createLogsTable($conn);
        } elseif( isset($_POST['drop'])) {
            dropLogsTable($conn);
        } elseif( isset($_POST['insert'])) {
            $lipsum = simplexml_load_file('http://www.lipsum.com/feed/xml?amount=1&what=paras&start=0')->lipsum;

            $sqlCommand = "INSERT INTO logs (log) VALUES ('" . $lipsum . "')";
            if ($conn->query($sqlCommand) === TRUE) {
                echo "New record insert into table successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Logs Table</title>
</head>
<body>
    <form method="post">
        <input id="create" type="submit" name="create" value="Create Logs Table">
        <input id="drop" type="submit" name="drop" value="Drop Logs Table">
        <!-- Insert logs -->
        <input id="insert" type="submit" name="insert" value="Insert Logs">
    </form>

    <script>
        $(document).ready(function(){
            $('#create, #drop, #insert).click(function(e) {
                var action = this.id;
                $.ajax({
                    type: "POST",
                    url: "create_drop_table.php", 
                    data: { action: action },
                    success: function(response) {
                        $('#response').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>