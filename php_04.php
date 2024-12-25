<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <h1>Odd and Even numbers</h1> 
    </head><br>
    <body>
        <form method="post" action="">
            <label for="startNumber"> Start number: </label>
            <input type="number" id="startNumber" name="startNumber" placeholder="Start Number" required><br>
            <label for="EndNumber"> End number:  </label>
            <input type="number" id="endNumber" name="endNumber" placeholder="End Number" required><br> 
            <button type="submit">Done</button>
        </form>
        <?php
            $number1 = 1;
            $number2 = 10;
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $number1 = intval($_POST['startNumber']);
            $number2 = intval($_POST['endNumber']);

            if ($number1 < $number2) {
            for($i = $number1; $i <= $number2; $i++) {
                echo $i;
                if($i%2 == 0) {
                    echo " = even"; 
                }
                else if($i%2 != 0) {
                    echo " = odd";
                }
                echo "<br>";
            }
            }
        }
        else{
            echo "First number must be lesser than the second number.";
        }
        ?>
    </body>
</html>