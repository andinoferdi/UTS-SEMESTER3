 @extends('dashboard.layouts.main', ['title' => 'Satuan | Edit -'])
 @section('container')
     <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
         <div class="toolbar" id="kt_toolbar">
             <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                 <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                     data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                     class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                     <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                         <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                         <small class="text-muted fs-7 fw-bold my-1 ms-1">Tambah Satuan</small>
                     </h1>
                 </div>
             </div>
         </div>


         <div class="row justify-content-center">
             <div class="col-md-10">
                 <div class="card">
                     <div class="card-header" style="margin-top: 40px;">
                         <h2>Edit Satuan</h2>
                     </div>
                     <div class="card-body">
                         <form action="{{ route('satuan.update', $satuan->id) }}" method="POST">
                             @csrf
                             @method('PUT')
                             <div class="form-group">
                                 <label for="nama_satuan">Nama Satuan:</label>
                                 <input type="text" class="form-control" id="nama_satuan" name="nama_satuan"
                                     autocomplete="off" value="{{ $satuan->nama_satuan }}">
                             </div>
                             <button type="submit" class="btn btn-primary mt-3">Update</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     @endsection
