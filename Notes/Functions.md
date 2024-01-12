# Functions PHP


```php
function greet($name) {
    return "Hello, " . $name;
}

echo greet("John Doe");
```

---

# Default parameter

```php
function greet($name = "Guest") {
    return "Hello, " . $name;
}

echo greet();  // Outputs: Hello, Guest
echo greet("John Doe");  // Outputs: Hello, John Doe
```

---