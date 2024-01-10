<?php
function calcularDesconto($valorProduto, $categoria) {
    $descontos = [
        "eletronicos" => 0.10,
        "vestuario" => 0.20,
        "alimentos" => 0.05
    ];

    if (array_key_exists($categoria, $descontos)) {
        $desconto = $descontos[$categoria];
        $valorDescontado = $valorProduto * (1 - $desconto);
    } else {
        $valorDescontado = $valorProduto;
    }

    return $valorDescontado;
}
?>
