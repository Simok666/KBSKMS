<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Pendaftaran - User KMS</title>
    <link href="{{ asset('img/logo/logo-kemenhub.png') }}" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/pages/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/toastify/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/leaflet/leaflet.css') }}">
</head>
<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-12 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        {{-- <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a> --}}
                        <h3>KMS KBS </h3>
                    </div>
                    <h1 class="auth-title">Pendaftaran</h1>
                    <form action="index.html">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="name" minlength="3" class="form-control form-control-xl" placeholder="Nama" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Email" required>
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" min="8" name="password" class="form-control form-control-xl" placeholder="Kata Sandi" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="nip" minlength="3" class="form-control form-control-xl" placeholder="NIP" required>
                            <div class="form-control-icon">
                                <i class="bi bi-building"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <select name="id_satuan_kerja_eselon_1" id="eselon-satu" class="form-control form-control-xl list-eselon-satu" required>
                                <option value="Pilih Eselon"selected>Pilih Eselon 1</option>
                            </select>
                            <div class="form-control-icon">
                                <i class="bi bi-archive"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <select name="id_satuan_kerja_eselon_2" id="eselon-dua" class="form-control form-control-xl list-eselon-dua" required>
                                <option value="Pilih Eselon"selected>Pilih Eselon 2</option>
                            </select>
                            <div class="form-control-icon">
                                <i class="bi bi-archive"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <select name="id_satuan_kerja_eselon_3"  id="eselon-tiga" class="form-control  form-control-xl list-eselon-tiga" required>
                                <option value="Pilih Eselon"selected>Pilih Eselon 3</option>
                            </select>
                            <div class="form-control-icon">
                                <i class="bi bi-archive"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <select name="id_fungsi" id="eselon-fungsi" class="form-control form-control-xl list-fungsi" required>
                                <option value="Pilih Eselon"selected>Pilih Fungsi</option>
                            </select>
                            <div class="form-control-icon">
                                <i class="bi bi-archive"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4" id="select-role">
                            <span class="input-group-text mb-4" id="basic-addon1" >Pilih role</span>
                            <ul class="list-unstyled mb-0">
                                {{-- <li class="d-inline-block me-2 mb-1">
                                    <div class="form-check">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="form-check-input form-check-primary" checked
                                                name="customCheck" id="customColorCheck1">
                                            <label class="form-check-label" for="customColorCheck1">Knowledge Contributor</label>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-inline-block me-2 mb-1">
                                    <div class="form-check">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="form-check-input form-check-secondary" checked
                                                name="customCheck" id="customColorCheck2">
                                            <label class="form-check-label" for="customColorCheck2">Knowledge Verificator</label>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-inline-block me-2 mb-1">
                                    <div class="form-check">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="form-check-input form-check-success" checked
                                                name="customCheck" id="customColorCheck3">
                                            <label class="form-check-label" for="customColorCheck3">Knowledge Seeker</label>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-inline-block me-2 mb-1">
                                    <div class="form-check">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="form-check-input form-check-danger" checked
                                                name="customCheck" id="customColorCheck4">
                                            <label class="form-check-label" for="customColorCheck4">Pimpinan</label>
                                        </div>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="nama_jabatan" class="form-control form-control-xl" placeholder="Nama Jabatan" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person-circle"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Simpan</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Sudah punya akun? <a href="{{ url('auth-login.html') }}" class="font-bold">Masuk</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/toastify/toastify.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    <script src="{{ asset('admin/vendors/leaflet/leaflet.js') }}"></script>

    <script>
        // if not empty token redirect
        if (!empty(session('token'))) {
            window.location.href = "{{ url('dashboard') }}";
        }
        // jquery on submit
        $(document).ready(function() {
            getListEselon();

            $('form').submit(function(e) {
                e.preventDefault();
                var form = this;
                var formData = new FormData(form);
                loadingButton($(this))
                $.ajax({
                    url: `{{ url('api/v1/user/register') }}`,
                    type: 'POST',
                    dataType: "JSON",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function (resp) {
                        toast("Register Success", 'success');
                        loadingButton($("form"), false)
                        setTimeout(function () {
                            window.location = "{{ url('auth-login.html') }}";
                        }, 3000);
                    },
                    error: function (data) {
                        let code = data.responseJSON.code;
                        if (code >= 500) {
                            toast("Something went wrong, please try again", 'danger');
                        } else {
                            toast(data.responseJSON.message, 'warning');
                        }
                        loadingButton($("form"), false)
                    }
                });
            });

            $('#eselon-satu').on('change', function() { 
                let eselon_satu_id = $(this).val();

                $('#eselon-dua').empty();
                $('#eselon-dua').append('<option value="">Pilih Eselon 2</option>');

                const urlEselonDua = `${baseUrl}/api/v1/eselonDua/?id_eselon_satu=${eselon_satu_id}`;
                ajaxData(urlEselonDua, 'GET', [], function(resp) { 
                    let data = resp.data;
                    let option2 = ``;

                    data.forEach(element => {
                        option2 += `<option value="${element.id}">${element.nama_satuan_kerja_eselon_2}</option>`;
                    });
                    $(".list-eselon-dua").append(option2);
                });

            });

            $('#eselon-dua').on('change', function() {
                let eselon_dua_id = $(this).val();

                $('#eselon-tiga').empty();
                $('#eselon-tiga').append('<option value="">Pilih Eselon 3</option>');

                const urlEselonTiga = `${baseUrl}/api/v1/eselonTiga/?id_eselon_dua=${eselon_dua_id}`;
                ajaxData(urlEselonTiga, 'GET', [], function(resp) { 
                    let data2 = resp.data;
                    let option3 = ``;

                    data2.forEach(element => {
                        option3 += `<option value="${element.id}">${element.nama_satuan_kerja_eselon_3}</option>`;
                    });
                    $(".list-eselon-tiga").append(option3);
                });
            });

            $('#eselon-tiga').on('change', function() {
                let eselon_tiga_id = $(this).val();

                $('#eselon-fungsi').empty();
                $('#eselon-fungsi').append('<option value="">Pilih Fungsi</option>');

                const urlFungsi = `${baseUrl}/api/v1/fungsi/?id_eselon_tiga=${eselon_tiga_id}`;
                ajaxData(urlFungsi, 'GET', [], function(resp) { 
                    let data3 = resp.data;
                    let option4 = ``;

                    data3.forEach(element => {
                        option4 += `<option value="${element.id}">${element.nama_fungsi}</option>`;
                    });
                    $(".list-fungsi").append(option4);
                });
            });

            let dataRole = $("#select-role");
            const getDataRoles = ajaxData(`${baseUrl}/api/v1/roles`, 'GET', [], function(resp) {
                let dataDetail = "";
                if (!empty(resp)) {
                    resp.forEach(function (dataRoles, indexRoles) {
                        dataDetail += `
                                <li class="d-inline-block me-2 mb-1">
                                    <div class="form-check">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="form-check-input form-check-primary" checked
                                                name="roles[]" value="${dataRoles.id}" id="customColorCheck${indexRoles}">
                                            <label class="form-check-label" for="customColorCheck1">${dataRoles.nama_role}</label>
                                        </div>
                                    </div>
                                </li>
                        `
                    });
                    dataRole.find('ul').html(dataDetail);
                }
            });


        })

        let getListEselon = () => {
            const url = `${baseUrl}/api/v1/eselon/`;
            ajaxData(url, 'GET', [], function(resp) {
                let data = resp.data;
                let option = ``;

                data.forEach(element => {
                    option += `<option value="${element.id}">${element.nama_satuan_kerja_eselon_1}</option>`;
                });
                $(".list-eselon-satu").append(option);
            }, function(data) {
                
            });
        }

    </script>

</body>

</html>
