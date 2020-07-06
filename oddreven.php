<html>
<body>
<?php 
 $arr = array(7, 9, 4, 3, 8, 6, 1); 
    $n = sizeof($arr); 
    arrayEvenAndOdd($arr, $n); 
	
function arrayEvenAndOdd($arr, $n) 
{ 
    $i = -1; 
    $j = 0; 
    $t; 
    while ($j != $n) 
    { 
        if ($arr[$j] % 2 == 0) 
        { 
            $i++;      
            $x = $arr[$i]; 
            $arr[$i] = $arr[$j]; 
            $arr[$j] = $x; 
        } 
        $j++; 
    } 
    for ($i = 0; $i < $n; $i++) 
        echo $arr[$i] . " , "; 
} 
  
  
  ?>

</body>
</html>