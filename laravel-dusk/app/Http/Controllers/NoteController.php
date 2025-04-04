<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notes_data = Note::with('penulis')
                        ->where('penulis_id', auth()->id())
                        ->get();
        return view('Notes/index', compact('notes_data'));
    }

    public function create()
    {
        return view('Notes.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
            ]);
            //
            $post = Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            if($post){
                return redirect()->route('post.index')->with(['success' => 'new post has been created']);
            }else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'Some problem occurred, please try again'
                    ]);
            }
    }

    
    public function show($id)
    {
        $note_data = Note::findOrFail($id);

        return view('Notes.detail', compact('note_data'));
    }

    
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('post.edit', compact('post'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
            ]);

            $post = Post::findOrFail($id);

            $post->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);

            if ($post) {
                return redirect()
                    ->route('post.index')
                    ->with([
                        'success' => 'Post has been updated'
                    ]);
            } else {
                return redirect()
                    ->route('post.index')
                    ->withInput()
                    ->with([
                        'error' => 'Some problem has occured, please try again'
                    ]);
            }
    }

    
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Post has been deleted'
                ]);
        } else {
            return redirect()
                ->route('post.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
