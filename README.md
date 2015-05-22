properties
==========
A PHP library to parse .properties configuration files, often used for Minecraft servers.

# Install
```
php composer.phar require sekjun9878/properties ~1.0.0
```

# Usage
```
use sekjun9878\Properties\Properties;

$data = file_get_contents(filename);
$array = Properties::parse($data);

$string = Properties::dump($array);
```

# License
> Copyright (c) 2015 Michael Yoo <michael@yoo.id.au> <br>
> Released under the MIT license; see LICENSE <br>
> https://github.com/sekjun9878/properties <br>