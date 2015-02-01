<?php namespace App\Http\Controllers;

use App\Commands\SendMessageCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$messages = Message::latest()->get();
		return view('messages.index', compact('messages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($body)
	{
		$message = Message::create(['body' => $body]);
		$this->dispatch(new SendMessageCommand($message));
		return view('messages.created', compact('message'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$message = Message::find($id);
		return view('messages.show', compact('message'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
