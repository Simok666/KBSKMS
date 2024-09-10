@extends('admin.layout.admin')

@section('title', 'Verifikasi Pengetahuan')
@section('title_page', 'Verifikasi Pengetahuan')
@section('desc_page', 'List semua konten pengetahuan')
@section('styles')
    <link rel="stylesheet" href="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">

    <link rel="stylesheet" href="{{ asset("admin/vendors/summernote/summernote-lite.min.css") }}">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title"></h4>
    </div>
    <div class="card-body">
        @include('admin.components.table-pagenation', ['table' => 'contributors' , 'url' => '/api/v1/pengetahuan' , 'headers' => [
            "Judul",
            // "Dekskripsi",
            "Image Thumbnail",
            "Lampiran",
            "Tipe Konten",
            "Action",
            "Publish / Verifikasi",
            "Revisi / Komentar"
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
                            <td >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control sumernote-perpustakaan-edit" id="summer-note" name="repeater[0][dekskripsi]" placeholder="dekskripsi" required ></textarea>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Kategori</th>
                            <td data-bind-nama_kategori></td>
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

<div class="modal fade text-left" id="publish" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel140" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title white" id="myModalLabel140">
                    Publish / Verifikasi Konten
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin publish / verifikasi konten ini? <br>
                <form action="index.html" id="publish-konten">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="id_user" id="user_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>

                <button type="submit" form="publish-konten" class="btn btn-warning ml-1">
                    <span class="d-none d-sm-block label-submit">Accept</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="revisi" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel140" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title white" id="myModalLabel140">
                    Revisi Konten
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin Revisi konten ini? <br>
                <form action="index.html" id="revisi-konten">
                    <input type="hidden" name="id" id="id-revisi">
                    <input type="hidden" name="id_user" id="user_id-revisi">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>

                <button type="submit" form="revisi-konten" class="btn btn-danger ml-1">
                    <span class="d-none d-sm-block label-submit">Accept</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="komentar" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel140" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title white" id="myModalLabel140">
                    Komentar Konten
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.html" id="komentar-konten">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control sumernote-komentar" id="summer-note" name="komentar" placeholder="komentar" value="" required></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id-komentar">
                    <input type="hidden" name="id_user" id="user_id-komentar">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>

                <button type="submit" form="komentar-konten" class="btn btn-primary ml-1">
                    <span class="d-none d-sm-block label-submit">Accept</span>
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
        GetData(req,"contributors", formatcontributors);
    });

    function formatcontributors(data) {
        let verificator = session("data-role-verificator");

        var result = "";
        $.each(data, function(index, data) {
            result += `
                <tr>
                    <td>${data.judul}</td>
                    <td>${!empty(data.image_thumbnail) ? `<a href="#" class="openPopup" link="${data.image_thumbnail[0].url}">View File</a> `: "-"}</td>
                    <td>${!empty(data.upload_lampiran) ? `<a href="#" class="openPopup" link="${data.upload_lampiran[0].url}">View File</a> `: "-"}</td>
                    <td>${data.tipe}</td>
                    <td>
                        <a href="#" class="btn btn-info btn-icon btn-sm btn-detail" title="Detail" data-id="${data.id}"><span class="bi bi-info-circle"> </span></a>
                    </td>
                    <td>
                        ${verificator === "ada" ? (data.status_verifikator ? `<span class="badge bg-info">Sudah di verifikasi</span>` :  `<a href="#" data-bs-toggle="modal" data-bs-target="#publish" class="btn btn-warning btn-sm btn-publish mb-1" title="verifikasi konten verifikator" data-id="${data.id}" data-userid="${data.id_user}"><span class="bi bi-cloud-arrow-up-fill"> </span></a>` )  : (data.status_verifikator == true ? (data.status === 'revisi' ? `<span class="badge bg-danger">Revisi</span>` : (data.status === 'publish' ? `<span class="badge bg-info">Published</span>` : `<a href="#" data-bs-toggle="modal" data-bs-target="#publish" class="btn btn-warning btn-sm btn-publish mb-1" title="publish konten" data-id="${data.id}" data-userid="${data.id_user}"><span class="bi bi-cloud-arrow-up-fill"> </span></a>`)) :  `<span class="badge bg-warning">Sedang di verifikasi verifikator</span>`) }
                    </td>
                    <td>
                        ${verificator === "ada"  ? `<a href="#" data-bs-toggle="modal" data-bs-target="#komentar" class="btn btn-primary btn-sm btn-komentar mb-1" title="komentar konten" data-id="${data.id}" data-userid="${data.id_user}"><span class="bi bi-chat-dots-fill"> </span></a>` : (data.status_verifikator == true ? ( data.status === 'revisi' ? `<span class="badge bg-danger">Revisi</span>` : (data.status === 'publish' ? `<span class="badge bg-info">Published</span>` : `<a href="#" data-bs-toggle="modal" data-bs-target="#revisi" class="btn btn-danger btn-sm btn-revisi mb-1" title="revisi konten" data-id="${data.id}" data-userid="${data.id_user}"><span class="bi bi-x-octagon-fill"> </span></a>`))  : `<span class="badge bg-warning">Sedang di verifikasi verifikator</span>`)  }
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
                ['insert', []],
                ['misc', ['codeview']],
            ],
            callbacks: {
                onImageUpload: function() {
                    return false;
                },
            },
        });
    }

    $(document).on('click', '.btn-publish', function() {
        $('#id').val($(this).data('id'));
        $('#user_id').val($(this).data('userid'));
    });

    $(document).on('click', '.btn-revisi', function() {
        $('#id-revisi').val($(this).data('id'));
        $('#user_id-revisi').val($(this).data('userid'));
    });

    $(document).on('click', '.btn-komentar', function() {
        $('#id-komentar').val($(this).data('id'));
        $('#user_id-komentar').val($(this).data('userid'));
        settingSummerNote($(".sumernote-komentar"))
    });

    $("#publish-konten").on('submit', function(e) {
        e.preventDefault();
        let user = "";
        let status = "";
        if(session("data-role-verificator") == "ada") {
            user = "verifikator";
            status = true;
        } else {
            user = "admin_operator";
            status = "publish";
        }
        let id = $(this).find("#id").val();
        let userId = $(this).find("#user_id").val();
        let url = `${baseUrl}/api/v1/publish/${id}`;
        let data = {
            "status" : status,
            "user" : user,
            "id_user" : userId
        };
        loadingButton($(this))
        ajaxData(url, 'PUT', data, function(resp) {
            toast(resp.message);
            $('#publish').modal('hide');
            $('#publish-konten').trigger('reset');
            loadingButton($("#publish-konten"), false)
            GetData(req,"contributors", formatcontributors);
        }, function(data) {
            loadingButton($("#publish-konten"), false)
        });
    });

    $("#revisi-konten").on('submit', function(e) {
        e.preventDefault();
        let id = $(this).find("#id-revisi").val();
        let user = "";
        let status = "";
        if(session("data-role-verificator") == "ada") {
            user = "verifikator";
            status = false;
        } else {
            user = "admin_operator";
            status = "revisi";
        }
        let userId = $(this).find("#user_id-revisi").val();
        let url = `${baseUrl}/api/v1/revisi/${id}`;
        let data = {
            "user" : user,
            "status" : status,
            "id_user" : userId
        };
        loadingButton($(this))
        ajaxData(url, 'PUT', data, function(resp) {
            toast(resp.message);
            $('#revisi').modal('hide');
            $('#revisi-konten').trigger('reset');
            loadingButton($("#revisi-konten"), false)
            GetData(req,"contributors", formatcontributors);
        }, function(data) {
            loadingButton($("#revisi-konten"), false)
        });
    });

    $("#komentar-konten").on('submit', function(e) {
        e.preventDefault();
        let id = $(this).find("#id-komentar").val();
        let userId = $(this).find("#user_id-komentar").val();
        const data = new FormData(this);
        let url = `${baseUrl}/api/v1/komentar/${id}`;
        let data = {
            "user" : user,
            "id_user" : userId,
            "data" : data
        };
        loadingButton($(this))
        ajaxData(url, 'PUT', data, function(resp) {
            toast(resp.message);
            $('#komentar').modal('hide');
            $('#komentar-konten').trigger('reset');
            loadingButton($("#komentar-konten"), false)
            GetData(req,"contributors", formatcontributors);
        }, function(data) {
            loadingButton($("#komentar-konten"), false)
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
                console.log(index);
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

            $("#detailPengetahuan").find('.sumernote-perpustakaan-edit').val(result.dekskripsi).trigger('change');

            settingSummerNote($(".sumernote-perpustakaan-edit"))
        },
        function() {
            loading($("#detailPengetahuan"));
            setTimeout(function() {
                $('#detailPengetahuan').modal('hide');
            }, 1000);
        });
    });

</script>
@endsection