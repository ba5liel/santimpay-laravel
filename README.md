
# SantimPay Laravel API Package.

## Installation

You can install the package via composer:

```bash
composer require ba5liel/santimpay
```

## For Laravel version <= 5.4

With version 5.4 or below, you must register your facades manually in the aliases section of the config/app.php configuration file.


```json config/app.php

"aliases": {
            "SantimPay": "SantimPay\\SantimPay\\Facades\\SantimPay"
        }
```


## Credits

- [basliel](https://github.com/ba5liel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
