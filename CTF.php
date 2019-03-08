<?php 
function stringToASCII($str){
    $ASCII_CODE = array();
    for($i=0; $i<strlen($str);$i++){
        $ASCII_CODE[$i]=ord($str{$i});
    }
    return $ASCII_CODE;
}
function arrayToXor($arr){
    $a="";
    for($i=0;$i<count($arr);$i++){
        $arrayText = "".$arr[$i];
        for($j=0;$j<strlen($arrayText);$j++){
            switch($arrayText[$j]){
                case "0": $a = $a . "0,0";
                        break;
                case "1": $a = $a."7,6";
                        break;
                case "2": $a = $a."7,5";
                        break;
                case "3": $a = $a."7,4";
                        break;
                case "4": $a = $a."6,2";
                        break;
                case "5": $a = $a."7,2";
                        break;
                case "6": $a = $a."4,2";
                        break;
                case "7": $a = $a."5,2";
                        break;
                case "8": $a = $a."10,2";
                        break;
                case "9": $a = $a."1,8";
                        break;
            }
            if(!($j==(strlen($arrayText)-1))){
                $a = $a." || ";
            }
        }
        if(!($i==(count($arr)-1))){
            $a = $a." AND ";
        }
    }
    return $a;
}


if(isset($_POST["submit"])){
    $value ="".$_POST["testedString"];
    $flag = "SoL0_N#P@L_(tF_Lol";
    $enteredHashed = arrayToXor(stringToASCII($value));
    $flagHashed = arrayToXor(stringToASCII($flag));
}

?>

<html>
    <head>
        <title>CTF</title>
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <h1 id="heading">CTF By PUNKHOLIC</h1>
        <form action="" method="POST">
            <input name="testedString" type="text"/>
            <br/>
            <input id="submitButton" type="submit" name="submit" value="Ok"/>
        </form>
        <div id="output">Output:
            <h1>
            <?php 
            if(isset($_POST["submit"])){
                echo $enteredHashed;
            }
            ?>
            </h1>
            <h1 id="result">
            <?php 
            if(isset($_POST["submit"])){
                if($enteredHashed === $flagHashed){
                    echo "You Got It :o";
                }else{
                    echo "Ops..., your brain failed!!";
                }
            }
            ?>
            </h1>
        </div>
    </body>

