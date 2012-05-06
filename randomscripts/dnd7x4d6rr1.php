<html>

<?php

function roll($n)
{
 $sum = 0;
 $min = 6;

 for($i=0; $i<$n; $i++)
 {
   $r = 1;
   while($r == 1)
     {$r = rand(1,6);} 
//   echo $r."^";

   if ($min > $r)
     $min = $r;
   
   $sum += $r;
 }

// echo "min=".$min."*";
 return $sum -= $min;
}

function sev($n)
{
  $sum = 0;
  $min = 20;
  for($i=0; $i<$n; $i++)
  {
     $t = roll(4);
     if ($min > $t)
       $min = $t;
     $sum += $t;
  }
  return ($sum-$min)/($n-1);
}

function avg($n)
{
  $sum = 0;
  for($i=0; $i<$n; $i++)
  {  
    $sum += sev(7);
  }

  echo $sum/$n . "<br />";
}

avg(1000);

?>


</html>