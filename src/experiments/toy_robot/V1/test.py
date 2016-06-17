import unittest
from table import Table
from robot import Robot

class TestTable(unittest.TestCase):

    table = {}

    def setUp(self):
        self.table = Table()

    def test_on_table(self):
        self.assertTrue(self.table.onTable(2,2))
        self.assertTrue(self.table.onTable(0,0))
        self.assertTrue(self.table.onTable(5,5))
        self.assertTrue(self.table.onTable(0,5))
        self.assertTrue(self.table.onTable(5,0))

    def test_off_table(self):
        self.assertFalse(self.table.onTable(7,2))
        self.assertFalse(self.table.onTable(2,9))
        self.assertFalse(self.table.onTable(6,6))
        self.assertFalse(self.table.onTable(-1,2))
        self.assertFalse(self.table.onTable(2,-6))


class TestRobot(unittest.TestCase):
    robot = {}
    table = {}

    def setUp(self):
        self.table = Table()
        self.robot = Robot()

    def test_default_report(self):
        defaultState = self.robot.report()
        self.assertFalse(defaultState['placed'])
        try:
            self.robot.move()
        except Exception as e:
            self.assertRaises(Exception,e)

    def test_placing_robot(self):
        self.robot.place(3,5,'east',self.table)
        placedState = self.robot.report()

        self.assertTrue(placedState['placed'])
        self.assertEquals(3,placedState['coord_x'])
        self.assertEquals(5,placedState['coord_y'])
        self.assertEquals('EAST',placedState['direction'])

    def test_moving_robot(self):
        self.robot.place(1,1,'east',self.table)
        placedState = self.robot.report()

        self.assertTrue(placedState['placed'])
        self.assertEquals(1,placedState['coord_x'])
        self.assertEquals(1,placedState['coord_y'])
        self.assertEquals('EAST', placedState['direction'])

        self.robot.move()
        movedState = self.robot.report()
        
        self.assertTrue(movedState['placed'])
        self.assertEquals(2,movedState['coord_x'])
        self.assertEquals(1,movedState['coord_y'])
        self.assertEquals('EAST',movedState['direction'])

    def test_robot_boundary(self):
        self.robot.place(0,0,'south',self.table)
        placedState = self.robot.report()

        self.assertTrue(placedState['placed'])
        self.assertEquals(0,placedState['coord_x'])
        self.assertEquals(0,placedState['coord_y'])
        self.assertEquals('SOUTH', placedState['direction'])

        self.robot.move()
        self.robot.move() # deliberate
        movedState = self.robot.report()
        
        self.assertTrue(movedState['placed'])
        self.assertEquals(0,movedState['coord_x'])
        self.assertEquals(0,movedState['coord_y'])
        self.assertEquals('SOUTH', placedState['direction'])


    def test_robot_turn_move(self):
        self.robot.place(1,1,'south',self.table)
        placedState = self.robot.report()

        self.assertTrue(placedState['placed'])
        self.assertEquals(1,placedState['coord_x'])
        self.assertEquals(1,placedState['coord_y'])
        self.assertEquals('SOUTH', placedState['direction'])

        self.robot.move()
        self.robot.move() # deliberate
        movedState = self.robot.report()
        
        self.assertTrue(movedState['placed'])
        self.assertEquals(1, movedState['coord_x'])
        self.assertEquals(0, movedState['coord_y'])
        self.assertEquals('SOUTH', movedState['direction'])

        self.robot.turn('east')
        turnedState = self.robot.report()
        
        self.assertTrue(turnedState['placed'])
        self.assertEquals(1,turnedState['coord_x'])
        self.assertEquals(0,turnedState['coord_y'])
        self.assertEquals('EAST', turnedState['direction'])

        self.robot.move() # deliberate
        turnMovedState = self.robot.report()
        
        self.assertTrue(turnMovedState['placed'])
        self.assertEquals(2,turnMovedState['coord_x'])
        self.assertEquals(0,turnMovedState['coord_y'])
        self.assertEquals('EAST', placedState['direction'])


if __name__ == '__main__':
    unittest.main()
