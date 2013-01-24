let square x = x*x in (square (sum [1..100])) - sum (map square [1..100])
