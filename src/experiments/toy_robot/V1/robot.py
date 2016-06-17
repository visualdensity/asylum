class Robot:

    prop       = None
    state      = {}
    boundary   = {}
    directions = []

    def __init__(self):
        self.directions = [
            'NORTH', 
            'SOUTH', 
            'EAST', 
            'WEST'
        ]
        self.state['placed']    = False
        self.state['direction'] = 'NORTH'
        self.state['coord_x']   = 0
        self.state['coord_y']   = 0

    def place(self,x,y,direction,prop):
        self.setDirection(direction)
        self.__setProp(prop)
        self.__setPlaced()
        self.__setX(x)
        self.__setY(y)

    def isPlaced(self):
        return self.state['placed']

    def turn(self, direction):
        self.setDirection(direction)

    def setDirection(self, direction):
        direction_str = direction.upper()
        if direction_str in self.directions:
            self.state['direction'] = direction_str

    def getDirection(self):
        return self.state['direction']

    def move(self):
        if self.isPlaced():
            curr_direction = self.state['direction'].title()
            getattr(self, "move%s" % curr_direction)()
        else:
            raise Exception('You need to place me first!')

    def moveNorth(self):
        self.__setY( self.__getY() + 1 )

    def moveSouth(self):
        self.__setY( self.__getY() - 1 )

    def moveEast(self):
        self.__setX( self.__getX() + 1 )

    def moveWest(self):
        self.__setX( self.__getX() - 1 )

    def report(self):
        return self.state



    ''' Helpers '''

    def __setProp(self,prop):
        self.prop = prop
        self.boundary = self.prop.getDimension()

    def __setX(self, x):
        if self.prop.onTable(x, self.state['coord_y']):
            self.state['coord_x'] = x

    def __setY(self, y):
        if self.prop.onTable(self.state['coord_x'], y):
            self.state['coord_y'] = y

    def __getX(self):
        return self.state['coord_x']

    def __getY(self):
        return self.state['coord_y']

    def __setPlaced(self):
        self.state['placed'] = True


