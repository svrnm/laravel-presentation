<?php namespace App\Commands;

use App\Commands\Command;

use App\Message;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Queue\SerializesModels;

class SendMessageCommand extends Command implements SelfHandling, ShouldBeQueued {

	protected $message;

	use SerializesModels;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Message $message)
	{
		$this->message = $message;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$body = $this->message->body;
		\Mail::send('emails.message', ['body' => $body], function($mail) {
			$mail->to('severin@localhost')->subject('Sie haben Post!');
		});
	}

}
