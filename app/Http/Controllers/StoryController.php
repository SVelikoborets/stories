<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoryRequest;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Tag;

class StoryController extends Controller
{
    public static function extractTags($text)
    {
        $text = str_replace(" ", "", $text);

        $pattern = '/#[\p{L}\p{Pd}\x{200C}\x{200D}]+/u';

        preg_match_all($pattern, $text, $matches);

        return array_unique($matches[0]);
    }

    public function index()
    {
        $data = ['stories' => Story::where('status','принято')
            ->with('tags')
            ->latest()
            ->get(),
            ];
        return view('stories.index', $data );
    }

    public function create()
    {
        return view('stories.create' );
    }

    public function store( StoryRequest $request )
    {
        $validated = $request->safe()->all();

        $story = Story::create([
         'title' => $validated['title'],
         'content' => $validated['content'],
         ]);

        $tags = self::extractTags($validated['tags']);

        foreach($tags as $tag)
        {
            $tag = Tag::firstOrCreate(['name' => trim($tag)]);

            $story->tags()->attach($tag->id);

            $request->session()->flash('success', 'Пост отправлен на поверку.');
        }
        return redirect()->route('main');
    }

    public function show( Story $story)
    {
        $tags = $story->tags()->get();

        return view('stories.show', ['story' => $story, 'tags'=>$tags ]);
    }

    public function showByTag(Request $request,Tag $tag)
    {
        $request->session()->flash('success', "Посты с хеш-тэгом $tag->name.");

        $data = ['stories' => $tag->stories()
            ->where('status','принято')
            ->with('tags')
            ->latest()
            ->get(),
            'title' => $tag->name
        ];

        return view('stories.index', $data);
    }
  }

