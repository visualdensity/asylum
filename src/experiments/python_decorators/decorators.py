#!/usr/bin/python

# Decorator demo

# Bolding decorator - gets a function as input
def boldify(func):
    # Bold adds <strong> tags to the RETURNed value of func()
    def boldit( inputString ):
        return "<strong>{0}</strong>".format(func(inputString))
    return boldit

# "Manual" decorating
def getGreeting(name):
    return "Hello there, {0}. How's you?".format(name)

myBoldGreeting = boldify(getGreeting)
print myBoldGreeting("Wee Keat")


# Using syntactic sugar
@boldify
def getCountry(country):
    return "We are from {0}. You?".format(country)

print getCountry("Australia")
