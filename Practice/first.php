<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
       <?php
       echo "Hello World<br>"; 
       $a=1;
       echo $a;   
       echo "<br>";
       echo $a++;
       echo $a--;
       echo ++$a;
       echo --$a;

       $b=10;
       if($b>11){
        echo "hello";
       }
       else{
        echo "bye";
       }

       ?>
    </div>
</body>
</html>