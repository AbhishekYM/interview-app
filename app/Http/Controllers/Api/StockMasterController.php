<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStockMasterRequest;
use App\Http\Resources\StockMasterResource;
use App\Models\StockMaster;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class StockMasterController extends Controller
{

    public function index()
    {
        $stockMasters = StockMaster::with('branch')->advancedFilter();
        foreach ($stockMasters as $stockMaster) {
            $stockMaster->in_stock_date = Carbon::parse($stockMaster->in_stock_date)->format('d-m-Y');
        }    
        return new StockMasterResource($stockMasters);
    }
    

    public function create()
    {        
        return response([
            'meta' => [],
        ]);
    }

    public function store(StoreStockMasterRequest $request)
    {
        $validatedData = $request->validated();
    
        foreach ($validatedData['stock_ids'] as $stockData) {
            // Set in_stock_date to the current date if not provided
            $stockData['in_stock_date'] = $stockData['in_stock_date'] ?? Carbon::now()->toDateString();
    
            StockMaster::create($stockData);
        }
    
        return response()->json(['message' => 'Stock Master records created successfully'], Response::HTTP_CREATED);
    }
    public function show(StockMaster $stockMaster)
    {
        
    }

    public function edit(StockMaster $stockMaster)
    {
        
    }

    public function update(Request $request, StockMaster $stockMaster)
    {
        
    }

      public function destroy($id)
    {
        $stockMaster = StockMaster::findOrFail($id);
        $stockMaster->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
