# Laravel Presentation #

This is a prepared laravel installation for giving a presentation about laravel. I used the following for my talk about Laravel at the 36. meeting of [PHPUG Rheinhessen](http://www.phpug-rheinhessen.de/)

**You should not use this fork for real applications.** 

## Modifications ##

- Pre-configured mail, database, queue, logging
- Added PresentationController and presentation.blade.php for a short introduction
- Added presentation_routes.php to RouteServiceProvider
- Modified the welcome.blade.php for presentation
- Preinstalled Debugbar
- Prepared views, controller, routes and command for "Laravel Message Service"
- Put a delay (sleep(...)) in the mail template to emulate slow mail server interaction
- Added a command to clear all files which will be written during the presentation

## How to use/redo this presentation ##

### Preparation ###
- Checkout this git repository:

```
git clone https://github.com/svrnm/laravel-presentation.git
```

- Change your current working directory inside the project and install all dependencies:

```
cd laravel-presentation
composer install
```

- Clear all files which will be redone during the presentation:

```
php artisan presentation:empty
```

- Start the webserver in your terminal:

```
php artisan serve
```

### View the slides ###
- Open the [presentation](http://localhost:8000/presentation/en) in your browser for some informations about Laravel.
- If you'd like to present these slides to other people yourself, you should change the personal informations to reflect your own story.
- If you prefer a german version of the presentation, open http://localhost:8000/presentation/de

### Routes Hello World ###

- Now you can write a "Hello World" example in *app/Http/routes.php*:

```php
Route::get('welcome', function() {
   return '<h1>Welcome!</h1>';
});
```

- Open http://localhost:8000/welcome in your browser. **Hello World!**
- Evolve this example: add a name parameter, make this parameter optional, use the view *welcome.blade.php*, to style the view.
- Look inside the mentioned *welcome.blade.php* to learn more about the template engine.

### Model-View-Controller ###

- We'd like to write the "Laravel Message Service": Store messages in a database, display them and later send them via mail to a specific address.
- Create the controller:

```
php artisan make:controller MessageController
```

- Look inside the created file *app/Http/Controllers/MessageController*. The predefined methods are common names for creating, retrieving, updating and deleting resources ([CRUD](https://en.wikipedia.org/wiki/CRUD)).
- Open the *routes.php* once again and add the following routes:

```php
Route::get('messages/', 'MessageController@index');
Route::get('messages/create/{body}', 'MessageController@create');
```

- If you open one of these, e.g. http://localhost:8000/messages you wont see anything for the moment. For this you'll need some models in your database.
- First of all you need the table. You can do this by hand or you can generate a [migration](https://en.wikipedia.org/wiki/Schema_migration) file:

```
php artisan make:migration --create="messages" create_messages_table
```

- This will create a file once again. The name of this file is prefixed with a timestamp, so it will have a name like *database/migrations/2015_02_01_123450_create_messages_table.php*. Open This file and add the second line, to have a body for your messages:

```php
$table->increments('id');
$table->text('body');
$table->timestamps();
```

- Execute the migrations, to generate all tables:

```
php artisan migrate
```

- Look inside your table, e.g. using the command line tool for sqlite:

```
sqlite3 storage/database.sqlite
.tables
.schema messages
```

- Next, you need the Model class. Once again you can use *artisan* to generate the class file:

```
php artisan make:model Message
```

- This will generate the file *app/Message.php*:

```php
<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

}
```

- You can tinker with Laravel using ```php artisan tinker``` and create model instances by hand:

```php
$m = new Message;
$m->body = 'Hi! I am a message';
$m->save();
```

- If you'd like to use ```Message::create(['body' => 'Hi! I am a message'])```, you need to define which fields are fillable in the model class, to protect yourself against mass assignment:

```php
protected $fillable = ['body'];
```

- Having some example messages, you can edit the *MessageController* to make these visible:

```php
public function index()
{
	$messages = Message::all();
	return view('messages.index', compact('messages'));
}

```

- Now you can open http://localhost:8000/messages and see a table displaying the message you created. If you use ```php artisan tinker``` again you can create further instances and fill the table. If you are interested, you can look in *resources/views/messages/index.blade.php*.

- Next we will write a not perfect but simple method, to create new instances using the browser. Since we already have defined the route for http://localhost:8000/messages/create/Your%20Message , we only need to fill out the create function:

```php
public function create($body)
{
	$message = Message::create(['body' => $body]);
	return view('messages.created', compact('message'));
}
```
- Every time you call the url above, you will create an message instance. Try it:
	- http://localhost:8000/messages/create/Hello
    - http://localhost:8000/messages/create/Test_Message
    - http://localhost:8000/messages/create/Wuuuuhuuuu
    
### Mail, Command and Queue ###

- Finally, we'd like to send a notification mail each time a message is created. The sending of this mail should happen asynchronously, since the web request may be delayed.
- So, modifiy the *create* function:

```php
public function create($body)
{
	$message = Message::create(['body' => $body]);
       \Mail::send('emails.message', ['body' => $body], function($mail) {
		$mail->to('yourname@yourdomain.tld')->subject('Sie haben Post!');
	});
	return view('messages.created', compact('message'));
}
```
- Side note: You can either use your real mail address to make this work or you edit *config/mail.php* and change the driver to *log*. The second will redirect all mails to *storage/logs/laravel.log*.

- Create further messages using the create url. You should receive mails for each request. Further you should see that, the request takes more than two seconds. To speed up the user experience once again, we will move the mail handling into a queued command.
- Create the command:

```
php artisan make:command SendMessageCommand
```
- Once again, a file is created: *app/Commands/SendMessageCommand.php*. Open this file and modify it:

```php
<?php namespace App\Commands;

use App\Commands\Command;

use App\Message;
use Illuminate\Contracts\Bus\SelfHandling;

class SendMessageCommand extends Command implements SelfHandling {

	protected $message;

	public function __construct(Message $message)
	{
		$this->message = $message;
	}

	public function handle()
	{
		$body = $this->message->body;
		\Mail::send('emails.message', ['body' => $body], function($mail) {
			$mail->to('yourusername@yourdomain.tld')->subject('Sie haben Post!');
		});
	}

}

```

- Change the *create* method once again:

```php
public function create($body)
{
	$message = Message::create(['body' => $body]);
	$this->dispatch(new SendMessageCommand($message));
	return view('messages.created', compact('message'));
}
```

- This externalizes the sending of the mail, but still if you call the creation url, there is a delay and the mail is send immediately.
- To add the command to a queue, add an interfacE:

```php
class SendMessageCommand extends Command implements SelfHandling, ShouldBeQueued { 
...
}
```

- Create another message. This time the request should only take some milliseconds, but also no mail is send. 
- Since this laravel project is configured to use the database to store queued commands, you can see your job using ```sqlite3 storage/database.sqlite``` once again:

```sql
select * from jobs;
```

- To pop the first element from the pending queue use artisan:

```
php artisan queue:work
```

- Try it several times: Create several messages to fill up your queue and afterwards pop elements from the queue, which will finally lead to new messages in your mail box.

- You can also create a listener for your queue:

```
php artisan queue:listen
```

### Possible next steps ###

If you'd like to test some more features of Laravel, you can try the following things:

- Adding an event + handler for sending the email
- Writing a form for message creation
- Add validation
- ...



### Further reading ###

The given presentation gives only a overview about Laravel. To learn more about Laravel I can suggest:

- [The official documentation](http://laravel.com/docs/)
- [Laracasts](https://laracasts.com/)


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
- This presentation is licendes under the [MIT license](http://opensource.org/licenses/MIT)
