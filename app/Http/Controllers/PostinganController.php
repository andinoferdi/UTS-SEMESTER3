<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use App\Models\Like;
use App\Models\Komentar;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
    public function index()
    {
        $postings = Postingan::with('user', 'likes', 'komentars')->latest()->get();
        return view('dashboard.postingan.index', compact('postings'));
    }

    public function create()
    {
        return view('dashboard.postingan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_postingan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $path = $request->file('gambar')->store('images', 'public');

            Postingan::create([
                'user_id' => auth()->id(),
                'nama_postingan' => $request->nama_postingan,
                'gambar' => $path,
            ]);

            return redirect()->route('postingan.index')->with('success', 'Postingan created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }

    public function edit(Postingan $postingan)
    {
        return view('dashboard.postingan.edit', compact('postingan'));
    }

    public function update(Request $request, Postingan $postingan)
    {
        $request->validate([
            'nama_postingan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $postingan->gambar = $path;
        }

        $postingan->nama_postingan = $request->nama_postingan;
        $postingan->save();

        return redirect()->route('postingan.index')->with('success', 'Postingan updated successfully.');
    }

    public function destroy(Postingan $postingan)
    {
        // Check if the authenticated user is the owner of the post
        if ($postingan->user_id !== auth()->id()) {
            return redirect()->route('postingan.index')->withErrors(['error' => 'You are not authorized to delete this post.']);
        }

        // If authorized, delete the post
        $postingan->delete();

        return redirect()->route('postingan.index')->with('success', 'Postingan deleted successfully.');
    }

   public function like($id)
{
    $like = Like::where('postingan_id', $id)->where('user_id', auth()->id())->first();

    if ($like) {
        $like->delete();
        return back()->with('success', 'You unliked this posting.');
    } else {
        // Jika belum ada, tambahkan like
        Like::create([
            'postingan_id' => $id,
            'user_id' => auth()->id(),
        ]);
        return back()->with('success', 'You liked this posting.');
    }
}


    public function comment(Request $request, $id)
    {
        $request->validate([
            'nama_komentar' => 'required|string|max:255',
            'gambar_komentar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload for the comment image if provided
        $path = null;
        if ($request->hasFile('gambar_komentar')) {
            $path = $request->file('gambar_komentar')->store('images/comments', 'public');
        }

        // Create a new comment
        Komentar::create([
            'postingan_id' => $id,
            'user_id' => auth()->id(),
            'nama_komentar' => $request->nama_komentar,
            'gambar_komentar' => $path,
        ]);

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
