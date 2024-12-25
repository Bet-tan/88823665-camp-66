<!DOCTYPE html>

<html lang="en">
    <head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <h1>x12 Multiplier</h1> 
    <style>
        input[type=number] {
            font-size: 1.5rem; /* Bigger text inside the input */
            width: 30%;
            box-sizing: border-box;
        }
        button[type=submit] {
            font-size: 1.5rem;
        }
    </style>
    </head><br>
    <body>
        <form method="post" action="">
            <label for="inputHere"> <h1>Choose a number</h1> </label>
            <input type="number" id="inputHere" name="inputHere" placeholder="Insert Number..." required>
            <button type="submit" onclick="displayNumber()">Done</button>
        </form>
            <?php
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $number = intval($_POST['inputHere']);

            for($i = 1; $i <= 12; $i++) {
                $result = $number*$i;
                echo "<h2>$number x $i = $result</h2>";
            }
            }
            ?>
    </body>