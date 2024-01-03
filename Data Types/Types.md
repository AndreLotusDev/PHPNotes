# Integers

```php
<?php
$positiveNumber = 5;
$negativeNumber = -3; 
?>
```

###### Verifying that a code is integer

```php
<?php
$var = 5;

if (is_int($var)) {
    echo "$var is an integer";
} else {
    echo "$var is not an integer";
}
?>
```

---

# Floats

```php
<?php
$floatVar = 3.14; 
?>
```

```php
<?php
$var = 3.14;

if (is_float($var)) {
    echo "$var is a float";
} else {
    echo "$var is not a float";
}
?>
```

---

# Strings

```php
<?php
 $idade = 35;
 
 echo "Ele tem $idade anos";
?>
```

```php
<?php
$var = "Ola mundo";

if (is_string($var)) {
    echo "$var is a string";
} else {
    echo "$var is not a string";
}
?>
```

---

# Boolean

```php
<?php
$isAdult = true;

if ($isAdult) {
    echo "You are allowed to vote.";
} else {
    echo "You are not allowed to vote.";
}
?>
```

```php
<?php
$var = true;

if (is_boolean($var)) {
    echo "$var is a boolean";
} else {
    echo "$var is not a boolean";
}
?>
```

---

# Array

```php
<?php
$fruits = array("Apple", "Banana", "Cherry");  

foreach ($fruits as $fruit) {
    echo $fruit . "\n";
}
?>
```
```php
<?php
$fruits = array("Apple", "Banana", "Cherry");  

print_r($fruits);
?>
```

---

# Associative array

```php
<?php
$ages = array("John" => 35, "Mary" => 27, "James" => 43);  

foreach ($ages as $name => $age) {
    echo "$name is $age years old.\n";
}
?>
```

---

# Class (Object)

```php
<?php
class Person {
    public $age;
    public $job;
    public $salary;

    public function __construct($age, $job, $salary) {
        $this->age = $age;
        $this->job = $job;
        $this->salary = $salary;
    }

    public function display() {
        echo "Age: " . $this->age . "\n";
        echo "Job: " . $this->job . "\n";
        echo "Salary: " . $this->salary . "\n";
    }
}

$person = new Person(35, "Engineer", 70000);
$person->display();
?>
```

---

# Null

```php
<?php
$var = null;  

if (is_null($var)) {
    echo "The variable is null";
} else {
    echo "The variable is not null";
}
?>
```

---