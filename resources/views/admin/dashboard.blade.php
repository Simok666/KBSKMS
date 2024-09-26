@extends('admin.layout.admin')

@section('title', 'Dashboard')
@section('title_page', 'Dashboard')
@section('desc_page', '')
@section('content')
<div class="card pleno d-none">
    <div class="card-body">

    </div>
</div>
<div class="card google-form d-none">
    <div class="card-body">
        <form id="form-google">
            <input type="hidden">
            <table class="table after-loading">
                <tbody>
                    <tr>
                        <th width="30%">Link Google Form 1</th>
                        <td class="link-google-form-0">
                            <a href="" target="_blank" class="">Link Google Form</a>
                        </td>
                    </tr>
                    <tr>
                        <th width="30%">Link Google Form 2</th>
                        <td class="link-google-form-1">
                            <a href="" target="_blank" class="">Link Google Form</a>
                        </td>
                    </tr>
                    <tr>
                        <th width="30%">Link Google Form 3</th>
                        <td class="link-google-form-2">
                            <a href="" target="_blank" class="">Link Google Form</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Upload Bukti SS Google Form 1</th>
                        <td>
                            <input type="file" name="repeater[0][bukti_googleform]" class="form-control">
                            <input type="hidden" name="is_upload_google_form" value="1" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th>Upload Bukti SS Google Form 2</th>
                        <td>
                            <input type="file" name="repeater[1][bukti_googleform]" class="form-control">
                            {{-- <input type="hidden" name="is_upload_google_form" value="1" class="form-control"> --}}
                        </td>
                    </tr>
                    <tr>
                        <th>Upload Bukti SS Google Form 3</th>
                        <td>
                            <input type="file" name="repeater[2][bukti_googleform]" class="form-control">
                            {{-- <input type="hidden" name="is_upload_google_form" value="1" class="form-control"> --}}
                        </td>
                    </tr>
                </tbody>
                
            </table>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="bi bi-journal-album" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah konten</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="bi bi-cloud-upload" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah konten publish</h6>
                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="bi bi-file-check" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah konten diverifikasi</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="bi bi-star" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah konten dimanfaatkan</h6>
                                    <h6 class="font-extrabold mb-0">112</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="bi bi-1-circle" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Poin kinerja individu</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="bi bi-journal-album" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Poin kinerja eselon 3</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="bi bi-journal-album" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Poin kinerja eselon 2</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="bi bi-journal-album" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Poin kinerja eselon 1</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center"> 
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5 d-flex justify-content-center align-items-center"> 
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center">
                                        <div class="stats-icon red mb-2">
                                            <i class="bi bi-journal-album" style="width: 25px; height: 30px;"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center"> 
                                        <h6 class="text-muted font-semibold">Jumlah konten kolaborasi</h6>
                                        <h6 class="font-extrabold mb-0">112.000</h6>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </section>
</div>



@endsection