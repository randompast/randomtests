<html>

<?php

function roll($n)
{
 $sum = 0;
 $min = 6;

 for($i=0; $i<$n; $i++)
 {
   $r = rand(1,6);

   if ($min > $r)
     $min = $r;
   echo $r.", ";
   $sum += $r;
 }

// echo "min=".$min."*";
 	$sum -= $min;
	return ($sum - 4);
}

function sev($n)
{
  $sum = 0;
	$t = 0;
  $min = 20;
  for($i=0; $i<$n; $i++)
  {
     $t = roll(5);
     echo "= ".$t. "<br/>";
     $sum += $t;
  }

     echo "Total  = ".$sum.", Avg =".($sum/7)."<br/>";
//  return ($sum-$min)/($n);
}

function avg($n)
{
  $sum = 0;
  for($i=0; $i<$n; $i++)
  {  
    $sum += roll(5);
  }

  echo $sum/$n . "<br />";
}

echo sev(7);

echo "avg is ~= 83 total or 11.85 per stat";

?>


</html>
