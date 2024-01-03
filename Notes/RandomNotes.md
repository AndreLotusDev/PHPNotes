# Case unsensitive

The PHP is case insensitive, then for example, if you have a file named `randomnotes.php` and you call it with `RandomNotes.php` it will work.
    Or for variables, if you have `$myVar` and you call it with `$MyVar` it will work.

---

```php
<?php

function testFunction() {
    echo "This is a test function.\n";
}


TestFunction();
TESTFUNCTION();

$myVar = "This is a test variable.";

echo $MyVar;
echo $MYVAR;
?>
```

---

# Code Instruction

In some situations is necessary to have ; and other not, as a for loop:

```php
<?php
    for ($i = 0; $i < 10; $i++) {
        echo $i;
    }

    echo "Teste";
?>
```

---

# White space

The interpreter ignores spaces and break lines, but to be human readable we give proper space
and indentation 

---

# Comments

```php
<?php
// This is a single-line comment

/*
This is a
multi-line comment
*/

# This is also a single-line comment
?>
```

---

# Reserverd keywords

```markdown
1. __halt_compiler
2. abstract
3. and
4. array
5. as
6. break
7. callable
8. case
9. catch
10. class
11. clone
12. const
13. continue
14. declare
15. default
16. die
17. do
18. echo
19. else
20. elseif
21. empty
22. enddeclare
23. endfor
24. endforeach
25. endif
26. endswitch
27. endwhile
28. eval
29. exit
30. extends
31. final
32. finally
33. for
34. foreach
35. function
36. global
37. goto
38. if
39. implements
40. include
41. include_once
42. instanceof
43. insteadof
44. interface
45. isset
46. list
47. namespace
48. new
49. or
50. print
51. private
52. protected
53. public
54. require
55. require_once
56. return
57. static
58. switch
59. throw
60. trait
61. try
62. unset
63. use
64. var
65. while
66. xor
67. yield
```

---