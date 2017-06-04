<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class BrowseController extends Controller {

	public function getIndex() {
		// $posts = Post::orderBy('created_at', 'desc')->limit(8)->get();
		$posts = Post::orderBy('created_at', 'desc')->get();
		return view('pages.browse')->withPosts($posts);
	}

	public function getAbout() {
		$first = 'Lakpa';
		$last = 'Sherpa';

		$fullname = $first . " " . $last;
		$email = 'sherpalakpa18@gmail.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}

	public function getContact() {
		return view('pages.contact');
	}

	public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('sherpalakpa18@gmail.com');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your Email was Sent!');

		return redirect('/');
	}


}