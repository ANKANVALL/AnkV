<?php 
function finddata($arr,$find){
if(!is_array($arr)){
    return "No array";
};
$rev = array_reverse($arr, false);
for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] == $find) {
        $meta = 'Encontrado por normal ';
    } elseif ($rev[$i] == $find) {
        $meta = 'Encontrado de reversa';
    } else {
        continue;
    }
    echo $meta;
    break; // para no seguir buscando innecesariamente
}
return null;
}


function reversearr($arr){
    $reversearray =[];
    for($i = 0; $i<(count($arr)); $i++){
        $reverseP = count($arr) - 1 - $i;
        $tempVal = $arr[$reverseP];
        $reversearray[] = $tempVal;
    }
    return $reversearray;
}



$start = microtime(true);

$ar = ['Pizza','Hamburguesa','ensalada'];

$arre = range(0,100);
$data = reversearr($ar);
var_dump($data);
/*$finder = 700;
//$data =  finddata($arre,$
finder);
$time_elapsed_secs = microtime(true) -$start;
echo "        tiempo de espera ".$time_elapsed_secs. "  ____  " .$data;*/
