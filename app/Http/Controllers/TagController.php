<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Http\Resources\TagResourceCollection;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
	public function index()
	{
		return new TagResourceCollection(Tag::all());
	}

    public function show(Request $request, Tag $tag)
    {
    	return new TagResource($tag);
    }

    public function store(Request $request)
    {
    	$this->authorize('update', new Tag());

    	Tag::create([
    		'title' => $request->title,
    		'slug' => Str::slug($request->title)
    	]);
    }
}
