#!/usr/bin/python

def composed_function():
    def inner_function():
        return "Hello there!"

    return inner_function


greetme = composed_function()
print greetme()
