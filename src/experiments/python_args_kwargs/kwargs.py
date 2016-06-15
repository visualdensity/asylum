#!/usr/bin/python

# **kwargs are the same as *args, but it supports dictionary
# or keyworded arguments
def variable_kwargs(**kwargs):
    if kwargs is not None:
        for key,value in kwargs.iteritems():
            print "%s: %s" % (key,value)


# Test it out
variable_kwargs(name="Wicked", food="lechon")

dict_args = {
    'name' : 'Wicked',
    'food' : 'burgah'
}
variable_kwargs(**dict_args)
