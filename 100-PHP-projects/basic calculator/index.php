<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Basic PHP Calculator</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        padding: 20px;
    }

    .calculator {
        max-width: 400px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background: #f9f9f9;
    }

    input,
    select,
    button {
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        font-size: 16px;
    }

    .result {
        font-size: 20px;
        color: green;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="calculator">
        <h1>Basic PHP Calculator</h1>
        <form method="post" action="">
            <input type="number" name="num1" placeholder="Enter First Number" required />
            <select name="operation">
                <option value="add">Add</option>
                <option value="subtract">Subtract</option>
                <option value="multiply">Multiply</option>
                <option value="divide">Divide</option>
            </select>
            <input type="number" name="num2" placeholder="Enter Second Number" required />
            <button type="submit" name="calculate">Calculate</button>
        </form>

        <div class="result">
            <?php

        
error_reporting(E_ALL);
ini_set('display_errors', 1);


        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["calculate"])) {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operation = $_POST["operation"];
            $result = null;

            switch ($operation) {
                case "add":
                    $result = $num1 + $num2;
                    break;
                case "subtract":
                    $result = $num1 - $num2;
                    break;
                case "multiply":
                    $result = $num1 * $num2;
                    break;
                case "divide":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "Error: Division by zero!";
                    }
                    break;
                default:
                    $result = "Invalid operation!";
            }

            echo "Result: $result";
        }
        ?>
        </div>
    </div>
</body>

</html>