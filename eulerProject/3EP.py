
i=2
n=600851475143
while i <= n:
   if n%i == 0 : 
      n=n/i
      print i
   if n%i != 0 : i+=1
