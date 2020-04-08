# GrizzIT Enum - Creating an enum

In order to create an enumerable, create a new class which extends
`GrizzIt\Enum\Enum`. Then add all the options as constants in the newly created
class. Optionally it is possible to define the callable methods in a doc-block
above the class definition.

An implementation of the enumerable would look like the following:
```php
<?php

namespace MyProject\MyPackage\Common;

use GrizzIt\Enum\Enum;

/**
 * @method static EnumMock FOO()
 * @method static EnumMock BAR()
 */
class MyEnum extends Enum
{
    const FOO = 'foo';
    const BAR = 'bar';
}
```

The desired enumerable value can then be retrieved by calling
`MyProject\MyPackage\Common\MyEnum::FOO()`. This will retrieve an instance of
`MyProject\MyPackage\Common\MyEnum` with a set value of `foo`. The value `foo`
can be retrieved by casting the object to a string.

An implementation of this in action would look like the following:
```php
<?php

namespace MyProject\MyPackage\Namespace;

use MyProject\MyPackage\Common\MyEnum;

class MyImplementation
{
    /**
     * Constructor
     *
     * @param MyEnum $option
     */
    public function __construct(MyEnum $option)
    {
        $this->option = (string) $option;
    }
}

new MyImplementation(MyEnum::FOO());
```

The `MyProject\MyPackage\Common\MyEnum` class also inherits some functionality
from the `GrizzIt\Enum\Enum` class. For example to retrieve all options, the
static method `getOptions` can be called on `MyEnum`. This would retrieve an
associative array of the options.

It is also possible to retrieve the enumerable name by supplying the value to a
different function. This can be done by calling `MyEnum::getOrdinal('foo')`
which would yield `FOO`.

## Further reading

[Back to usage index](index.md)
