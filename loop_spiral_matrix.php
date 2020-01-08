<?php
/**
 * 789
 * 612
 * 543
 * 
 */

$ukuran_matrix = $_GET['ukuran_matrix']?:5;
$matrix = [];
for ($i=0; $i < $ukuran_matrix; $i++) { 
    $matrix[$i] = [];
    for ($j=0; $j < $ukuran_matrix; $j++) { 
        $matrix[$i][$j] = 0;
    }
}

// $matrix[$x][$y] = 10;
// $matrix[$x][$y];

// function spiral_loop($matrix){
    $baris = count($matrix);
    $kolom = count($matrix);
    $angka = $baris * $kolom;
    
    $last_action = 0;
    $action = ['bawah', 'kanan', 'atas', 'kiri'];
    // $action = ['kanan', 'bawah', 'kiri', 'atas'];
    $co_x = 0;
    $co_y = 0;
    // $angka = 1;
    while($angka > 0){
        

        $matrix[$co_x][$co_y] = $angka;
        echo "x : $co_x, y : $co_y = $angka <br>";
        
        if($action[$last_action] == "bawah"){
            //LOOP bawah
            // $co_x = ($co_x == $kolom-1)?0:$co_x+1;
            if(!isset($matrix[$co_x+1][$co_y]) || $matrix[$co_x+1][$co_y] != 0){
                $last_action = ($last_action == 3)?0:$last_action+1;
                echo "change action to $last_action <br>";
            }else{
                $co_x = ($co_x == $kolom-1)?0:$co_x+1;
            }
        }
        
        if($action[$last_action] == "kanan"){
            //LOOP kanan
            // $co_y = ($co_y == $baris-1)?0:$co_y+1;
            
            if(!isset($matrix[$co_x][$co_y+1]) || $matrix[$co_x][$co_y+1] != 0){
                $last_action = ($last_action == 3)?0:$last_action+1;
                echo "change action to $last_action <br>";
            }else{
                $co_y = ($co_y == $baris-1)?0:$co_y+1;
            }
        }
        
        if($action[$last_action] == "atas"){
            //LOOP atas
            // $co_x = ($co_x == 0)?$kolom-1:$co_x-1;
            
            if(!isset($matrix[$co_x-1][$co_y]) || $matrix[$co_x-1][$co_y] != 0){
                $last_action = ($last_action == 3)?0:$last_action+1;
                echo "change action to $last_action <br>";
            }else{
                $co_x = ($co_x == 0)?$kolom-1:$co_x-1;
            }
        }
        
        if($action[$last_action] == "kiri"){
            //LOOP kiri
            // $co_y = ($co_y == 0)?$baris-1:$co_y-1;
            
            if(!isset($matrix[$co_x][$co_y-1]) || $matrix[$co_x][$co_y-1] != 0){
                $last_action = ($last_action == 3)?0:$last_action+1;
                echo "change action to $last_action <br>";
            }else{
                $co_y = ($co_y == 0)?$baris-1:$co_y-1;  
            }
        }
        
       
        $angka--;
    }
    echo "<table border=1>";
    for ($i=0; $i < $baris; $i++) { 
        echo "<tr>";
        for ($j=0; $j < $kolom; $j++) { 
            echo "<td>";
            echo " ".$matrix[$i][$j]." ";
            echo "</td>";
        }
        echo " </tr>";
    }
    echo "</table>";

// }

// spiral_loop($matrix);