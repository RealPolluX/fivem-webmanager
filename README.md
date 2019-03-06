# FiveM WebManager
DISCONTINUED! This is the [webmanager](https://github.com/Slluxx/fivem-webmanager-v2) project by [Slluxx](https://github.com/Slluxx) but reworked.


## Requirements
- PHP >= 7.1
- NodeJS (if you want to develop/modify the css)


## Used libraries
- [PlatesPHP v3.3.0](http://platesphp.com/v3/)
- [KLogger dev-master](https://github.com/katzgrau/KLogger)
- [PSR Log](https://github.com/php-fig/log)

## Usage
There is only some basic stuff working right now:
- Routing
- Session handling (login & logout)

To test these behaviours, create a file named 'pollux.json' unter storage/accounts/ with the following content:
```
{
  "username": "pollux",
  "email": "noreply@example.com",
  "password": "$2y$10$DelaAxzYoQmQnC9yhY3uxONZ70w2033lPZVRuiV.Cei7co4D8i7CK",
  "salt": "DelaAxzYoQmQnC9yhY3uxQ",

  "rank": "admin"
}
```
- Username: pollux
- Password: pollux

## License
Copyright © TeamQuantum
(This will change in the future ...)
