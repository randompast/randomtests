
<script type="text/javascript">
var str = ''; 
var n;
for(var count =1; count<=100; count++)
{
  n = count;
  if (n%3 ==0)
    if (n%5 ==0)
  		str += 'Fizz';
    else
  		str += 'Buzz<br/>';
  if (n%5 ==0)
		str += 'Buzz<br/>';
  if (n%3 != 0 && n%5 !=0)
    str += n+"<br/>";
}
document.write(str);
</script>
