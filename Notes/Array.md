# Array

### This add an "PHP Developer" to the end of the array

```php
$array = array("John", "Doe");
$array[] = "PHP Developer";

print_r($array); 
```

---

# Quick Array Creation 

```php
$array = range(1, 100);

print_r($array);  // Outputs: Array ( [0] => 1 [1] => 2 ... [99] => 100 )
```

---

# Count Elements in an Array 

```php
$array = array("John", "Doe", "PHP Developer");
$length = count($array);

echo $length;  // Outputs: 3
```

---

# Multidimensional Array 

```php
$array = array(
    "John" => array("Age" => 30, "Role" => "Developer"),
    "Doe" => array("Age" => 25, "Role" => "Designer")
);

$array["Jane"] = array("Age" => 28, "Role" => "Manager");

print_r($array); 
```

---

# Array Destructuring 

```php
$array = array("John", "Doe", "PHP Developer");

// Using list
list($firstName, $lastName, $role) = $array;
echo $firstName;  // Outputs: John
echo $lastName;   // Outputs: Doe
echo $role;       // Outputs: PHP Developer

// Using []
[$firstName, $lastName, $role] = $array;
echo $firstName;  // Outputs: John
echo $lastName;   // Outputs: Doe
echo $role;       // Outputs: PHP Developer
```

---

# array_slice

```php
$array = array("John", "Doe", "PHP Developer", "Manager", "Designer");
$slice = array_slice($array, 2, 3);

print_r($slice);  // Outputs: Array ( [0] => PHP Developer [1] => Manager [2] => Designer )
```

---

# array_chunk

```php
$array = array("John", "Doe", "PHP Developer", "Manager", "Designer");
$chunks = array_chunk($array, 2);

print_r($chunks);  
```

Produces: 
```
Array
(
    [0] => Array
        (
            [0] => John
            [1] => Doe
        )

    [1] => Array
        (
            [0] => PHP Developer
            [1] => Manager
        )

    [2] => Array
        (
            [0] => Designer
        )
)
```

---

# array_keys and array_values

```php
$array = array("firstName" => "John", "lastName" => "Doe", "role" => "PHP Developer");

$keys = array_keys($array);
$values = array_values($array);

print_r($keys);    // Outputs: Array ( [0] => firstName [1] => lastName [2] => role )
print_r($values);  // Outputs: Array ( [0] => John [1] => Doe [2] => PHP Developer )
```

---

# array_key_exists 

```php
$array = array("firstName" => "John", "lastName" => "Doe", "role" => "PHP Developer");

if (array_key_exists("firstName", $array)) {
    echo "Key exists!";
} else {
    echo "Key does not exist!";
}
```

---

# array_splice

```php
$array = array("John", "Doe", "PHP Developer", "Manager", "Designer");
array_splice($array, 2, 2, array("CEO", "CTO"));

print_r($array);  
```

Produces:
```
Array
(
    [0] => John
    [1] => Doe
    [2] => CEO
    [3] => CTO
    [4] => Designer
)
```

---

# extract

```php
$array = array("firstName" => "John", "lastName" => "Doe", "role" => "PHP Developer");
extract($array);

echo $firstName;  // Outputs: John
echo $lastName;   // Outputs: Doe
echo $role;       // Outputs: PHP Developer
```

---

# compact 

```php
$firstName = "John";
$lastName = "Doe";
$role = "PHP Developer";

$array = compact("firstName", "lastName", "role");

print_r($array);  
```

Produces
```
Array
(
    [firstName] => John
    [lastName] => Doe
    [role] => PHP Developer
)
```

---

# foreach with keys and values 

```php
$array = array("firstName" => "John", "lastName" => "Doe", "role" => "PHP Developer");

foreach ($array as $key => $value) {
    echo "Key: " . $key . ", Value: " . $value . "\n";
}
```

---

# array_reduce

```php
$array = array(1, 2, 3, 4, 5);

$result = array_reduce($array, function($carry, $item) {
    return $carry + $item;
}, 0);

echo $result;  // Outputs: 15
```

---

# in_array 

```php
$array = array("John", "Doe", "PHP Developer");

if (in_array("John", $array)) {
    echo "Found!";
} else {
    echo "Not Found!";
}
```

---

# sort and rsort

```php
$array = array(3, 2, 5, 1, 4);

sort($array);
print_r($array); 

rsort($array);
print_r($array);  
```

---

# arsort and ksort 

```php
$array = array("John" => 30, "Doe" => 25, "PHP Developer" => 35);

// Sort by value in descending order
arsort($array);
print_r($array);  

// Outputs: Array ( [PHP Developer] => 35 [John] => 30 [Doe] => 25 )

// Sort by key in ascending order
ksort($array);
print_r($array);  

// Outputs: Array ( [Doe] => 25 [John] => 30 [PHP Developer] => 35 )
```
---

# array_reverse 

```php
$array = array("John", "Doe", "PHP Developer");

$reversed = array_reverse($array);

print_r($reversed);  
```
Produces
```
Array
(
    [0] => PHP Developer
    [1] => Doe
    [2] => John
)
```
---

# shuffle 

```php
$array = array("John", "Doe", "PHP Developer");

shuffle($array);

print_r($array);  
```

Produces
```
Array
(
    [0] => Doe
    [1] => PHP Developer
    [2] => John
)
```

---

# array_sum in PHP

```php
$array = array(1, 2, 3, 4, 5);

$sum = array_sum($array);

echo $sum;  // = 15
```

---

# array_merge 

```php
$array1 = array("John", "Doe");
$array2 = array("PHP Developer", "Manager");

$merged = array_merge($array1, $array2);

print_r($merged);  
```

Produces
```
Array
(
    [0] => John
    [1] => Doe
    [2] => PHP Developer
    [3] => Manager
)
```

---

# array_diff

```php
$array1 = array("John", "Doe", "PHP Developer");
$array2 = array("John", "Manager");

$diff = array_diff($array1, $array2);

print_r($diff);  
```

Produces
```
Array
(
    [1] => Doe
    [2] => PHP Developer
)
```

---