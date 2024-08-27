@extends('admin.layout.admin')

@section('title', 'Users')
@section('title_page', 'Users')
@section('desc_page', 'List of all users')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title"></h4>
    </div>
    <div class="card-body">
        @include('admin.components.table-pagenation', ['table' => 'users' , 'url' => '/api/v1/admin/users' , 'headers' => [
            "Nama",
            "Email",
            "Nip",
            "Status",
            "Action"
        ] , 'pagination' => true])
    </div>
</div>

<!-- modal -->
<div class="modal fade text-left" id="warning" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel140" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title white" id="myModalLabel140">
                    Verifikasi User
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin mengaktifkan user ini? <br>
                <span class="">Name: <strong id="name"></strong></span><br>
                <span class="">Email: <strong id="email"></strong></span>
                <form action="index.html" id="user-verify">
                    <input type="hidden" name="id" id="user_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>

                <button type="submit" form="user-verify" class="btn btn-warning ml-1">
                    <span class="d-none d-sm-block label-submit">Accept</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="detailUser" tabindex="-1" role="dialog"
    aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title white" id="">
                    Detail User
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center loading">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </div>

                <table class="table table-striped after-loading">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td data-bind-nama></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td data-bind-email></td>
                        </tr>
                        <tr>
                            <th>Nip</th>
                            <td data-bind-nip></td>
                        </tr>
                        <tr>
                            <th>Satuan Kerja Eselon 1</th>
                            <td data-bind-satuan_kerja_eselon_1></td>
                        </tr>
                        <tr>
                            <th>Satuan Kerja Eselon 2</th>
                            <td data-bind-satuan_kerja_eselon_2></td>
                        </tr>
                        <tr>
                            <th>Satuan Kerja Eselon 3</th>
                            <td data-bind-satuan_kerja_eselon_3></td>
                        </tr>
                        <tr>
                            <th>Nama jabatan</th>
                            <td data-bind-nama_jabatan></td>
                        </tr>
                        <tr>
                            <th>Fungsi</th>
                            <td data-bind-fungsi></td>
                        </tr>
                        {{-- <tr>
                            <th>Image</th>
                            <td data-bind-image></td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        GetData(req,"users", formatusers);
    });

    function formatusers(data) {
        var result = "";
        $.each(data, function(index, data) {
            console.log(data)
            result += `
                <tr>
                    <td>${data.nama}</td>
                    <td>${data.email}</td>
                    <td>${empty(data.nip) ? "-" : data.nip}</td>
                    <td>
                        ${data.is_verified == '1' ? `<span class="badge bg-success">Verified</span>` : ``}
                        ${data.is_verified == '0' ? `<span class="badge bg-danger">Not Verified</span>` : ``}
                    </td>
                    <td>
                        <a href="#" class="btn btn-info btn-icon btn-sm btn-detail" title="Detail" data-name="${data.nama}" data-email="${data.email}" data-id="${data.id}"><span class="bi bi-info-circle"> </span></a>
                        ${data.is_verified == '0' ? `<a  href="#" data-bs-toggle="modal" data-bs-target="#warning" class="btn btn-warning btn-icon btn-sm btn-verify" title="Verify" data-name="${data.nama}" data-email="${data.email}" data-id="${data.id}"><span class="bi bi-check2"> </span></a>` : ``}
                </tr>
            `
        });
        return result;
    }

    $(document).on('click', '.btn-verify', function() {
        $('#name').html($(this).data('name'));
        $('#email').html($(this).data('email'));
        $('#user_id').val($(this).data('id'));
    });

    $("#user-verify").on('submit', function(e) {
        e.preventDefault();
        let id = $(this).find("#user_id").val();
        let url = `${baseUrl}/api/v1/admin/verified/${id}`;
        let data = {
            "is_verified" : 1
        };
        loadingButton($(this))
        ajaxData(url, 'PUT', data, function(resp) {
            toast(resp.message);
            $('#warning').modal('hide');
            $('#user-verify').trigger('reset');
            loadingButton($("#user-verify"), false)
            GetData(req,"users", formatusers);
        }, function(data) {
            loadingButton($("#user-verify"), false)
        });
    });
    
    $(document).on('click', '.btn-detail', function() {
        $('#detailUser').modal('show');
        loading($("#detailUser") , true);
        ajaxData(`${baseUrl}/api/v1/admin/users`, 'GET', {
            "id" : $(this).data('id')
        }, function(resp) {
            loading($("#detailUser") , false);
            if (empty(resp.data)) {
                toast("Data not found", 'warning');
                $('#detailUser').modal('hide');
            }

            let result = resp.data[0];
            $.each(result, function(index, data) {
                if (index == "image") return;
                $('#detailUser').find(`[data-bind-${index}]`).html(data);
            });

            if (!empty(result.image)) {
                result.image.forEach(function(image) {
                    $('#detailUser').find('[data-bind-image]').html(`<a href="${image.url}" target="_blank">View Image</a>`);
                });
            } else {
                $('#detailUser').find('[data-bind-image]').html(`-`);
            }
        },
        function() {
            loading($("#detailUser"));
            setTimeout(function() {
                $('#detailUser').modal('hide');
            }, 1000);
        });
    });
</script>
@endsection