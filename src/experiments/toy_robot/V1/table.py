class Table:

    dimension = {}

    def __init__(self):
        self.dimension['min_x'] = 0
        self.dimension['min_y'] = 0
        self.dimension['max_x'] = 5
        self.dimension['max_y'] = 5

    def getDimension(self):
        return self.dimension

    def onTable(self,x,y):
        if x > self.dimension['max_x'] or y > self.dimension['max_y'] or x < self.dimension['min_x'] or y < self.dimension['min_y']:
            return False
        else:
            return True

