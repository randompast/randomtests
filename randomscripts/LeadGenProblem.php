<?php
//Lead Simluator
$P1=30; //# of leads
$P2=270;
$P3=100;
$Plist=array(0,$P1,$P2,$P3);

$avg=10; //average/day
$dev=4; //deviation/day
$cyc=42;  //Cycle length (30days? 7days?)

function update($Plist2)
{
  $total = array_sum($Plist2);
  $r = rand(1,$total);
  $Tlist[0]=0;

  for($i=1; $i<count($Plist2); $i++)
    {
      $Tlist[$i] = $Plist2[$i] + $Plist2[$i-1];
    }

  for ($i=1; $i<count($Plist2); $i++)
    {
      if ($r <= $Tlist[$i] && $r > $Tlist[$i-1])
        {
           $Plist2[$i]--;
           // Send_Lead_to_Client()
        }
    }

  if($total == array_sum($Plist2))
    {
      $catch = rand(1,count($Plist2)-1);
      $Plist2[$catch]--;
      // Send_Lead_to_Client()
    }

//  echo $r." ".array_sum($Plist2);  //See Random selected and total

  return $Plist2;
}  //Remove one lead from the client.



function domonth($Plist1, $cyc, $avg, $dev)
{
  for($d=1; $d<=$cyc; $d++)  //day 1-30, or day 1-cycleLength
  {
    echo "************* Day ".$d." ************<br/>";
    $day = $avg + rand(0,$dev);
      echo $day." leads today <br/>";
    for($i=1; $i<=$day; $i++) //For each lead this day
      {  //Update for the day   
         $Plist1=update($Plist1);
            //Print out leads left at each step
         for($p=1; $p<count($Plist1); $p++)
           { 
              echo $Plist1[$p]."&#09;"; 
           }
         echo "<br />"; 
      }
   }
  return $Plist;
}

$Plist = domonth($Plist, $cyc, $avg, $dev);

?>
