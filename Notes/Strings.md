# Strings
# Interpolation

```php
$name = "John Doe";
echo "Hello, $name";  
```

---

# String scape

```php
$quote = "He said, \"Hello, John Doe.\"";
echo $quote; 
```

- `\\` - Backslash
- `\'` - Single quote (only necessary in single-quoted strings)
- `\"` - Double quote (only necessary in double-quoted strings)
- `\n` - New line
- `\r` - Carriage return
- `\t` - Horizontal tab
- `\b` - Backspace
- `\f` - Form feed
- `\v` - Vertical tab (from PHP 5.2.5)
- `\0` - NUL-byte
- `\xNN` - Hexadecimal representation of a character (e.g., `\x41` for 'A')
- `\u{NNNN}` - Unicode code point escape syntax (from PHP 7.0.0, e.g., `\u{1F602}` for 😂)

### Notes:
1. In single-quoted strings (`' '`), escape sequences like `\n`, `\r`, `\t`, etc., are not processed and will be output as is.
2. In double-quoted strings (`" "`), these escape sequences will be processed and output their corresponding characters.
3. The `\xNN` and `\u{NNNN}` syntax allow for a broader range of characters to be represented.


---

# Print Array in PHP

```php
$array = array("John", "Doe", "PHP Developer");

print_r($array);
```

# printf in PHP

```php
$name = "John Doe";
$age = 30;

printf("Hello, my name is %s and I am %d years old.", $name, $age);
```

---

# strlen in PHP

```php
$name = "John Doe";
$length = strlen($name);

echo "The length of the string '$name' is $length."; 
```

# strtolower and strtoupper in PHP

```php
$name = "John Doe";

$lowercase = strtolower($name);
echo $lowercase;  

$uppercase = strtoupper($name);
echo $uppercase; 
```

---

# ucfirst and ucwords in PHP

```php
$name = "john doe";

$firstLetterCapital = ucfirst($name);
echo $firstLetterCapital;

$eachWordFirstLetterCapital = ucwords($name);
echo $eachWordFirstLetterCapital; 
```

---

# strip_tags in PHP

```php
$html = "<h1>Hello, World!</h1>";
$stripped = strip_tags($html);

echo $stripped;  
```

---

# substr in PHP

```php
$text = "Hello, World!";
$substring = substr($text, 7, 5);

echo $substring;  
```

---

# strrev in PHP

```php
$text = "Hello, World!";
$reversed = strrev($text);

echo $reversed;  
```

---

# str_repeat in PHP

```php
$text = "Hello!";
$repeated = str_repeat($text, 3);

echo $repeated;  
```

---

# explode in PHP

```php
$text = "Hello, World!";
$parts = explode(", ", $text);

print_r($parts); 
```

---

# implode in PHP

```php
$parts = array("Hello", "World!");
$text = implode(", ", $parts);

echo $text;  
```
---

# strpos in PHP

```php
$text = "Hello, World!";
$position = strpos($text, "World");

echo $position;  
```

---

# strrpos in PHP

```php
$text = "Hello, World! World!";
$position = strrpos($text, "World");

echo $position;  
```

---

# strstr in PHP

```php
$text = "Hello, World!";
$part = strstr($text, "World");

echo $part;
```
---

# parse_url in PHP

```php
$url = "http://username:password@example.com:8080/path?arg=value#anchor";
$parts = parse_url($url);

print_r($parts);
```

### Returns

```
Array
(
    [scheme] => http
    [host] => example.com
    [port] => 8080
    [user] => username
    [pass] => password
    [path] => /path
    [query] => arg=value
    [fragment] => anchor
)
```

---