#!/usr/bin/python

#*args are just variable number of arbitrary arguments
def variable_args(*args):
    for a in args:
        print a

# Test it out
variable_args('this', 'is', 'a', 'variable', 'args')
