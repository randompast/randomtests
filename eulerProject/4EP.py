d=2
n1=pow(10,d)-1
n2=pow(10,d)
nmax=pow(10,d+1)-1
test1=0
high=0

while n1<=nmax and n2<nmax :
   if n1==nmax :
      n1=n2
      n2+=1
   if n1<nmax :
      n1+=1
   test1=n1*n2
   test2 = str(test1)[::-1]
   test2 = int(test2)
#   print test1
   if test2 == test1 and test1 > high : 
       print test1, test2,n1,n2
       high=test1
