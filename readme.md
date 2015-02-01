## Laravel Presentation ##

This is a prepared laravel installation for giving a presentation about laravel. Since .env and config are modified, you should not use this fork for real applications. 

## Modifications ##

- Pre-configured mail, database, queue, logging
- Added PresentationController and presentation.blade.php for a short introduction
- Modified the welcome.blade.php for presentation
- Preinstalled Debugbar
- Prepared views, controller, routes and command for "Laravel Message Service"
- Put a delay (sleep(...)) in the mail template to emulate slow mail server interaction

## How to use/redo this presentation ##

- Checkout this git repository
- Start the webserver:

```
php artisan serve
```

- Open the [presentation](http://localhost:8000/presentation) in your browser for some informations about Laravel. 
- 

## Included Projects ##

This presentation uses and includes the following projects/tools/fonts:

- [Laravel](http://laravel.com/)
- [Deck.js](http://imakewebthings.com/deck.js/)
- [Source Code Pro](https://github.com/adobe-fonts/source-code-pro)
- [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar)

### License

- Laravel is licensed under the [MIT license](http://opensource.org/licenses/MIT)
- deck.js is licensed under the [MIT license](https://github.com/imakewebthings/deck.js/blob/master/MIT-license.txt)
- Laravel Debugbar is licensed under [https://github.com/barryvdh/laravel-debugbar/blob/master/LICENSE](https://github.com/barryvdh/laravel-debugbar/blob/master/LICENSE)
- Source Code Pro is licensed under the [SIL Open Font License 1.1](https://github.com/adobe-fonts/source-code-pro/blob/master/LICENSE.txt)
