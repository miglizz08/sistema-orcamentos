<?php

//Desafio 1//
$velocidade_carro = 0;

if ($velocidade_carro <= 80){
    print("Boa viagem!");

} else{
    print("Multado!!");
}
    
//Desafio 2//
$numero = 7;

if ($numero % 2 == 0){
    print("Esse número é par!");
} else{
    print("Esse número é impar!");
}

//Desafio 3//
$contador = 10;

while ($contador > 0){
    print($contador . "\n");
    $contador = $contador -1;
    } print("Decolar!!");   


//Desafio 4//
$num = 5;

for ($i = 1; $i <=10; $i++){
    $resultado = $i * $num;
    print($i . "x" . $num . "=" . $resultado . "\n");
}
//Desafio 5//
$idade = 17;
$ingresso_vip = true;

if ($idade >= 18 && $ingresso_vip == true){
    print("Acesso liberado!!");
} else{
    print("Acesso negado!");
}

//Desafio 6//
for($i = 1; $i <=10; $i++){
    if($i == 7){
        print("Anomalia Detectada!");
    }
    else{
        print($i);
    }
}
?>
