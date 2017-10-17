<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Page;
use App\Comment;
use App\Category;
use Mail;
use Session;
use DateTime;

class BrowseController extends Controller {

	public function getMain(){
		return view('pages.welcome');
	}

	public function getIndex() {
		// $posts = Post::orderBy('created_at', 'desc')->limit(8)->get();
		$posts = Post::orderBy('created_at', 'desc')->get();

		$comments = Comment::orderBy('created_at', 'desc')->limit(5)->get();

		$categories = Category::orderBy('created_at', 'desc')->get();

		return view('pages.browse')->withPosts($posts)->withComments($comments)->withCategories($categories);
	}

	public function getAbout() {
        $data = Page::where('page', '=', 'about')->get();
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
	public function search()
    {
        $search = \Request::get('data'); //<-- we use global request to get the param of URI

        $posts = Post::where('title','like','%'.$search.'%')
        	->where('slug','like','%'.$search.'%')
            ->orderBy('title')
            ->paginate(10);

        return view('search')->withPosts($posts);
    }


}