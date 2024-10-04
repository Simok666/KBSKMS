@extends('admin.layout.admin')

@section('title', 'Jabatan Struktural')
@section('title_page', 'Jabatan Struktural')
@section('desc_page', 'List semua Jabatan Struktural')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title"></h4>
        <button type="submit" style="float: right" class="btn btn-primary btn-add-jabatan">Tambah Jabatan</button>
    </div>
    <div class="card-body">
        @include('admin.components.table-pagenation', ['table' => 'kategoris' , 'url' => '/api/v1/admin/jabatan' , 'headers' => [
            "Jenis Jabatan",
            "Nama Jabatan",
            "Action"
        ] , 'pagination' => true])
    </div>
</div>

<div class="modal fade text-left" id="modal-add-jabatan" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel4" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel4">Add Data Jabatan</h4>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-add-jabatan">
                    {{-- <input type="hidden" name="user_id"> --}}
                    <table class="table table-striped table-komponent after-loading">
                        <tbody>
                            <tr>
                                <th>Jenis Jabatan</th>
                                <td>
                                    <select name="repeater[0][jenis_jabatan]" class="form-control" required>
                                        <option value=""  selected>Pilih Jenis Jabatan</option>
                                        <option value="Kepala Eselon 1">Kepala Eselon 1</option>
                                        <option value="Kepala Eselon 2">Kepala Eselon 2</option>
                                        <option value="Kepala Eselon 3">Kepala Eselon 3</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Jabatan</th>
                                <td>
                                    <input type="text" name="repeater[0][nama_jabatan]" class="form-control" required>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" form="form-add-jabatan" class="btn btn-primary ml-1">
                    <span class="d-none d-sm-block">Accept</span>
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade text-left" id="detailJabatan" tabindex="-1" role="dialog"
    aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title white" id="">
                    Detail Jabatan
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
                            <th>Jenis Jabatan</th>
                            <td data-bind-jenis_jabatan></td>
                        </tr>
                        <tr>
                            <th>Nama Jabatan</th>
                            <td data-bind-nama_jabatan></td>
                        </tr>
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

<div class="modal fade text-left" id="editJabatan" tabindex="-1" role="dialog"
    aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title white" id="">
                    Edit Jabatan
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-jabatan">
                    <div class="text-center loading">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden"></span>
                        </div>
                    </div>

                    <table class="table table-striped after-loading">
                        <tbody>
                            <tr>
                                <th>Jenis Jabatan</th>
                                <td >
                                    <input type="hidden" name="repeater[0][id]"  class="form-control" data-bind-id value="">
                                    <select name="repeater[0][jenis_jabatan]" class="form-control" data-bind-jenis_jabatan value="" required>
                                        <option value=""  selected>Pilih Jenis Jabatan</option>
                                        <option value="Kepala Eselon 1">Kepala Eselon 1</option>
                                        <option value="Kepala Eselon 2">Kepala Eselon 2</option>
                                        <option value="Kepala Eselon 3">Kepala Eselon 3</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Jabatan</th>
                                <td >
                                    <input type="text" name="repeater[0][nama_jabatan]" value="" class="form-control" data-bind-nama_jabatan value="" required>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" form="form-edit-jabatan" class="btn btn-primary ml-1">
                    <span class="d-none d-sm-block">Accept</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        GetData(req,"kategoris", formatkategoris);
    });

    function formatkategoris(data) {
        var result = "";
        $.each(data, function(index, data) {
            
            result += `
                <tr>
                    <td>${data.jenis_jabatan}</td>
                    <td>${data.nama_jabatan}</td>
                    <td>
                        <a href="#" class="btn btn-info btn-icon btn-sm btn-detail" title="Detail" data-name="${data.nama_jabatan}" data-id="${data.id}"><span class="bi bi-info-circle"> </span></a>
                        <a href="#" class="btn btn-warning btn-icon btn-sm btn-edit" title="Detail" data-id="${data.id}"><span class="bi bi-pencil"> </span></a>
                    </td>
                </tr>
            `
        });
        return result;
    }

    $(document).on('click', '.openPopup', function() {
        window.open($(this).attr('link'), 'popup', 'width=800,height=600');
    })

    $(document).on('click', '.btn-verify', function() {
        $('#name').html($(this).data('name'));
        $('#email').html($(this).data('email'));
        $('#user_id').val($(this).data('id'));
    });

    $(document).on('click', '.btn-add-jabatan', function() {
        $('#modal-add-jabatan').modal('show');
        $('#modal-add-jabatan').find('form')[0].reset();
    });

    $("#form-add-jabatan").on('submit', function(e) {
        e.preventDefault();
        const url = `${baseUrl}/api/v1/admin/addOrUpdateJabatan`;
        const data = new FormData(this);
        loadingButton($(this))
        ajaxDataFile(url, 'POST', data, function(resp) {
            toast("Data has been saved");
            $('#modal-add-jabatan').modal('hide');
            window.location.reload();
            loadingButton($("#form-add-jabatan"), false)
        }, function(data) {
            loadingButton($("#form-add-jabatan"), false)
        });
    });
    
    $(document).on('click', '.btn-detail', function() {
        $('#detailJabatan').modal('show');
        loading($("#detailJabatan") , true);
        ajaxData(`${baseUrl}/api/v1/admin/jabatan`, 'GET', {
            "id" : $(this).data('id')
        }, function(resp) {
            loading($("#detailJabatan") , false);
            if (empty(resp.data)) {
                toast("Data not found", 'warning');
                $('#detailJabatan').modal('hide');
            }

            let result = resp.data[0];
            $.each(result, function(index, data) {
                if (index == "image") return;
                $('#detailJabatan').find(`[data-bind-${index}]`).html(data);
            });

            if (!empty(result.icon)) {
                result.icon.forEach(function(image) {
                    $('#detailJabatan').find('[data-bind-icon]').html(`<a href="${image.url}" target="_blank">View Image</a>`);
                });
            } else {
                $('#detailJabatan').find('[data-bind-icon]').html(`-`);
            }

        },
        function() {
            loading($("#detailJabatan"));
            setTimeout(function() {
                $('#detailJabatan').modal('hide');
            }, 1000);
        });
    });

    $(document).on('click', '.btn-edit', function() {
        $('#editJabatan').modal('show');
        loading($("#editJabatan") , true);
        ajaxData(`${baseUrl}/api/v1/admin/jabatan`, 'GET', {
            "id" : $(this).data('id')
        }, function(resp) {
            loading($("#editJabatan") , false);
            if (empty(resp.data)) {
                toast("Data not found", 'warning');
                $('#editJabatan').modal('hide');
            }

            let result = resp.data[0];
            $.each(result, function(index, data) {
                if (index == "image") return;
                $('#editJabatan').find(`[data-bind-${index}]`).val(data).attr('value', data);
            });

        },
        function() {
            loading($("#editJabatan"));
            setTimeout(function() {
                $('#editJabatan').modal('hide');
            }, 1000);
        });
    });

    $("#form-edit-jabatan").on('submit', function(e) {
        e.preventDefault();
        const url = `${baseUrl}/api/v1/admin/addOrUpdateJabatan`;
        const data = new FormData(this);
        loadingButton($(this))
        ajaxDataFile(url, 'POST', data, function(resp) {
            toast("Data has been saved");
            $('#editJabatan').modal('hide');
            window.location.reload();
            loadingButton($("#form-edit-jabatan"), false)
        }, function(data) {
            loadingButton($("#form-edit-jabatan"), false)
        });
    });
</script>
@endsection