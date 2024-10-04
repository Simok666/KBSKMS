@extends('admin.layout.admin')

@section('title', 'Dashboard')
@section('title_page', 'Dashboard')
@section('desc_page', '')
@section('content')
@section('styles')
    <style>
        .icon-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); 
            gap: 10px;
        }
    </style>
@endsection
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
            <div class="row" id="contributor-dashboard">
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
                                        <i class="bi bi-bookmark-star" style="width: 25px; height: 30px;"></i>
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
                                        <i class="bi bi-clipboard-minus" style="width: 25px; height: 30px;"></i>
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
                                        <i class="bi bi-clipboard-plus" style="width: 25px; height: 30px;"></i>
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
                                        <i class="bi bi-clipboard" style="width: 25px; height: 30px;"></i>
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
                                            <i class="bi bi-clipboard-x" style="width: 25px; height: 30px;"></i>
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
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-body py-4 px-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('admin/static/images/faces/1.jpg') }}" alt="Face 1">
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">John Duck</h5>
                                    <h6 class="text-muted mb-0">Nip: </h6><p>123901293</p>
                                    <h6 class="text-muted mb-0">Bidang Keahlian: </h6><p>123901293</p>
                                    <h6 class="text-muted mb-0">Background Bidang Pendidikan: </h6><p>123901293</p>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Badge Kontributor</h4>
                        </div>
                        <div class="card-content pb-4">
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg justify-content-center">
                                    <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                        <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                    </div>
                                    <div class="stats-icon red mb-2" style="margin-right: 2px;">
                                        <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                    </div>
                                    <div class="stats-icon red mb-2" style="margin-right: 2px;">
                                        <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                    </div>
                                    <div class="stats-icon red mb-2" style="margin-right: 2px;">
                                        <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4">
                                <button class='btn btn-block btn-xl btn-outline-primary font-bold mt-3' disabled>KM Enthusiast</button>
                            </div>
                        </div>
                    </div> 
                </div>                
            </div>
        </div>
    </section>
</div>
<div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row" id="verificator-dashboard">
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="bi bi-journal-album" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah konten yang ditugaskan</h6>
                                    <h6 class="font-extrabold mb-0">112.000</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="bi bi-cloud-upload" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah konten yang sedang diverifikasi</h6>
                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="bi bi-file-check" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">yang sudah diverifikasi dan dipublish</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-body py-4 px-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('admin/static/images/faces/1.jpg') }}" alt="Face 1">
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">John Duck</h5>
                                    <h6 class="text-muted mb-0">Nip: </h6><p>123901293</p>
                                    <h6 class="text-muted mb-0">Bidang Keahlian: </h6><p>123901293</p>
                                    <h6 class="text-muted mb-0">Background Bidang Pendidikan: </h6><p>123901293</p>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Badge Verificator</h4>
                        </div>
                        <div class="card-content pb-4">
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                        <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                    </div>
                                    <div class="stats-icon red mb-2" style="margin-right: 2px;">
                                        <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                    </div>
                                    <div class="stats-icon red mb-2" style="margin-right: 2px;">
                                        <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                    </div>
                                    <div class="stats-icon red mb-2" style="margin-right: 2px;">
                                        <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4">
                                <button class='btn btn-block btn-xl btn-outline-primary font-bold mt-3' disabled>KM Enthusiast</button>
                            </div>
                        </div>
                    </div> 
                </div>        
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<script> 
    $(document).ready(function() {
        setTimeout(function() {
            let role = session('role');
            let contributor = session('data-role-contributor');
            let verificator = session('data-role-verificator');
           
        
        let contributorDashboard = $('#contributor-dashboard').empty();
        let verificatorDashboard = $('#verificator-dashboard').empty();
        // let badgeContributor = $('#badge-contributor').empty();

        if (role == 'admin' || contributor == 'ada') {
            let url = `${baseUrl}/api/v1/dashboard`;

            ajaxData(url, 'GET', [], function(resp) {
                let isEselon1 = resp.isEselon1;
                let isEselon2 = resp.isEselon2;
                
                
                let contributorItem = 
                `
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
                                        <h6 class="font-extrabold mb-0">${resp.jumlah_konten}</h6>
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
                                        <h6 class="font-extrabold mb-0">${resp.jumlah_konten_publish}</h6>
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
                                        <h6 class="font-extrabold mb-0">${resp.jumlah_konten_verifikasi}</h6>
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
                                        <h6 class="font-extrabold mb-0">${resp.jumlah_konten_aktifitas}</h6>
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
                                            <i class="bi bi-bookmark-star" style="width: 25px; height: 30px;"></i>
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
                                            <i class="bi bi-clipboard-minus" style="width: 25px; height: 30px;"></i>
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
                                            <i class="bi bi-clipboard-plus" style="width: 25px; height: 30px;"></i>
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
                                            <i class="bi bi-clipboard" style="width: 25px; height: 30px;"></i>
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
                                                <i class="bi bi-clipboard-x" style="width: 25px; height: 30px;"></i>
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
                `;
                contributorDashboard.append(contributorItem);
                
                if (contributor == 'ada') {
                    let contributorProfileItem = `
                    <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body py-4 px-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                    <img src="${resp.data_user.image_profile.length !== 0 ? resp.data_user.image_profile[0].url : `{{ asset('admin/static/images/faces/1.jpg') }}` }" alt="Face 1">
                                </div>
                                <div class="ms-3 name">
                                    <h5 class="font-bold">${resp.data_user.name}</h5>
                                    <h6 class="text-muted mb-0">Nip: </h6><p>${resp.data_user.nip}</p>
                                    <h6 class="text-muted mb-0">Bidang Keahlian: </h6><p>${resp.data_user.bidang_keahlian}</p>
                                    <h6 class="text-muted mb-0">Background Bidang Pendidikan: </h6><p>${resp.data_user.bidang_pendidikan}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Badge Kontributor</h4>
                        </div>
                        <div class="card-content pb-4">
                            ${ 
                                resp.data_user.badge_contributor == null ? `<div class="px-4">
                                <button class='btn btn-block btn-xl btn-outline-primary font-bold mt-3' disabled>Belum Ada Badge</button>
                                </div>` 
                            : 
                            `<div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                      ${(() => {
                                        switch (resp.data_user.badge_contributor_id) {
                                            case 1:
                                                return `<div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>`
                                            break;
                                            case 2:
                                                return `<div class="stats-icon red mb-2" style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                `
                                            case 3:
                                                return `<div class="stats-icon red mb-2" style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                `
                                            case 4:
                                                return `<div class="stats-icon red mb-2" style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                `
                                            default:
                                                return '';
                                        }
                                    })()}
                                </div>
                            </div>
                            <div class="px-4">
                                <button class='btn btn-block btn-xl btn-outline-primary font-bold mt-3' disabled>${resp.data_user.badge_contributor.badge_name}</button>
                            </div>
                            `
                            }
                        </div>
                    </div> 
                </div>
                        `;
                        contributorDashboard.append(contributorProfileItem);
                }
                if(isEselon1 && isEselon2 == false){
                    let eselon2 = resp.bawahan_eselon.eselon_2;
                    let eselon3 = resp.bawahan_eselon.eselon_3;
                    let eselon2Item = ``;
                    let eselon3Item = ``;
                    eselon2.forEach(item => {
                        eselon2Item += `
                         <div class="col-12 col-lg-6">
                             <div class="card">
                                 <div class="card-body py-4 px-4">
                                     <div class="d-flex align-items-center">
                                         <div class="ms-3 name">
                                             <h5 class="font-bold">Eselon 2</h5>
                                             <h6 class="text-muted mb-0">Name: </h6><p>${item.nama}</p>
                                             <h6 class="text-muted mb-0">Nip: </h6><p>${item.nip}</p>
                                         </div>
                                         <div class="ms-3 icon">
                                            <div class="icon-grid">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon blue mb-2">
                                                        <i class="bi bi-cloud-upload" style="width: 25px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Jumlah konten publish</h6>
                                                    <h6 class="font-extrabold mb-0">${item.konten_publish_count}</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon red mb-2">
                                                        <i class="bi bi-clipboard-minus" style="width: 25px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Poin yang di hasilkan</h6>
                                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon green mb-2">
                                                        <i class="bi bi-file-check" style="width: 25px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Jumlah Konten verifikasi</h6>
                                                    <h6 class="font-extrabold mb-0">${item.konten_verifikasi_count}</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon purple mb-2">
                                                        <i class="bi bi-star" style="width: 25px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Jumlah Konten aktifitas</h6>
                                                    <h6 class="font-extrabold mb-0">${item.konten_count_aktifitas}</h6>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
 
                     `;
                    });
                    contributorDashboard.append(eselon2Item);
                    
                    eselon3.forEach(item => {
                        eselon3Item += `
                         <div class="col-12 col-lg-6">
                             <div class="card">
                                 <div class="card-body py-4 px-4">
                                     <div class="d-flex align-items-center">
                                         <div class="ms-3 name">
                                             <h5 class="font-bold">Eselon 3</h5>
                                             <h6 class="text-muted mb-0">Name: </h6><p>${item.nama}</p>
                                             <h6 class="text-muted mb-0">Nip: </h6><p>${item.nip}</p>
                                         </div>
                                         <div class="ms-3 icon">
                                            <div class="icon-grid">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon blue mb-2">
                                                        <i class="bi bi-cloud-upload" style="width: 25px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Jumlah konten publish</h6>
                                                    <h6 class="font-extrabold mb-0">${item.konten_publish_count}</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon red mb-2">
                                                        <i class="bi bi-clipboard-minus" style="width: 25px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Poin yang di hasilkan</h6>
                                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon green mb-2">
                                                        <i class="bi bi-file-check" style="width: 25px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Jumlah Konten verifikasi</h6>
                                                    <h6 class="font-extrabold mb-0">${item.konten_verifikasi_count}</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon purple mb-2">
                                                        <i class="bi bi-star" style="width: 25px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Jumlah Konten aktifitas</h6>
                                                    <h6 class="font-extrabold mb-0">${item.konten_count_aktifitas}</h6>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
 
                     `;
                    });
                    // <div class="col-12 col-lg-6">
                    //         <div class="card">
                    //             <div class="card-body py-4 px-4">
                    //                 <div class="d-flex align-items-center">
                    //                     <div class="ms-3 name">
                    //                         <h5 class="font-bold">Jancok 1</h5>
                    //                         <h6 class="text-muted mb-0">Nip: </h6><p>123</p>
                    //                         <h6 class="text-muted mb-0">Bidang Keahlian: </h6><p>123123</p>
                    //                         <h6 class="text-muted mb-0">Background Bidang Pendidikan: </h6><p>124123</p>
                    //                     </div>
                    //                 </div>
                    //             </div>
                    //         </div>
                    //     </div>
                    contributorDashboard.append(eselon3Item);
                } else {
                    let eselonBawahan = resp.bawahan_eselon;
                    let eselonBawahanItem = '';
                    eselonBawahan.forEach(item => {
                        
                        eselonBawahanItem += `
                         <div class="col-12 col-lg-6">
                             <div class="card">
                                 <div class="card-body py-4 px-4">
                                     <div class="d-flex align-items-center">
                                         <div class="ms-3 name">
                                             <h5 class="font-bold">Eselon 3</h5>
                                             <h6 class="text-muted mb-0">Name: </h6><p>${item.nama}</p>
                                             <h6 class="text-muted mb-0">Nip: </h6><p>${item.nip}</p>
                                         </div>
                                         <div class="ms-3 icon">
                                            <div class="icon-grid">
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon blue mb-2">
                                                        <i class="bi bi-cloud-upload" style="width: 25px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Jumlah konten publish</h6>
                                                    <h6 class="font-extrabold mb-0">${item.konten_publish_count}</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon red mb-2">
                                                        <i class="bi bi-clipboard-minus" style="width: 25px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Poin yang di hasilkan</h6>
                                                    <h6 class="font-extrabold mb-0">183.000</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon green mb-2">
                                                        <i class="bi bi-file-check" style="width: 25px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Jumlah Konten verifikasi</h6>
                                                    <h6 class="font-extrabold mb-0">${item.konten_verifikasi_count}</h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                    <div class="stats-icon purple mb-2">
                                                        <i class="bi bi-star" style="width: 25px; height: 30px;"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                    <h6 class="text-muted font-semibold">Jumlah Konten aktifitas</h6>
                                                    <h6 class="font-extrabold mb-0">${item.konten_count_aktifitas}</h6>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
 
                     `;
                    contributorDashboard.append(eselonBawahanItem);

                    });
                }
                
            });

        }
        if (role == 'admin' || verificator == 'ada') { 
            let urlVerifikator = `${baseUrl}/api/v1/dashboardVerifikator`;
            ajaxData(urlVerifikator, 'GET', [], function(resp) {
                
                let verificatorItem = 
                `
                    <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="bi bi-journal-album" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah konten yang ditugaskan</h6>
                                    <h6 class="font-extrabold mb-0">${resp.jumlah_konten_belum_verifikasi}</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="bi bi-cloud-upload" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah konten yang sedang diverifikasi</h6>
                                    <h6 class="font-extrabold mb-0">${resp.jumlah_konten_sedang_diverifikasi}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="bi bi-file-check" style="width: 25px; height: 30px;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">yang sudah diverifikasi dan dipublish</h6>
                                    <h6 class="font-extrabold mb-0">${resp.jumlah_konten_sudah_dipublish}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                verificatorDashboard.append(verificatorItem);

                if(verificator == 'ada') {
                    let verificatorProfileItem = `
                        <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="${resp.data_user.image_profile.length !== 0 ? resp.data_user.image_profile[0].url : `{{ asset('admin/static/images/faces/1.jpg') }}` }" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">${resp.data_user.name}</h5>
                                        <h6 class="text-muted mb-0">Nip: </h6><p>${resp.data_user.nip}</p>
                                        <h6 class="text-muted mb-0">Bidang Keahlian: </h6><p>${resp.data_user.bidang_keahlian}</p>
                                        <h6 class="text-muted mb-0">Background Bidang Pendidikan: </h6><p>${resp.data_user.bidang_pendidikan}</p>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Badge Verificator</h4>
                            </div>
                            <div class="card-content pb-4">
                                ${ 
                                resp.data_user.badge_verificator == null ? `<div class="px-4">
                                <button class='btn btn-block btn-xl btn-outline-primary font-bold mt-3' disabled>Belum Ada Badge</button>
                                </div>` 
                            : 
                            `<div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                      ${(() => {
                                        switch (resp.data_user.badge_verificator_id) {
                                            case 1:
                                                return `<div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>`
                                            break;
                                            case 2:
                                                return `<div class="stats-icon red mb-2" style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                `
                                            case 3:
                                                return `<div class="stats-icon red mb-2" style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                `
                                            case 4:
                                                return `<div class="stats-icon red mb-2" style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                <div class="stats-icon red mb-2 " style="margin-right: 2px;">
                                                    <i class="bi bi-star-fill" style="width: 25px; height: 30px;"></i>
                                                </div>
                                                `
                                            default:
                                                return '';
                                        }
                                    })()}
                                </div>
                            </div>
                            <div class="px-4">
                                <button class='btn btn-block btn-xl btn-outline-primary font-bold mt-3' disabled>${resp.data_user.badge_verificator.badge_name}</button>
                            </div>
                            `
                            }
                            </div>
                        </div> 
                    </div>
                    `
                    verificatorDashboard.append(verificatorProfileItem);
                }
            });
        }
    }, 1000);
        
        
    });
</script>
@endsection