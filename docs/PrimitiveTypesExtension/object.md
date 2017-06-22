# Object

This asserter validates if the given data is of type [object](http://php.net/manual/en/language.types.object.php).

You can use the object asserter as `To::beObject()`.

In order to refine the validation, the following functions are available:

### withType

This function checks if the given object is or has the given type.

You can use this function as `To::beObject()->withType($type)`.

### withKey

This function registers the given key for future inspection. This function does nothing by itself. It needs to be
combined with `expected` or `withNoOtherKeys` functions.

### expected

This function checks if the given key contains data that matches the given asserter. This function needs a
previous call to `withKey` in order to know which key it needs to apply the asserter to.

You can use this function as `To::beObject()->withKey($key)->expected(To::be*())`.

### withNoOtherKeys

This function checks if the given object contains other non-registered keys. This function needs a previous
call to `withKey` in order to know which keys it needs to check.

You can use this function as `To::beObject()->withKey($key)->withNoOtherKeys()`.
