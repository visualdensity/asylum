#!/usr/bin/python

def book_cost():
    return 8.20

def service_cost():
    return 10.95

def calculate_price( func ):
    return func() * 1.15


book    = book_cost
service = service_cost

print "$%.2f" % calculate_price( book )
print "$%.2f" % calculate_price( service )
