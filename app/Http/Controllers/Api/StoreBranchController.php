<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use Illuminate\Http\Request;
use App\Http\Resources\StoreBranchResource;
use App\Models\StoreBranch;
use Symfony\Component\HttpFoundation\Response;

class StoreBranchController extends Controller
{
    public function index()
    {
        return new StoreBranchResource(StoreBranch::advancedFilter());
    }

    public function create()
    {        
        return response([
            'meta' => [],
        ]);
    }

    public function store(StoreBranchRequest $request)
    {
        $storeBranch = StoreBranch::create($request->validated());
        return (new StoreBranchResource($storeBranch))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $storeBranch = StoreBranch::findOrFail($id);
        return new StoreBranchResource($storeBranch);
    }

    public function edit($id)
    {
        $storeBranch = StoreBranch::findOrFail($id);
        return response([
            'data' => new StoreBranchResource($storeBranch),
            'meta' => [],
        ]);
    }
    
    public function update(UpdateBranchRequest $request, $id)
    {
        $storeBranch = StoreBranch::findOrFail($id);
        $storeBranch->update($request->validated());
    
        return (new StoreBranchResource($storeBranch))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        $storeBranch = StoreBranch::findOrFail($id);
        $storeBranch->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
