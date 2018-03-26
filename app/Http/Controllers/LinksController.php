<?php

namespace App\Http\Controllers;

use App\Events\LinkDeleted;
use App\Events\LinkShortned;
use App\Facades\Bitly;
use App\Http\Requests\CreateLinkRequest;
use App\Link;
use Illuminate\Http\Request;


class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = auth()->user()->links;

        return view('links.index', compact('links'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateLinkRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLinkRequest $request)
    {
        $shortened = Bitly::shorten($request->original);

        $link = Link::create([
            'original' => $request->original,
            'shortened' => $shortened,
            'user_id' => auth()->id()
        ]);

        LinkShortned::dispatch($link);

        return response()->json([
            'data' => [
                'shortened' => $shortened
            ],
            'message' => 'Link shortened successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Link $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $this->authorize('delete', $link);

        $link->delete();

        LinkDeleted::dispatch();

        return response()->json([
            'data' => [
                'link_id' => $link->id
            ],
            'message' => 'Link deleted successfully!'
        ]);
    }
}
