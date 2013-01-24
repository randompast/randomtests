
num1=0
num2=1
num3=0
sumE=0

while num3 <4000000:
   if num3%2==0 : sumE+=num3
   num3=num1+num2
   num1=num2
   num2=num3

print sumE
