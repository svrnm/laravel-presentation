<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class EmptyPresentation extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'presentation:empty';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Clear all files which will be rewritten during the laravel presentation';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$deleteFiles = [
			'Commands/SendMessageCommand.php',
			'Http/Controllers/MessageController.php',
			'Message.php',
			'../resources/views/messages/show.blade.php',
			'database/migrations/2015_02_01_123450_create_messages_table.php'
		];

		$clearFiles = [
			'Http/routes.php',
			'../storage/database.sqlite'
		];



		foreach($deleteFiles as $file) {
			if (File::exists(app_path($file))) {
				File::delete(app_path($file));
			}
		}

		foreach($clearFiles as $file) {
			if (File::exists(app_path($file))) {
				File::put(app_path($file), '');
			}
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [

		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [

		];
	}

}
