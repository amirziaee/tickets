<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class SearchMessageController extends Controller
{
    public function result(Request $request)
    {

        $key = $request->search;
        $messages = Message::where('body', 'like', "%$key%")->where('status', 'new')->orWhere('status', 'read')->get();
        if (sizeof($messages)) {
            return view('dashboard.search.result', compact('messages'));
        } else {
            $messages = [];
            return view('dashboard.search.result', compact('messages'));
        }
    }


    public function show()
    {
        return view('dashboard.search.advanceSearch');
    }


    public function doSearch(SearchRequest $request)
    {
        $key = $request->key;
        $search = $request->searchby;
        switch ($search) {
            case 'body':
                $messages = Message::where('body', 'like', "%$key%")->where('status', 'new')->orWhere('status', 'read')->get();
                break;
            case 'title':
                $messages = Message::where('title', 'like', "%$key%")->where('status', 'new')->orWhere('status', 'read')->get();
                break;
            default:
            $messages = Message::where('sender', 'like', "%$key%")->get();
        }

        return view('dashboard.search.result', compact('messages'));
    }
}
