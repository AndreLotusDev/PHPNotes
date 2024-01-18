# Class 

```php
class Car {
    private $make;
    private $model;

    public function __construct($make, $model) {
        $this->make = $make;
        $this->model = $model;
    }

    public function getMake() {
        return $this->make;
    }

    public function setMake($make) {
        $this->make = $make;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }
}
```

---

# Instance 

```php
<?php
$myCar = new Car("Toyota", "Corolla");
?>
```

---

# Constant in class

```php
class Car {
    const WHEELS = 4;

    private $make;
    private $model;

    public function __construct($make, $model) {
        $this->make = $make;
        $this->model = $model;
    }

    public function getWheels() {
        // Accessing the constant inside the class
        return self::WHEELS;
    }

    // Other methods...
}

// Creating an instance of the class
$myCar = new Car("Toyota", "Corolla");

// Accessing the constant outside the class
echo Car::WHEELS;

// Accessing the constant through a method
echo $myCar->getWheels();
```

---

# Extends

```php
class Vehicle {
    public $wheels;

    public function __construct($wheels) {
        $this->wheels = $wheels;
    }

    public function getWheels() {
        return $this->wheels;
    }
}

class Car extends Vehicle {
    private $make;
    private $model;

    public function __construct($make, $model) {
        parent::__construct(4); // Call the parent class's constructor
        $this->make = $make;
        $this->model = $model;
    }

    // Other methods...
}

$myCar = new Car("Toyota", "Corolla");
echo $myCar->getWheels(); // Outputs: 4
```

---

# InstanceOf

```php
class Vehicle {
    // ...
}

class Car extends Vehicle {
    // ...
}

$myCar = new Car();

if ($myCar instanceof Car) {
    echo 'myCar is an instance of Car';
}

if ($myCar instanceof Vehicle) {
    echo 'myCar is also an instance of Vehicle';
}
```

---

# Interface 

```php
interface Drivable {
    public function startEngine();
    public function stopEngine();
    public function drive();
}

class Car implements Drivable {
    public function startEngine() {
        echo "Engine started\n";
    }

    public function stopEngine() {
        echo "Engine stopped\n";
    }

    public function drive() {
        echo "Car is driving\n";
    }
}

$myCar = new Car();
$myCar->startEngine();
$myCar->drive();
$myCar->stopEngine();
```

---

# Traits

```php
trait Engine {
    public function startEngine() {
        echo "Engine started\n";
    }

    public function stopEngine() {
        echo "Engine stopped\n";
    }
}

class Car {
    use Engine;

    public function drive() {
        echo "Car is driving\n";
    }
}

$myCar = new Car();
$myCar->startEngine();
$myCar->drive();
$myCar->stopEngine();
```

# Override traits function

```php
trait Engine {
    public function startEngine() {
        echo "Engine started from trait\n";
    }
}

class Car {
    use Engine;

    // Overriding startEngine method from Engine trait
    public function startEngine() {
        echo "Engine started from Car class\n";
    }

    public function drive() {
        echo "Car is driving\n";
    }
}

$myCar = new Car();
$myCar->startEngine(); // Outputs: "Engine started from Car class"
```

---

# Abstract class and method

```php
abstract class Vehicle {
    protected $wheels;

    public function getWheels() {
        return $this->wheels;
    }

    // Abstract method
    abstract public function startEngine();
}

class Car extends Vehicle {
    public function __construct() {
        $this->wheels = 4;
    }

    // Implementing the abstract method
    public function startEngine() {
        echo "Engine started\n";
    }
}

$myCar = new Car();
echo $myCar->getWheels(); // Outputs: 4
$myCar->startEngine(); // Outputs: "Engine started"
```

---

# Anonymous class 

```php
$myCar = new class {
    public $make;
    public $model;

    public function __construct($make, $model) {
        $this->make = $make;
        $this->model = $model;
    }

    public function getMakeAndModel() {
        return $this->make . ' ' . $this->model;
    }
}("Toyota", "Corolla");

echo $myCar->getMakeAndModel(); // Outputs: "Toyota Corolla"
```

---

# class_exists()

```php
class Car {
    // ...
}

if (class_exists('Car')) {
    echo "Class 'Car' exists";
} else {
    echo "Class 'Car' does not exist";
}

if (class_exists('Bike')) {
    echo "Class 'Bike' exists";
} else {
    echo "Class 'Bike' does not exist";
}
```

---

# get_class_methods()

```php
class Car {
    public function startEngine() {
        // ...
    }

    public function drive() {
        // ...
    }

    private function refuel() {
        // ...
    }
}

$methods = get_class_methods('Car');
print_r($methods);
```

Produces:
```
Array
(
    [0] => startEngine
    [1] => drive
)
```

---

# get_class_vars()

```php
class Car {
    public $make = "Toyota";
    public $model = "Corolla";
    private $color = "Red";
}

$properties = get_class_vars('Car');
print_r($properties);
```

Produces:
```
Array
(
    [make] => Toyota
    [model] => Corolla
)
```

---