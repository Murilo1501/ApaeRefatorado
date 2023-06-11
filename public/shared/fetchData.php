<?php

//Exibe as chaves e valores de arrays associativas dentro de uma array
function fetchData(array $table) { 
    for($i=0;$i<count($table);$i++) { //Loop pela array
        foreach($table[$i] as $key=>$value) { //Loop pela array associativa
            echo "Chave: {$key}\nValor:{$value}";
        } 
    }
}

?>