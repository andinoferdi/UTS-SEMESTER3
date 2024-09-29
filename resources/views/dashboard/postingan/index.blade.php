@extends('dashboard.layouts.main', ['title' => 'Postingan | Index'])

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <small class="text-muted fs-7 fw-bold my-1 ms-1"> Postingan</small>
                    </h1>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <h2 class="card-title">Daftar Postingan</h2>
                        <div class="card-toolbar">
                            <a href="{{ route('postingan.create') }}" class="btn btn-primary mb-3">
                                <i class="fa fa-plus"></i> Tambah Postingan
                            </a>
                        </div>
                    </div>
                    <div class="card-body">


                        @if ($postings->isEmpty())
                            <div class="alert alert-warning">Tidak ada postingan.</div>
                        @else
                            @foreach ($postings as $post)
                                <div class="post mb-4 border p-3 rounded">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ isset($post->user->foto) ? asset('storage/' . $post->user->foto) : asset('assets/media/avatars/blank.png') }}"
                                                alt="User Photo" class="rounded-circle me-2"
                                                style="width: 40px; height: 40px;">
                                            <div>
                                                <strong>{{ $post->user->name }}</strong>
                                                <span class="text-muted">({{ $post->created_at->diffForHumans() }})</span>
                                            </div>
                                        </div>

                                        <div>
                                            <form action="{{ route('postingan.like', $post->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary btn-sm">Like</button>
                                            </form>

                                            @if ($post->user_id == auth()->id())
                                                <a href="{{ route('postingan.edit', $post->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>

                                                <!-- Delete button -->
                                                <form action="{{ route('postingan.destroy', $post->id) }}" method="POST"
                                                    style="display: inline;"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus postingan ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>

                                    <h5 class="mt-3">{{ $post->nama_postingan }}</h5>

                                    @if ($post->gambar)
                                        <img src="{{ asset('storage/' . $post->gambar) }}" class="img-fluid mb-2"
                                            alt="Post Image">
                                    @endif

                                    <p>{{ $post->likes->count() }} Likes</p>

                                    <div class="comments">
                                        <h6>Komentar:</h6>
                                        @foreach ($post->komentars as $comment)
                                            <div class="comment border p-2 rounded mb-2">
                                                <div class="d-flex align-items-start">
                                                    <img src="{{ isset($comment->user->foto) ? asset('storage/' . $comment->user->foto) : asset('assets/media/avatars/blank.png') }}"
                                                        alt="User Photo" class="rounded-circle me-2"
                                                        style="width: 30px; height: 30px;">
                                                    <div>
                                                        <strong>{{ $comment->user->name }}</strong>:
                                                        <div>{{ $comment->nama_komentar }}</div>

                                                        @if ($comment->gambar_komentar)
                                                            <img src="{{ asset('storage/' . $comment->gambar_komentar) }}"
                                                                class="img-fluid mt-2" alt="Comment Image">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <form id="commentForm-{{ $post->id }}" method="POST"
                                            enctype="multipart/form-data"
                                            action="{{ route('postingan.comment', $post->id) }}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="text" name="nama_komentar" class="form-control"
                                                    placeholder="Tulis komentar..." required autocomplete="off">
                                                <input type="file" name="gambar_komentar" class="form-control"
                                                    accept="image/*">
                                                <button class="btn btn-outline-secondary" type="submit">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('form[id^="commentForm-"]').on('submit', function(e) {
                e.preventDefault(); // Mencegah pengalihan halaman
                const formData = new FormData(this);
                const url = $(this).attr('action');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        const postId = url.split('/').pop(); // Mengambil ID postingan dari URL
                        // Append new comment to the comments section
                        $('#commentForm-' + postId + ' .comments').append(`
                            <div class="comment border p-2 rounded mb-2">
                                <div class="d-flex align-items-start">
                                    <img src="${response.user.photo}" alt="User Photo" class="rounded-circle me-2" style="width: 30px; height: 30px;">
                                    <div>
                                        <strong>${response.user.name}</strong>:
                                        <div>${response.nama_komentar}</div>
                                        ${response.gambar_komentar ? `<img src="${response.gambar_komentar}" class="img-fluid mt-2" alt="Comment Image">` : ''}
                                    </div>
                                </div>
                            </div>
                        `);
                        // Clear input fields
                        $('#commentForm-' + postId + ' input[name="nama_komentar"]').val('');
                        $('#commentForm-' + postId + ' input[name="gambar_komentar"]').val('');
                    },
                    error: function(err) {
                        console.error(err);
                    }
                });
            });
        });
    </script>
@endsection
