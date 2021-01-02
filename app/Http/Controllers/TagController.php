<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Http\Resources\TagResourceCollection;
use App\Models\Tag;
use Illuminate\Http\Request;

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
}
