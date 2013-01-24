let primes = 2 : filter isPrime [3,5..]; isPrime x = all (/= 0) . map (mod x) . takeWhile (\n -> n*n <= x) $ primes in primes

nubBy(((>1).).gcd)[2..]


let prime x = (all (>0) (map (snd . (divMod x)) [2..x-1])) in length . filter id $ (map prime [2..1000])
