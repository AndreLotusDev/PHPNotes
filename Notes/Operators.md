# Operators

#### The order matters

```php
<?php
$result1 = 5 + 3 * 2;
$result2 = (5 + 3) * 2;

echo "Result1: $result1\n";  // Outputs: Result1: 11
echo "Result2: $result2\n";  // Outputs: Result2: 16
?>
```

--- 

# Change of variable type

```php
<?php
$intVar = 5;  
$strVar = "10";  


$result = $intVar + $strVar;

echo "Result: $result\n";  // Outputs: Result: 15
?>
```

--- 

# Wiki

```php
<?php

// Arithmetic Operators
$addition = 5 + 3;       // Addition
$subtraction = 5 - 3;    // Subtraction
$multiplication = 5 * 3; // Multiplication
$division = 15 / 3;      // Division
$modulus = 5 % 2;        // Modulus (remainder of division)

echo "Addition: $addition\n";
echo "Subtraction: $subtraction\n";
echo "Multiplication: $multiplication\n";
echo "Division: $division\n";
echo "Modulus: $modulus\n";

// Assignment Operators
$a = 5;
$a += 2; // Equivalent to $a = $a + 2
echo "Assignment (+=): $a\n";

// Comparison Operators
$x = 5;
$y = 10;
$isEqual = ($x == $y);       // Equal
$isIdentical = ($x === $y);  // Identical (equal and same type)
$isLessThan = ($x < $y);     // Less than
$isGreaterThan = ($x > $y);  // Greater than

echo "Equal: " . ($isEqual ? 'true' : 'false') . "\n";
echo "Identical: " . ($isIdentical ? 'true' : 'false') . "\n";
echo "Less than: " . ($isLessThan ? 'true' : 'false') . "\n";
echo "Greater than: " . ($isGreaterThan ? 'true' : 'false') . "\n";

// Logical Operators
$bool1 = true;
$bool2 = false;
$and = $bool1 && $bool2; // Logical AND
$or = $bool1 || $bool2;  // Logical OR
$not = !$bool1;          // Logical NOT

echo "Logical AND: " . ($and ? 'true' : 'false') . "\n";
echo "Logical OR: " . ($or ? 'true' : 'false') . "\n";
echo "Logical NOT: " . ($not ? 'true' : 'false') . "\n";

?>
```