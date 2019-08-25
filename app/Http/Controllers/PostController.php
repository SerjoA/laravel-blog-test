<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

	private $request;

	public function __construct(Request $request) {
		$this->middleware('auth');
		$this->request = $request;
	}

	public function index() {
		$posts = Post::all();
		return view('posts.index', compact('posts'));
	}

	public function add() {
		return view('posts.add');
	}

	public function create() {
		$request = $this->request;

		$this->validate($request, [
			'title' => 'required|string',
			'body' => 'required|string'
		]);

		$title = $request->input('title');
		$body = $request->input('body');

		Post::create([
			'title' => $title,
			'body' => $body,
		]);

		return redirect()->route('posts.index');
	}

	public function view($postId) {
		$post = Post::findOrFail($postId);

		return view('posts.view', compact('post'));
	}
}
