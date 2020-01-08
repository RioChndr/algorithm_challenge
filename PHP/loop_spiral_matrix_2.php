<?php
$ukuran_matrix = @$_GET['ukuran_matrix']?:5;
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

$pointer =[
    'x' => $baris-1,
    'y' => 0,
    'max_x' => $baris-1,
    'max_y' => $kolom-1
];

function move_right(&$pointer){
    $pointer['x'] = $pointer['x'];
    $pointer['y'] = ($pointer['y'] == $pointer['max_y'])?0:$pointer['y']+1;
    
}
function move_left(&$pointer){
    $pointer['x'] = $pointer['x'];
    $pointer['y'] = ($pointer['y'] == 0)?$pointer['max_y']:$pointer['y']-1;
}
function move_up(&$pointer){
    $pointer['x'] = ($pointer['x'] == 0)?$pointer['max_x']:$pointer['x']-1;
    $pointer['y'] = $pointer['y'];
}
function move_down(&$pointer){
    $pointer['x'] = ($pointer['x'] == $pointer['max_x'])?0:$pointer['x']+1;
    $pointer['y'] = $pointer['y'];
}
$action = [
    // 'act' => ['right', 'down', 'left', 'up'],
    'act' => ['up', 'right', 'down', 'left'],
    'last' => 0
];
// 25 = 7, 1-9
// 9, 18, 27, 36,
// 18 - 16 = 2
// 9 - 2 = 7;

$angka_baru = $angka % 9;
if($angka_baru == 0) $angka_baru = 9;

while($angka > 0){
    // echo "x : ".$pointer['x'].", y : ".$pointer['y']." = $angka <br>";
    $matrix[$pointer['x']][$pointer['y']] = $angka_baru;
    
    //check if next step is available to fill
    $before_pointer = $pointer;
    $func_move_test = "move_".$action['act'][$action['last']];
    $func_move_test($pointer);
    if(!isset($matrix[$pointer['x']][$pointer['y']]) || $matrix[$pointer['x']][$pointer['y']] != 0){
        $pointer = $before_pointer;
        $action['last'] = ($action['last'] == count($action['act'])-1)?0:$action['last']+1;
        $func_move = "move_".$action['act'][$action['last']];
        $func_move($pointer);
        // echo "next step is ".$action['act'][$action['last']]."<br>";
    }
    $angka_baru = ($angka_baru == 1)?9:$angka_baru-1;
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