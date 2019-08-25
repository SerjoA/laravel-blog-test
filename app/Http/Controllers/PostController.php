<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

//		$isFollowingPost = Follow::query()->where('user_id', Auth::user()->id)->get();
//		$isLikingPost = Like::query()
		return view('posts.view', compact('post'));
	}

	public function like($postId) {
		$currentUserId = Auth::user()->id;

		Like::updateOrCreate([
			'user_id' => $currentUserId,
			'post_id' => $postId
		]);

		return redirect()->route('posts.view', ['postId' => $postId]);
	}

	public function follow($postId) {
		$currentUserId = Auth::user()->id;

		Follow::updateOrCreate([
			'user_id' => $currentUserId,
			'post_id' => $postId
		]);

		return redirect()->route('posts.view', ['postId' => $postId]);
	}
}
