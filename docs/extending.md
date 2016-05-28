# Extending

`Can` can be easily extended to include any validation you need.

Extensions are useful for adding new data types or for easying complex validations.

Creating the Asserter
---------------------

Asserters are the classes that perform a specific validation. For example, the `StringAsserter` is specialised
into validating strings.

As an example, we are going to create the `UserAsserter` to validate that a piece of data contains valid and
useful user information.

We want our `UserAsserter` to validate that data is:

- An array.
- Contains a `role` key with a non-empty string.
- Contains an `email` key with a non-empty string.
- Additionally, we want to be able to require this user to have a specific role.

```php
namespace my\ns;

use carlosV2\Can\AsserterInterface;
use carlosV2\Can\To;

class UserAsserter implements AsserterInterface
{
    /**
     * @var string
     */
    private $requiredRole;

    /**
     * @param string $role
     *
     * @return UserAsserter
     */
    public function withRole($role)
    {
        $this->requiredRole = $role;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function check($data)
    {
        if (!can($data)->claim(To::beArray()
            ->withKey('role')->expected(To::beString()->withMinLength(1))
            ->withKey('email')->expected(To::beString()->withMinLength(1))
        )) {
            return false;
        }

        if (is_string($this->requiredRole)) {
            if ($data['role'] !== $this->requiredRole) {
                return false;
            }
        }

        return true;
	}
}
```
Of course, there is no need to use `can` inside the `check` function. The validation could also be done by stacking
conditionals.

This class will allow us to use `To::beUser()` for any future validation. We can also use it
like `To::beUser()->withRole('role')` for specific role validation.

Asserters will be constructed on the fly each time they are needed. This allows us to have constructors requiring
any information instead of relying on optional methods.

For example, if we would like to require the user role always instead of having an optional method, we can replace
the `withRole` method with the following constructor:

```php
/**
 * @param string $role
 */
public function __construct($role)
{
    $this->requiredRole = $role;
}
```

If we do this modification, the usage then becomes `To::beUser('role')`.

Creating the Extension
----------------------

Asserters can do nothing by themselves. They need an extension class to be linked into the library.

This extension links the created `UserAsserter` with the name we want to use:

```php
namespace my\ns;

use carlosV2\Can\ExtensionInterface;
use my\ns\UserAsserter;

class UserExtension implements ExtensionInterface
{
    /**
     * @inheritdoc
     */
    public function registerAsserters()
    {
        return [
            'user' => UserAsserter::class
        ];
    }
}
```

In this case, we are stating that we want `beUser` to be linked with the `UserAsserter`. We could, however, use
any name for this asserter, just remember that it will have always `be` prepended automatically.

Additionally, you could create aliases. For example:

```php
/**
 * @inheritdoc
 */
public function registerAsserters()
{
    return [
        'user' => UserAsserter::class,
        'myUser' => UserAsserter::class
    ];
}
```

This function would make both `To::beUser()` and `To::beMyUser()` available and linked to the `UserAsserter` class.

Injecting the Extension
-----------------------

Finally, the extension needs to be injected into the library so it can load the asserters.

In order to do this, you only need to use the function `To::registerExtenstion()`. For example:

```php

use carlosV2\Can\To;
use my\ns\UserExtension;

To::registerExtenstion(new UserExtension());
```

Overriding asserters
--------------------

As because the asserters are registered inside an associative array, if you want to override an asserter you only
need to register a new asserter under the same key.

For example, if we don't like the bundled `StringAsserter` because we want any string to start with `My`, we can
do the following:

```php
class MyStringAsserter implements AsserterInterface
{
    /* ... */

    /**
     * @inheritdoc
     */
    public function check($data)
    {
        if (!is_string($data)) {
            return false;
        }

        if (substr($data, 0, 2) !== 'My') {
            return false;
        }

        return true;
	}
}

class MyStringReplacingExtension implements ExtensionInterface
{
    /**
     * @inheritdoc
     */
    public function registerAsserters()
    {
        return [
            'string' => MyStringAsserter::class
        ];
    }
}
```

If you override an asserter, remember that you cannot use the original asserter as the key is now pointing to
the new asserter. However, you could still have the same functionality if your class inherits from the original one:

```php
use carlosV2\Can\Extension\PrimitiveTypesExtension\StringAsserter;

class MyStringAsserter extends StringAsserter implements AsserterInterface
{
	/* ... */
}
```

In this case, the register order matters as the last one to be registered will be prevalent.

Another way to reuse the previous asserter is to alias it. For example:

```php
use carlosV2\Can\Extension\PrimitiveTypesExtension\StringAsserter;

class MyStringReplacingExtension implements ExtensionInterface
{
    /**
     * @inheritdoc
     */
    public function registerAsserters()
    {
        return [
            'oldString' => StringAsserter::class,
            'string' => MyStringAsserter::class
        ];
    }
}
```

That way you could use `To::beString()` linked to your asserter and `To::beOldString()` linked to the bundled asserter.
