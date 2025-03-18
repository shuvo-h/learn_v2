<?php

// Abstract class cannot be instantiated directly
abstract class Animal {
    // Constant value shared among all instances
    const KINGDOM = 'Animalia';

    // Property of the class
    public $name;

    // Constructor to initialize the name of the animal
    public function __construct($name) {
        $this->name = $name;
    }

    // Abstract method that must be implemented by derived classes
    abstract public function sound();

    // Getter method for the name
    public function getName() {
        return $this->name;
    }
}

// Dog class inherits from Animal and implements sound
class Dog extends Animal {
    // Constant specific to Dog class
    const BREED = 'Labrador';

    // Implementation of abstract sound method
    public function sound() {
        return "Woof!";
    }

    // Static method can be called without an instance
    public static function info() {
        return "This is a Dog class.";
    }
}

// Cat class inherits from Animal and implements sound
class Cat extends Animal {
    public function sound() {
        return "Meow!";
    }

    public static function info() {
        return "This is a Cat class.";
    }
}

// Flyable interface defines a contract for classes that can fly
interface Flyable {
    public function fly();
}

// Bird class inherits Animal and implements Flyable interface
class Bird extends Animal implements Flyable {
    public function sound() {
        return "Chirp!";
    }

    // Implementation of fly method from Flyable interface
    public function fly() {
        return "Flying high!";
    }

    public static function info() {
        return "This is a Bird class.";
    }
}

// Fish class inherits from Animal and implements sound
class Fish extends Animal {
    public function sound() {
        return "Blub!";
    }

    public static function info() {
        return "This is a Fish class.";
    }
}

// Car class with constants and static properties/methods
class Car {
    const WHEELS = 4; // Constant specific to all cars
    public static $engineType = 'V8'; // Static property shared by all cars
    public $color; // Instance property

    // Constructor to initialize color of the car
    public function __construct($color) {
        $this->color = $color;
    }

    // Method to show car details
    public function showDetails() {
        return "Car color is $this->color, and engine type is " . self::$engineType . ".";
    }

    // Static method that does not need an object instance to be called
    public static function carInfo() {
        return "A car usually has " . self::WHEELS . " wheels.";
    }
}

// Create instances of each class
$dog = new Dog("Buddy");
$cat = new Cat("Whiskers");
$bird = new Bird("Tweety");
$fish = new Fish("Goldie");
$car = new Car("Red");

// Output information from each class
echo $dog->getName() . " says " . $dog->sound() . "\n";
echo $cat->getName() . " says " . $cat->sound() . "\n";
echo $bird->getName() . " says " . $bird->sound() . " and can " . $bird->fly() . "\n";
echo $fish->getName() . " says " . $fish->sound() . "\n";
echo $car->showDetails() . "\n";

// Call static methods without creating an instance
echo Dog::info() . "\n";
echo Cat::info() . "\n";
echo Bird::info() . "\n";
echo Fish::info() . "\n";
echo Car::carInfo() . "\n";
?>
