#!/usr/bin/python
import string

def main():


  decode = raw_input("encode(a)/decode(b): ")	

  if decode == "a":
    print "Let's ENcode an ASCII string."
    print ""

    mystr = raw_input("Enter your input: ")
    L = mystr.split()
    print L
    for c in L:
      print ord(c)

  if decode == "b":
    print "Let's DEcode an ASCII string."
    print ""

    mystr = raw_input("Enter your input: ")
    L = mystr.split()
    print L
    print ''.join(chr(int(i)) for i in L)

main()
