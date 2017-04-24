<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Feeds;
use ItunesSearch;

class ShowController extends Controller
{
        public function index(Request $request)
        {
            if (!$request->has('rss')) {
                return view('new');
            }
            
            $this->validate($request, [
                    'rss' => 'required|url',
            ]);

            $feed = Feeds::make($request->input('rss'));

            $itunes = ItunesSearch::query($feed->get_title(), ['entity' => 'podcast', 'media' => 'podcast'])->results->where('feedUrl', $request->input('rss'))->first();

            $show = (object) [
                'title'     => $feed->get_title(),
                'permalink' => $feed->get_permalink(),
                'artwork'   => $itunes->artworkUrl600,
                'items'     => $feed->get_items(),
                'apps'      => (object) [
                    (object) [
                        'title' => 'Apple Podcasts',
                        'url'   => $itunes->trackViewUrl,
                    ],
                    (object) [
                        'title' => 'Overcast',
                        'url'   => 'overcast://x-callback-url/add?url=' . $request->input('rss'),
                    ],
                    (object) [
                        'title' => 'Pocket Casts',
                        'url'   => 'pktc://subscribe/'. substr($request->input('rss'), 7),
                    ],
                    (object) [
                        'title' => 'Default Podcast App',
                        'url'   => 'feed://'. substr($request->input('rss'), 7),
                    ],
                ],
            ];

            return view('show')
                    ->with('show', $show);
        }
}
