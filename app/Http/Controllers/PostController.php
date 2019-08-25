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
		return view('posts.create');
	}
}
