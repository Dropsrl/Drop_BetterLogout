# Drop_BetterLogout
- This module allows you to remove the logout page, eliminating the 5 seconds of waiting. 
- You can decide to always redirect the user to the homepage or stay on the current page (excluding customer pages, cart and checkout)

## Installation
- Install module through composer (recommended):
```sh
$ composer config repositories.drop.dbl vcs https://github.com/Dropsrl/Drop_BetterLogout
$ composer require drop/module-better-logout
```

- Install module manually:
    - Copy these files in app/code/Drop/Drop_BetterLogout/

- After installing the extension, run the following commands:
```sh
$ php bin/magento module:enable Drop_BetterLogout
$ php bin/magento setup:upgrade
$ php bin/magento setup:di:compile
$ php bin/magento setup:static-content:deploy
$ php bin/magento cache:clear
```

## Requirements
- PHP >= 7.0.0

## Compatibility
- Magento >= 2.2
- Not tested on 2.1 and 2.0

## Support
If you encounter any problems or bugs, please create an issue on [Github](https://github.com/Dropsrl/Drop_BetterLogout/issues) 

## License
[GNU General Public License, version 3 (GPLv3)] http://opensource.org/licenses/gpl-3.0

## Copyright
(C) 2019 Drop S.R.L.
