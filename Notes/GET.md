# GET

```php
<html>
<body>

<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="name">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // collect value of input field
    $name = htmlspecialchars($_GET['name']); 
    if (empty($name)) {
        echo "Name is empty";
    } else {
        echo "Hello, $name";
    }
}
?>

</body>
</html>
```

---