<?php

namespace App\Http\Controllers;

use App\Models\SearchHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchHistoryController extends Controller
{
    public function index()
    {
        $histories = Auth::user()->searchHistories;
        return response()->json($histories);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $history = Auth::user()->searchHistories()->create($data);
        return response()->json($history, 201);
    }

    public function destroy(Request $request)
    {
        $ids = $request->ids;
        SearchHistory::whereIn('id', $ids)->where('user_id', Auth::id())->delete();
        return response()->json(['message' => 'Histories deleted successfully']);
    }

}
