<?php
function tablita($num){
    $numTabla=$_POST["num"];
    $archivo=fopen("tabla.txt", "w");
    fputs($archivo, "TABLA DE MULTIPLICAR DEL $numTabla".PHP_EOL);
    for($i=0; $i < 11; $i++){
       $result=$i*$numTabla;
       fputs($archivo, "$numTabla x $i=$result".PHP_EOL);
    }
    fclose($archivo);
}

function sumar($num1, $num2){
    $result=$num1+$num2;
    return $result;
}

function restar($num1, $num2){
    $result=$num1-$num2;
    return $result;
}

function multiplicar($num1, $num2){
    $result=$num1*$num2;
    return $result;
}

function dividir($num1, $num2){
    if($num2==0){
        return "No se puede dividir entre 0.";
    }else{
       $result=$num1/$num2;
       return $result; 
    }
    
}

function dia_semana($d){
    switch($d){
        case 'L': return "La letra introducida corresponde a Lunes."; break;
        case 'M': return "La letra introducida corresponde a Martes."; break;
        case 'X': return "La letra introducida corresponde a Miércoles."; break;
        case 'J': return "La letra introducida corresponde a Jueves."; break;
        case 'V': return "La letra introducida corresponde a Viernes."; break;
        case 'S': return "La letra introducida corresponde a Sábado."; break;
        case 'D': return "La letra introducida corresponde a Domingo."; break;
        default: return "No corresponde a ningún día de la semana."; break;
    }
}

?>