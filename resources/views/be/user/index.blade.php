@extends('layouts.BE.template.template')
@section('content')
    <div class="main-content">
        <div class="modal fade" id="add_TU_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                    </div>
                    <form action="#" method="POST" id="add_TU_form" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="my-2">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Masukan Nama">
                            </div>

                            <div class="my-2">
                                <label for="email">Email</label>
                                <input type="email" id="tes" name="email" class="form-control"
                                    placeholder="Masukan Email">
                            </div>

                            <div class="my-2">
                                <label for="password">Password</label>
                                <input type="text" name="password" id="passwordInsert" class="form-control"
                                    placeholder="Masukan Password">
                                <button type="button" class="btn btn-info mt-2" id="togglePasswordInsert">Sembunyikan
                                    Password</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                            <button type="submit" id="add_TU_btn" class="btn btn-primary">
                                <div id="textSimpan">Simpan</div>
                                <div id="loadingButton" style="display: none;">
                                    <?xml version="1.0" encoding="utf-8"?>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        style="margin: auto; background: none; display: block; shape-rendering: auto;"
                                        width="30px" height="30px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                        <circle cx="50" cy="50" fill="none" stroke="#ffffff"
                                            stroke-width="10" r="35"
                                            stroke-dasharray="164.93361431346415 56.97787143782138">
                                            <animateTransform attributeName="transform" type="rotate"
                                                repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50"
                                                keyTimes="0;1"></animateTransform>
                                        </circle>
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editTUModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-backdrop="static"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    </div>
                    <form action="#" method="POST" id="edit_TU_form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="modal-body">
                            <div class="my-2">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Masukan Nama">
                            </div>

                            <div class="my-2">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Masukan Email">
                            </div>

                            <div class="my-2">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Masukan Password">
                                <button type="button" class="btn btn-info mt-2" id="togglePassword">Tampilkan
                                    Password</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="edit_TU_btn" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="section-header">
                <h1>Halaman User</h1>
            </div>
            <div class="section-body">
                <div class="row my-5">
                    <div class="col-lg-12">
                        <div class="card shadow">
                            <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                                <h3 class="text-light">Tabel User</h3>
                                <button class="btn btn-light" data-toggle="modal" data-target="#add_TU_modal"><i
                                        class="bi-plus-circle me-2"></i>Tambah User</button>
                            </div>
                            <div class="">
                                <div class="card-body" id="TU_all">
                                    <h1 class="text-center text-secondary my-5">Loading...</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $("#add_TU_form").submit(function(e) {
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var name = $("input[name='name']").val();
                var email = $("input[name='email']").val();
                var password = $("input[name='password']").val();

                // Hide the submit text and show the loading animation
                $("#textSimpan").hide();
                $("#loadingButton").show();

                $.ajax({
                    url: "{{ route('user-store') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        name: name,
                        email: email,
                        password: password
                    },
                    success: function(response) {
                        $("#loadingButton").hide();
                        $("#textSimpan").show();
                        if ($.isEmptyObject(response.error)) {
                            printSuccessMsg(response.success);
                            $("#add_TU_form")[0].reset();
                            $("#add_TU_modal").modal('hide');
                            TU_all();
                        } else {
                            printErrorMsg(response.error);
                        }
                    }
                });
            });

            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{ route('user-edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#name").val(response.name);
                        $("#email").val(response.email);
                        $("#password").val(response.password_asli);
                        $("#id").val(response.id);
                    }
                });
            });
            $("#edit_TU_form").submit(function(e) {
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var id = $("#id").val();
                var name = $("input[id='name']").val();
                var email = $("input[id='email']").val();
                var password = $("input[id='password']").val();
                $("#edit_TU_btn").text('Updating...');
                $.ajax({
                    url: '{{ route('user-update') }}',
                    method: 'post',
                    data: {
                        _token: _token,
                        id: id,
                        name: name,
                        email: email,
                        password: password
                    },
                    dataType: 'json',
                    success: function(response) {
                        if ($.isEmptyObject(response.error)) {
                            printSuccessMsg(response.success);
                            $("#edit_TU_btn").text('Update');
                            $("#edit_TU_form")[0].reset();
                            $("#editTUModal").modal('hide');
                            TU_all();
                        } else {
                            printErrorMsg(response.error);
                            $("#edit_TU_btn").text('Update');
                        }
                    },
                });
            });

            $(document).on('click', '.deleteIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                let csrf = '{{ csrf_token() }}';
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('user-delete') }}',
                            method: 'delete',
                            data: {
                                id: id,
                                _token: csrf
                            },
                            success: function(response) {
                                printSuccessMsg(response.success)
                                TU_all();
                            }
                        });
                    }
                })
            });
            TU_all();

            function TU_all() {
                $.ajax({
                    url: '{{ route('user-all') }}',
                    method: 'get',
                    success: function(response) {
                        $("#TU_all").html(response);
                        $("table").DataTable({
                            rowReorder: {
                                selector: 'td:nth-child(2)'
                            },
                            destroy: true,
                            responsive: true
                        });
                    }
                });
            }

            function printErrorMsg(msg) {
                $.each(msg, function(key, value) {
                    iziToast.error({
                        title: 'Ups!!',
                        message: value,
                        position: 'topRight'
                    });
                });
            }

            function printSuccessMsg(msg) {
                iziToast.success({
                    title: 'Selamat',
                    message: msg,
                    position: 'topRight'
                });
            }

        });
    </script>
    <script>
        // lihat password edit
        var togglePassword = document.getElementById("togglePassword");
        var passwordInput = document.getElementById("password");

        togglePassword.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePassword.textContent = "Sembunyikan Password";
            } else {
                passwordInput.type = "password";
                togglePassword.textContent = "Tampilkan Password";
            }
        });

        // lihat password insert
        $(document).ready(function() {
            var togglePasswordInsert = document.getElementById("togglePasswordInsert");
            var passwordInputInsert = document.getElementById("passwordInsert");

            togglePasswordInsert.addEventListener("click", function() {
                // Check if password input is empty
                if (passwordInputInsert.value === "") {
                    iziToast.error({
                        title: 'Ups!!',
                        message: 'harap isi password terlebih dahulu',
                        position: 'topRight'
                    });
                    return;
                }

                // Toggle password visibility
                if (passwordInputInsert.type === "password") {
                    passwordInputInsert.type = "text";
                    togglePasswordInsert.textContent = "Sembunyikan Password";
                } else {
                    passwordInputInsert.type = "password";
                    togglePasswordInsert.textContent = "Tampilkan Password";
                }
            });
        });
    </script>
@endsection
