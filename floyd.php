<?php

$matrix_input = [
    [0,3,7,4,999,999],
    [3,0,2,999, 999,9],
    [7,2,0,1,3,6],
    [4,999,1,0,3,999],
    [999,999,3,3,0,3],
    [999,9,6,999,3,0],
];

$baris = count($matrix_input);
$kolom = count($matrix_input[0]);

$node = $baris;

$matrix_before = $matrix_input;

$hasil_matrix = [];


for ($k=0; $k < $node; $k++) { 
    $hasil_matrix[$k] = [];
    $node_ke = $k + 1;
    echo "<b>Node ke : ".$node_ke."</b><br>";
    for ($i=0; $i < $baris; $i++) { 
        for ($j=0; $j < $kolom; $j++) { 
            
            $a = $matrix_before[$i][$j];
            $b = $matrix_before[$i][$k];
            $c = $matrix_before[$k][$j];

            $hitung =  $b + $c;
            $hasil = ($a < $hitung)?$a:$hitung;
        
            $hasil_matrix[$k][$i][$j] = $hasil;
            
            echo ($hasil == 999)?"∞":$hasil;
            echo " | ";
        }
        echo "<br>";
    }
    $matrix_before = $hasil_matrix[$k];
}


