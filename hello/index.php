<?php
/*
    $myVar = "DM107";
    $a = 10;
    $b = 20;

    if ($a < $b) {
        echo "Oi! - A menor que B";
    }

    //ternario
    $msg = $b > $a ? "B maior que A" : "A maior que B";
    echo "<br>";
    echo $msg;

    //while
    $i = 0;
    while($i < 10){
        echo $i . "<br>";
        $i++;
    }

    for ($i = 0; $i < 10; $i++) {
        echo "For" . $i . "<br>";
    }

    //Array
    $myArray = array(1,2,3,4,5);
    print_r($myArray);

    $myArrayAss = array(
                "Item1" => 1,
                "Item2" =>2,
                "Item3" =>3,
                "Item4" =>4,
                "Item5" =>5);
    print_r($myArrayAss);
    echo "<br>";
    //array associativo get elemento
    echo $myArrayAss["Item5"];

    //array get elemento
    echo $myArray[0];

    echo "<br>";
    //foreach
    foreach($myArray as &$item){
        echo ($item * 2) . "<br>";
    }

    echo "<br>";
    $array = [];
    print_r($array);
    var_dump($array);

    echo "<table border=1>
            <tr>
                <td>1</td>
                <td>2</td>
            </tr>
         </table>";
    */
    echo "Ex1";
    echo "<br>";
    echo "<table border=1>";
    for ($linha = 1; $linha <= 10; $linha++) {
        echo "<tr>";
        for ($coluna = 1; $coluna <=10; $coluna++) {
            echo "<td>" . ($linha * $coluna) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";

    echo "ex2";
    echo "<br>";
    echo "O mês corrente é:" . date("M") . "e tem" . date("t") . "dias";
    echo "<br>";
    
    echo "Ex 3";
    echo "<br>";
    $limite = 5;
    for($i = 1; $i <= $limite; $i++){
        for ($j = 1; $j <= $i; $j++){
            echo " * ";
        }
        echo "<br>";
    }

    for($i = $limite; $i >= 1; $i--){
        for ($j = 1; $j <= $i; $j++){
            echo " * ";
        }
        echo "<br>";
    }

?>