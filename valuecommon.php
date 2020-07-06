<html>
<head>
<title>Common Value</title>
</head>
<body>

<?php
    $firstrow = array("one"=>"orange","two"=>"apple","three"=>"grape","four"=>"banana");
    $secondrow = array("cherries","orange","banana");
    $common = array_intersect($firstrow, $secondrow);
	echo "Common Fruits Name : "; 
    print_r($common);
	
?>
</body>
</html>