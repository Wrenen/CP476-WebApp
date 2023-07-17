<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Results</title>
    <link rel="stylesheet" href="search_style.css">
</head>
<body>

<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted table value
    $table = $_POST['table'];

    // Retrieve the submitted column values
    $fields = array();
    $values = array();
    $init_count = 0;

    $stmt_prep = "SELECT * FROM $table";
    $stmt_vals = array();
    
    while(true) {
        $field_name = 'field-' . $init_count;
        $field_val = 'input-' . $init_count;
        if (isset($_POST[$field_name]) && isset($_POST[$field_val])) {
            array_push($fields, $_POST[$field_name]);
            array_push($values, trim(htmlspecialchars($_POST[$field_val])));          
        }else {
            break;
        }
        $init_count += 1;
    }

    // Display search paramters names // generate sql prep statement
    echo "<h2>Query Information</h2>";
    echo "<p><strong>Selected Table: </strong>$table</p>";
    echo "<p><strong>Search Parameters:</strong></p>";
    
    if ($init_count > 0){
        $stmt_prep .= " WHERE ";
        for ($i = 0; $i < count($fields); $i++) {
            $field = $fields[$i];
            $value = $values[$i];

            $val_list = explode(",", $value);
            $val_len = count($val_list);
            $sub_stmt = "(";

            if ($val_len > 1) {
                for ($j = 0; $j < $val_len; $j++) {
                    array_push($stmt_vals, $val_list[$j]);
                    $sub_stmt .= ($j != $val_len - 1) ? "$field = ? OR " : "$field = ?)";
                }
                $stmt_prep .= ($i != count($fields) - 1) ?  "$sub_stmt AND ": "$sub_stmt";
            }else {
                array_push($stmt_vals, $value);
                $stmt_prep .= ($i != count($fields) - 1) ? "$field = ? AND ": "$field = ?";
            }
            echo "<p> $field = $value</p>";
        }
    }
    $stmt_len=count($stmt_vals);
    echo "<p><strong>Statement:</strong> $stmt_prep, <strong>indexes:</strong> $stmt_len</p>";

    $stmt = $conn->prepare($stmt_prep);

    // add " " to strings to account for extra space in data naming
    for ($i = 0; $i < $stmt_len; $i++) {
        $binding_val = $stmt_vals[$i];
        
        $stmt->bindValue($i + 1, $binding_val);
    }

    $stmt->execute();
    $resultsTable = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultsTable) > 0) {
        echo "<table border=1>";
        echo "<tr>";
        foreach ($resultsTable[0] as $col => $val) {
            echo "<th>$col</th>";
        }
        echo "</tr>";
        foreach ($resultsTable as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }else {
        echo "<p> -- No Matches -- </p>";
    }
}
?>

<a href="search.html"> <button id="back-btn">back</button> </a>
</body>
</html>