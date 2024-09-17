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
<div class="card pleno">
    <div class="card-header">
        <h4 class="card-title">List Pleno</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="pull-right">Status</label>
                    <select class="form-select form-control dropdown-status" name="status">
                        <option value="" selected>Semua</option>
                        <option value="Baru">Baru</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>
            </div>
        </div>
        {{-- @include('components.table-pagenation', ['table' => 'pleno2 d-none pleno' , 'url' => '/api/v1/getPlenoFinal' , 'headers' => [
        "No",
        "Pic Name",
        "Pic email",
        "Grade",
        "Bukti Evaluasi",
        "Action"
        ] , 'pagination' => true]) --}}
    </div>
</div>


<div class="modal fade text-left" id="pleno-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel4">Detail Pleno</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-komponent after-loading detail-pleno">
                    <thead>
                        <tr>
                            <td class="text-center">Nama File</td>
                            <td class="text-center">File</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection