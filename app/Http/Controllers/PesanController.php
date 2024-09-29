<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;
use App\Models\KategoriPesan;
use App\Models\User; // Pastikan model User diimpor
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PesanController extends Controller
{
    /**
     * Tampilkan daftar pesan yang masuk (Inbox).
     */
    public function inbox()
    {
        $user = Auth::user();
        $inbox = Pesan::where('penerima', $user->email)->orderBy('created_at', 'desc')->get();
        return view('dashboard.email.inbox', compact('inbox'));
    }

    /**
     * Tampilkan daftar pesan yang dikirim (Sent).
     */
    public function sent()
    {
        $user = Auth::user();
        $sent = Pesan::where('pengirim', $user->email)->orderBy('created_at', 'desc')->get();
        return view('dashboard.email.sent', compact('sent'));
    }

    /**
     * Tampilkan form untuk mengirim pesan.
     */
public function create()
{
    $kategori = KategoriPesan::all();
    $user = Auth::user(); // Ambil pengguna yang sedang login
    $users = User::all(); // Ambil semua pengguna
    return view('dashboard.email.create', data: compact('kategori', 'users', 'user'));
}


    /**
     * Simpan pesan yang dikirim.
     */
    public function store(Request $request)
    {
        $request->validate([
            'penerima' => 'required|email',
            'nama_pesan' => 'required|string',
            'kategori_pesan_id' => 'required|exists:kategori_pesan,id',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip|max:2048',
        ]);

        $data = $request->only(['penerima', 'nama_pesan', 'kategori_pesan_id']);
        $data['pengirim'] = Auth::user()->email;

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('attachments', 'public');
        }

        Pesan::create($data);

        return redirect()->route('sent')->with('success', 'Pesan berhasil dikirim.');
    }

    /**
     * Tampilkan detail pesan.
     */
    public function show($id)
    {
        $pesan = Pesan::findOrFail($id);
        $this->authorize('view', $pesan); // Pastikan hanya penerima atau pengirim yang dapat melihat
        return view('dashboard.email.show', compact('pesan'));
    }

    /**
     * Tampilkan form untuk membalas pesan.
     */
    public function reply($id)
    {
        $pesan = Pesan::findOrFail($id);
        $this->authorize('reply', $pesan); // Pastikan hanya penerima yang dapat membalas
        $kategori = KategoriPesan::all();
        return view('dashboard.email.reply', compact('pesan', 'kategori'));
    }

    /**
     * Simpan balasan pesan.
     */
    public function sendReply(Request $request, $id)
    {
        $pesanOriginal = Pesan::findOrFail($id);
        $this->authorize('reply', $pesanOriginal); // Pastikan hanya penerima yang dapat membalas

        $request->validate([
            'nama_pesan' => 'required|string',
            'kategori_pesan_id' => 'required|exists:kategori_pesan,id',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,zip|max:2048',
        ]);

        $data = $request->only(['nama_pesan', 'kategori_pesan_id']);
        $data['pengirim'] = Auth::user()->email;
        $data['penerima'] = $pesanOriginal->pengirim;

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('attachments', 'public');
        }

        Pesan::create($data);

        return redirect()->route('inbox')->with('success', 'Balasan pesan berhasil dikirim.');
    }

    /**
     * Hapus pesan.
     */
/**
 * Hapus pesan.
 */
public function destroy($id)
{
    $pesan = Pesan::findOrFail($id);
    $this->authorize('delete', $pesan); // Pastikan hanya penerima atau pengirim yang dapat menghapus

    // Hapus file lampiran jika ada
    if ($pesan->file) {
        Storage::disk('public')->delete($pesan->file);
    }

    // Cek apakah pesan ini di inbox
    if ($pesan->penerima === Auth::user()->email) {
        // Jika pesan dihapus dari inbox, hanya hapus pesan tersebut
        $pesan->delete();
    } else {
        // Jika pesan dihapus dari sent, hapus juga dari inbox
        // Menggunakan where untuk menemukan pesan di inbox berdasarkan penerima dan pengirim
        Pesan::where('pengirim', $pesan->pengirim)
            ->where('penerima', $pesan->penerima)
            ->delete(); // Menghapus dari inbox
    }

    return redirect()->back()->with('success', 'Pesan berhasil dihapus.');
}


}
