<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Database Results</title>
    <link rel="stylesheet" href="update_style.css">
</head>
<body>
    <h1>Update Database Results</h1>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the submitted table value
        $table = $_POST['table'];

        // Retrieve the submitted column values
        $columns = isset($_POST['columns']) ? $_POST['columns'] : [];
        $values = isset($_POST['values']) ? $_POST['values'] : [];

        // Retrieve the submitted WHERE clause column values
        $whereColumns = isset($_POST['where_columns']) ? $_POST['where_columns'] : [];
        $whereValues = isset($_POST['where_values']) ? $_POST['where_values'] : [];

        // Display the column values and their corresponding column names
        echo "<h2>Columns and Values:</h2>";
        for ($i = 0; $i < count($values); $i++) {
            $column = $_POST['columns'][$i];
            $value = $_POST['values'][$i];

            echo "<p><strong>Column:</strong> $column, <strong>Value:</strong> $value</p>";
        }

        // Display the WHERE clause column values and their corresponding column names
        echo "<h2>WHERE Clause Columns and Values:</h2>";
        for ($i = 0; $i < count($whereValues); $i++) {
            $whereColumn = $_POST['where_columns'][$i];
            $whereValue = $_POST['where_values'][$i];

            echo "<p><strong>Where Column:</strong> $whereColumn, <strong>Where Value:</strong> $whereValue</p>";
        }
    }
    ?>

    <a href="update.html">Go Back</a>
</body>
</html>
