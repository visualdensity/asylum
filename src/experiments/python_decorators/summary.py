#! /usr/bin/python

def validate_summary(func):
    def wrapper(*args, **kwargs):
        data = func(*args, **kwargs)
        if len(data["summary"]) > 50:
            raise ValueError("Summary too long idiot!")
        return data
    return wrapper

@validate_summary
def fetch_data():
    return {
        'summary': "This is a pretty damn long line that stretches quite far and beyond anyone has ever been. Please have a look"
    }



# Running it
try:
    fetch_data()
except ValueError, e:
    print str(e)
