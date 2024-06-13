<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Story;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, User $admin)
    {
        $request->session()->forget('success');

        $data = [
            'stories'=> Story::with('tags')
                ->latest()
                ->get(),
            'admin'=>$admin->name,
        ];
        return view('admin.index', $data);
    }

    public function show( Story $story)
    {
        $tags = $story->tags()->get();

        return view('admin.show', ['story' => $story, 'tags'=>$tags ]);
    }

    public function showByTag(Request $request,Tag $tag)
    {
        $request->session()->flash('success', "Посты с хеш-тэгом $tag->name.");

        $data = ['stories' => $tag->stories()
            ->with('tags')
            ->latest()
            ->get(),
            'title' => $tag->name
        ];

        return view('admin.index', $data);
    }

    public function approve(Request $request, Story $story)
    {
        $story->status = 'принято';
        $story->save();

        $request->session()->flash('success', 'История принята.');

        return redirect()->route('admin');
    }

    public function reject(Request $request, Story $story)
    {
        $story->status = 'отклонено';
        $story->save();
        $request->session()->flash('success', 'История отклонена.');

        return redirect()->route('admin');
    }
    public function newAdmin()
    {
        return view('auth.register');
    }

    public function addAdmin(AdminRequest $request)
    {
        $validated = $request->safe()->all();
         User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $request->session()->flash('admin', 'Администратор '. $validated['name']. ' добавлен.');

        return redirect()->route('admin');
    }
}
