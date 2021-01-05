<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobFormRequest;
use App\Http\Resources\JobResource;
use App\Http\Resources\JobResourceCollection;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth:api'])->only('store', 'show');
	}

    public function index(Request $request)
    {    	
    	if($request->has('tag')) {
	    		$jobs = Job::orderBy('pinned', 'DESC')->orderBy('created_at', 'DESC')->get()->filter( function ($job) use ($request) {
	    		$tags = $job->tags->pluck('slug');
	    		if( $tags->contains($request->tag) ) {
	    			return $job;
	    		}
	    	} );
	    	return new JobResourceCollection($jobs);
    	} 	

    	return new JobResourceCollection(Job::with(['user', 'tags'])->orderBy('pinned', 'DESC')->orderBy('created_at', 'DESC')->get());
    }

    public function show(Job $job)
    {
    	$this->authorize('update', $job);
    	return new JobResource($job);
    }

    public function store(JobFormRequest $request)
    {
    	$job = Job::create([
    	    		'user_id' => $request->user_id,
    	            'job_title' => $request->job_title,
    	            'job_location' => $request->job_location,
    	            'company_name' => $request->company_name,
    	            'job_link' => $request->company_name,
    	            'company_logo' => $request->company_logo ?: 'https://cdn4.iconfinder.com/data/icons/defaulticon/icons/png/256x256/no.png',
    	            'highlited' => $request->highlited ?: false ,
    	            'pinned' => $request->pinned ?: false
    	    	]);

    	$job->tags()->attach($request->tags);

    	return $job;
    }

    public function update(Job $job, Request $request)
    {
    	$this->authorize('update', $job);

    	if( !$request->highlited ) {
    		$attributes = array_merge($this->getAttributes(), ['highlited' => false]);
    		$job->tags()->sync($request->tags);

    		return $job->update($attributes);
    	}

    	if( !$request->pinned ) {
    		$attributes = array_merge($this->getAttributes(), ['pinned' => false]);
    		$job->tags()->sync($request->tags);

    		return $job->update($attributes);
    	}

    	$job->tags()->sync($request->tags);

    	return $job->update($this->getAttributes());
    }

    protected function getAttributes()
    {
    	return request()->only('job_title', 'job_location', 'job_link', 'company_name', 'company_logo', 'highlited', 'pinned' );
    }
}
