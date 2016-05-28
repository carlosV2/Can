# Float

This asserter validates if the given data is of type [float](http://php.net/manual/en/language.types.float.php).

You can use the float asserter as `To::beFloat()`.

In order to refine the validation, the following functions are available:

### withIncludedMin

This function checks if the given float is greater or equals than a minimum.

You can use this function as `To::beFloat()->withIncludedMin($min)`.

### withExcludedMin

This function checks if the given float is greater than a minimum.

You can use this function as `To::beFloat()->withExcludedMin($min)`.

### withIncludedMax

This function checks if the given float is lower or equals than a maximum.

You can use this function as `To::beFloat()->withIncludedMax($max)`.

### withExcludedMax

This function checks if the given float is lower than a maximum.

You can use this function as `To::beFloat()->withExcludedMax($max)`.
