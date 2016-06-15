#!/usr/bin/python

# If you need to use ALL standard args, variable args as well as kwargs,
# you need to use them in the following order:
#   - stdArgs, *args, **kwargs

def mixed_args(firstInput=False, secondInput=False, *args, **kwargs):

    print "\nStandard arg:"
    if firstInput:
        print ' - %s ' % firstInput
    if secondInput:
        print ' - %s ' % secondInput

    print "\nVariable args:"
    for a in args:
        print ' - %s' % a

    print "\nVariable kwargs:"
    for key,value in kwargs.iteritems():
        print ' - %s: %s' % (key,value)


# Test it out
mixed_args('First', 'Second', 'my', 'variable', 'args', name='Wicked', favourite='food')
