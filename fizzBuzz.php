<?php
    for($i = 1; $i <=100; $i++) {
        if ($i %3 == 0 && $i % 5 == 0) {
            echo "FizzBuzz\n <br>" ;
            
        }
        elseif ($i % 3 == 0) {
            echo "Fizz\n <br>";
        }
        elseif ($i % 5 == 0) {
            echo "Buzz\n <br>";
        }
        else {
            echo $i. "\n <br>" ;
        }
    }
