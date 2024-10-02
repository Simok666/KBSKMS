@extends('admin.layout.admin')

@section('title', 'Konten Pengetahuan')
@section('title_page', 'Konten Pengetahuan')
@section('desc_page', 'List semua konten pengetahuan')
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">

    <link rel="stylesheet" href="{{ asset("admin/vendors/summernote/summernote-lite.min.css") }}">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title"></h4>
        <button type="submit" style="float: right" id="add-pengetahuan" class="btn btn-primary btn-add-pengetahuan">Tambah Konten</button>
    </div>
    <div class="card-body">
        @include('admin.components.table-pagenation', ['table' => 'contributors' , 'url' => '/api/v1/pengetahuan' , 'headers' => [
            "Judul",
            "Image Thumbnail",
            "Lampiran",
            "Tipe Konten",
            "Status Konten",
            "Action"
        ] , 'pagination' => true])
    </div>
</div>

<div class="modal fade text-left" id="detailPengetahuan" tabindex="-1" role="dialog"
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
                            <th>Judul</th>
                            <td data-bind-judul></td>
                        </tr>
                        <tr>
                            <th>Dekskripsi</th>
                            <td data-bind-dekskripsi>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control sumernote-perpustakaan" id="summer-note" name="repeater[0][dekskripsi]" placeholder="dekskripsi" required></textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Kategori</th>
                            <td data-bind-nama_kategori></td>
                        </tr>
                        <tr>
                            <th>Nama Sub Kategori</th>
                            <td data-bind-nama_sub_kategori></td>
                        </tr>
                        <tr>
                            <th>Image Thumbnail</th>
                            <td data-bind-image_thumbnail></td>
                        </tr>
                        <tr>
                            <th>Lampiran</th>
                            <td data-bind-upload_lampiran></td>
                        </tr>
                        <tr>
                            <th>Slug Konten</th>
                            <td data-bind-slug></td>
                        </tr>
                        <tr>
                            <th>User Contributor</th>
                            <td data-bind-user_contributor></td>
                        </tr>
                        <tr>
                            <th>Tipe</th>
                            <td data-bind-tipe></td>
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

<div class="modal fade text-left" id="modal-edit-pengetahuan" tabindex="-1" role="dialog"
    aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title white" id="">
                    Edit Pengetahuan
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
                <form class="after-loading" id="form-perpustakaan-edit">
                    <table class="table table-striped after-loading">
                        <tbody>
                            <tr>
                                <th>Judul</th>
                                <td>
                                    <input type="hidden" name="repeater[0][id]"  class="form-control" data-bind-id value="">
                                    <input type="text" name="repeater[0][judul]"  class="form-control" data-bind-judul value="">
                                </td>
                            </tr>
                            <tr>
                                <th>Dekskripsi</th>
                                <td >
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control sumernote-perpustakaan-edit" id="summer-note" name="repeater[0][dekskripsi]" placeholder="dekskripsi" data-bind-dekskripsi value="" required></textarea>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Image Thumbnail</th>
                                <td> 
                                    <input type="file" name="repeater[0][image_thumbnail][]"  class="form-control"  accept="image/*" required>
                                </td>
                            </tr>
                            <tr>
                                <th>Lampiran</th>
                                <td>
                                    <input type="file" name="repeater[0][upload_lampiran][]" class="form-control" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf" required> 
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Slug Konten</th>
                                <td>
                                    <input type="text" name="repeater[0][slug]" class="form-control" data-bind-slug value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori</th>
                                <td>
                                    <select name="repeater[0][id_kategori]" id="kategori-list" class="form-control list-kategori"  data-bind-id_kategori value="" required>
                                        <option value="" selected>Pilih Kategori</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Sub Kategori</th>
                                <td>
                                    <select name="repeater[0][id_sub_kategori]" id="sub-kategori-list" class="form-control list-sub-kategori"  data-bind-id_sub_kategori value="" required>
                                        <option value="" selected>Pilih Kategori</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tag</th>
                                <td>
                                    <input type="text" name="repeater[0][tag]" class="form-control" data-bind-tag value="" required>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">User Contributor</th>
                                <td>
                                    <select name="repeater[0][id_user_contributor]" class="form-control list-user" data-bind-id_user_contributor value="">
                                        <option value="" selected>Tidak ada</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tipe Konten</th>
                                <td>
                                    <select name="repeater[0][tipe]" class="form-control" data-bind-tipe value="" required>
                                        <option value=""  selected>Pilih Tipe</option>
                                        <option value="internal">Internal</option>
                                        <option value="public">Public</option>
                                    </select>
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
                <button type="submit" form="form-perpustakaan-edit" class="btn btn-primary ml-1">
                    <span class="d-none d-sm-block">Accept</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="modal-pengetahuan" tabindex="-1" role="dialog"
    aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title white" id="">
                    Tambah Konten Pengetahuan
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                {{-- <div class="text-center loading">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </div> --}}
                <form class="after-loading" id="form-perpustakaan">
                    <table class="table table-striped ">
                        <tbody>
                            <tr>
                                <th scope="row">Judul</th>
                                <td>
                                    <input type="text" name="repeater[0][judul]" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Dekskripsi</th>
                                <td>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control sumernote-perpustakaan" id="summer-note" name="repeater[0][dekskripsi]" placeholder="dekskripsi" required></textarea>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Image Thumbnail</th>
                                <td> 
                                    <input type="file" name="repeater[0][image_thumbnail][]" class="form-control" accept="image/*" required > 
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Lampiran</th>
                                <td> 
                                    <input type="file" name="repeater[0][upload_lampiran][]" class="form-control" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf" required> 
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Slug Konten</th>
                                <td>
                                    <input type="text" name="repeater[0][slug]" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori</th>
                                <td>
                                    <select name="repeater[0][id_kategori]" id="kategori-list" class="form-control list-kategori" required>
                                        <option value="" selected>Pilih Kategori</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Sub Kategori</th>
                                <td>
                                    <select name="repeater[0][id_sub_kategori]" id="sub-kategori-list" class="form-control list-sub-kategori">
                                        <option value="" selected>Pilih Sub Kategori</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tag</th>
                                <td>
                                    <input type="text" name="repeater[0][tag]" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">User Contributor</th>
                                <td>
                                    <select name="repeater[0][id_user_contributor]" class="form-control list-user">
                                        <option value="" selected>Tidak ada</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tipe Konten</th>
                                <td>
                                    <select name="repeater[0][tipe]" class="form-control" required>
                                        <option value=""  selected>Pilih Tipe</option>
                                        <option value="internal">Internal</option>
                                        <option value="public">Public</option>
                                    </select>
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
                <button type="submit" form="form-perpustakaan" class="btn btn-primary ml-1">
                    <span class="d-none d-sm-block">Accept</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('admin/vendors/summernote/summernote-lite.min.js') }}"></script>
<script>
    $(document).ready(function() {
        let role = session("role");

        getListKategori()
        getListUsers()
        GetData(req,"contributors", formatcontributors);

        (role == 'admin' || role == 'operator') ? $("#add-pengetahuan").hide() : $("#add-pengetahuan").show();
    });

    function formatcontributors(data) {
        var result = "";
        $.each(data, function(index, data) {
            let idUser = 0;
            let role = session("role");
            
            if( session("id") ) {
                idUser = session("id");
            }
            result += `
                <tr>
                    <td>${data.judul}</td>
                    <td>${!empty(data.image_thumbnail) ? `<a href="#" class="openPopup" link="${data.image_thumbnail[0].url}">View File</a> `: "-"}</td>
                    <td>${!empty(data.upload_lampiran) ? `<a href="#" class="openPopup" link="${data.upload_lampiran[0].url}">View File</a> `: "-"}</td>
                    <td>${data.tipe}</td>
                    <td> ${data.status === "verifikasi" 
                    ? `<span class="badge bg-warning">sedang di verifikasi</span>` 
                    : data.status === "revisi" 
                    ? `<span class="badge bg-danger">revisi</span>` 
                    : data.status === "publish" 
                    ? `<span class="badge bg-info">published</span>` 
                    : ''} </td>
                    <td>
                    ${data.id_user == idUser || role == 'admin' ? `<a href="#" class="btn btn-info btn-icon btn-sm btn-detail" title="Detail" data-id="${data.id}"><span class="bi bi-info-circle"> </span></a>` : `<div class="stats-icon red" ><span class="bi bi-x-octagon-fill"> </span></div>`} 
                    ${data.id_user == idUser || role == 'admin' ? `<a href="#" class="btn btn-warning btn-sm btn-edit-pengetahuan" title="edit konten" data-id="${data.id}"><span class="bi bi-pencil"> </span></a>` : `<div class="stats-icon red" style="margin-right: 5px;"><span class="bi bi-x-octagon-fill"> </span></a></div>`}    
                    </td>
                </tr>
            `
        });
        return result;
    }

    function settingSummerNote(selector) {
        $(selector).summernote({
            height: 100,
            disableDragAndDrop: true,
            paste: {
                forcePlainText: true,
                text: function() {},
                onBeforePaste: function(evt) {
                    evt.preventDefault();
                },
            },
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['misc', ['codeview']],
            ],
            callbacks: {
                onImageUpload: function() {
                    return false;
                },
            },
        });
    }

    $(document).on('click', '.btn-add-pengetahuan', function() {
        
        $('#modal-pengetahuan').modal('show');
        $('#modal-pengetahuan').find('form')[0].reset();
        settingSummerNote($(".sumernote-perpustakaan"))
    });

    let getListKategori = () => {
        const url = `${baseUrl}/api/v1/listKategori`;
        ajaxData(url, 'GET', [], function(resp) {

            let option = ``;
            
            resp.forEach(element => {
                option += `<option value="${element.id}">${element.nama_kategori}</option>`;
            });
            $(".list-kategori").append(option);
        }, function(data) {
            
        });
    }
    
    let getListUsers = () => {
        const url = `${baseUrl}/api/v1/listUser`;
        ajaxData(url, 'GET', [], function(resp) {

            let option = ``;
            
            resp.forEach(element => {
                option += `<option value="${element.id}">${element.name}</option>`;
            });
            $(".list-user").append(option);
        }, function(data) {
            
        });
    }

    $('#kategori-list').on('change', function() { 
        let kategori_list_id = $(this).val();

        $('#sub-kategori-list').empty();
        $('#sub-kategori-list').append('<option value="">Pilih Sub Kategori</option>');

        const urlSubKategori = `${baseUrl}/api/v1/listSubKategori`;
            ajaxData(urlSubKategori, 'GET', {
                    id : kategori_list_id
            }, function(resp) { 
                    let data = resp.data;
                    let option2 = ``;

                    data.forEach(element => {
                        option2 += `<option value="${element.id}">${element.nama_sub_kategori}</option>`;
                    });
                    $(".list-sub-kategori").append(option2);
                });

            });
    
    $("#form-perpustakaan").on('submit', function(e) {
        e.preventDefault();
        let url = `${baseUrl}/api/v1/addOrUpdatePengetahuan`;
        const data = new FormData(this);
        loadingButton($(this))
        ajaxDataFile(url, 'POST', data, function(resp) {
            toast("Data has been saved");
            $('#modal-pengetahuan').modal('hide');
            loadingButton($("#form-perpustakaan"), false)
            GetData(req,"contributors", formatcontributors);
        }, function(data) {
            loadingButton($("#form-perpustakaan"), false)
        });
    });



    $(document).on('click', '.openPopup', function() {
        window.open($(this).attr('link'), 'popup', 'width=800,height=600');
    })

    $(document).on('click', '.btn-detail', function() {
        $('#detailPengetahuan').modal('show');
        loading($("#detailPengetahuan") , true);
        
        ajaxData(`${baseUrl}/api/v1/pengetahuan`, 'GET', {
            "id" : $(this).data('id')
        }, function(resp) {
            loading($("#detailPengetahuan") , false);
            if (empty(resp.data)) {
                toast("Data not found", 'warning');
                $('#detailPengetahuan').modal('hide');
            }
            
            let result = resp.data[0];
            $.each(result, function(index, data) {
                if (index == "image_thumbnail" || index == "upload_lampiran") return;
                $('#detailPengetahuan').find(`[data-bind-${index}]`).html(data);
            });
            
            if (!empty(result.image_thumbnail)) {
                result.image_thumbnail.forEach(function(image) {
                    $('#detailPengetahuan').find('[data-bind-image_thumbnail]').html(`<a href="${image.url}" target="_blank">View Image</a>`);
                });
            } else {
                $('#detailPengetahuan').find('[data-bind-image_thumbnail]').html(`-`);
            }

            if (!empty(result.upload_lampiran)) {
                result.upload_lampiran.forEach(function(image) {
                    $('#detailPengetahuan').find('[data-bind-upload_lampiran]').html(`<a href="${image.url}" target="_blank">View Lampiran</a>`);
                });
            } else {
                $('#detailPengetahuan').find('[data-bind-upload_lampiran]').html(`-`);
            }

            $("#detailPengetahuan").find('.sumernote-perpustakaan').val(result.dekskripsi).trigger('change');

            settingSummerNote($(".sumernote-perpustakaan"))
        },
        function() {
            loading($("#detailPengetahuan"));
            setTimeout(function() {
                $('#detailPengetahuan').modal('hide');
            }, 1000);
        });
    });

    $(document).on('click', '.btn-edit-pengetahuan', function() {
      
        $('#modal-edit-pengetahuan').modal('show');
        loading($("#modal-edit-pengetahuan") , true);
        $('#sub-kategori-list').empty();
        $('#sub-kategori-list').append('<option value="">Pilih Sub Kategori</option>');

        ajaxData(`${baseUrl}/api/v1/pengetahuan`, 'GET', {
            "id" : $(this).data('id')
        }, function(resp) {
            const result = resp.data[0];
    
            if (!result) {
                setTimeout(() => {
                    $('#modal-edit-pengetahuan').modal('hide')
                    toast("Data not found", 'warning');
                }, 1000);
                return;
            }
            loading($("#modal-edit-pengetahuan") , false);
        
            $.each(result, function(index, data) {
                if (index == "image_thumbnail" || index == "upload_lampiran" ) return;
                $('#modal-edit-pengetahuan').find(`[data-bind-${index}]`).val(data).attr('value', data);
            });

            let kategoriId = result.id_kategori; 
            let subKategoriId = result.id_sub_kategori;
    
            if (kategoriId) {
                const urlSubKategori = `${baseUrl}/api/v1/listSubKategori`;
                ajaxData(urlSubKategori, 'GET', { id: kategoriId }, function(resp) {
                    let dataSubKategori = resp.data;
                    let subKategoriOptions = '';
                    
                    dataSubKategori.forEach(element => {
                        subKategoriOptions += `<option value="${element.id}" ${element.id == subKategoriId ? 'selected' : ''}>${element.nama_sub_kategori}</option>`;
                    });
                    $('#sub-kategori-list').html(subKategoriOptions);
                });
            }            
            
            if (!empty(result.data_perpustakaan_image)) {
                result.data_perpustakaan_image.forEach(function(image) {
                    $('#modal-edit-pengetahuan').find('[data-bind-data_perpustakaan_image]').html(`<a href="${image.url}" target="_blank">View Image</a>`);
                });
            } else {
                $('#modal-edit-pengetahuan').find('[data-bind-image]').html(`-`);
            }
            
            $("#modal-edit-pengetahuan").find('.sumernote-perpustakaan-edit').summernote('code', result.dekskripsi);

            settingSummerNote($(".sumernote-perpustakaan-edit"))
        },
        function() {
            loading($("#modal-edit-pengetahuan"));
            setTimeout(function() {
                $('#detailLibrary').modal('hide');
            }, 1000);
        });
    });

    $("#form-perpustakaan-edit").on('submit', function(e) {
        e.preventDefault();
        let url = `${baseUrl}/api/v1/addOrUpdatePengetahuan`;
        const data = new FormData(this);
        loadingButton($(this))
        ajaxDataFile(url, 'POST', data, function(resp) {
            toast("Data has been saved");
            $('#modal-edit-pengetahuan').modal('hide');
            loadingButton($("#form-perpustakaan-edit"), false)
            GetData(req,"contributors", formatcontributors);
        }, function(data) {
            loadingButton($("#form-perpustakaan-edit"), false)
        });
    });
</script>
@endsection