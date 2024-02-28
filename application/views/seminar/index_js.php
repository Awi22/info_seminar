<script>
    $(document).ready(function() {
        //vars
        id_seminar = null;
        is_update = false;
        is_copy = false;

        tabel_seminar = $("#tabel_seminar").DataTable({
            processing: true,
            ajax: {
                url: "<?= site_url('seminar/get') ?>",
            },
            language: {},
            columns: [{
                    data: "no",
                },
                {
                    data: "nim",
                },
                {
                    data: "nama",
                },
                {
                    data: "tanggal",
                },
                {
                    data: "jam_mulai",
                },
                {
                    data: "jam_selesai",
                },
                {
                    data: "ruangan",
                },
                {
                    data: "id_seminar",
                    searchable: false,
                    orderable: false,
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        let html = '';
                        html = `
                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px btn-edit" data-id="${data}" data-bs-toggle="modal" data-bs-target="#modal_tambah_seminar" title="Edit Seminar">
                                    <i class="bi bi-pencil fs-4"></i>
                                </button>
                                <button class="btn btn-icon btn-active-light-danger w-30px h-30px btn-hapus" data-id="${data}" title="Hapus Seminar">
                                    <i class="bi bi-trash fs-4"></i>
                                </button>
                            `;
                        return html
                    }
                }
            ],
            dom: `
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"	`,
        }).on('error.dt', function(e, settings, techNote, message) {
            pesan('error', message);
            console.log('Error DataTables: ', message);
        });; //table_seminar

        // select2 data ruangan
        $.ajax({
            url: "<?= site_url('seminar/select2_ruangan'); ?>",
            dataType: 'JSON',
            success: function(result) {
                $("#ruangan").select2({
                    placeholder: "Pilih Ruangan",
                    dropdownParent: $('#modal_tambah_seminar'),
                    data: result,
                }).change(function() {
                    //$('#btn-lihat').click();
                });
            }
        });

    }); //ready

    // klik tombol tambah
    $('.btn-tambah').click(function() {
        is_update = false;
        is_copy = false;

        $(".judul-modal").text("Tambah Seminar");
        $("#nim").val('');
        $("#nama").val('');
        $("#tanggal_input").val('');
        $("#jam_mulai_input").val('');
        $("#jam_selesai_input").val('');
        $("#ruangan").val(null).trigger('change');
    });

    // simpan seminar
    $(document).on('click', '#btn-simpan', function() {
        //init var
        let seminar_id = null,
            nim = $("#nim").val(),
            nama = $("#nama").val(),
            tanggal = $("#tanggal_input").val(),
            jam_mulai = $("#jam_mulai_input").val(),
            jam_selesai = $("#jam_selesai_input").val(),
            ruangan = $("#ruangan").val(),
            the_url = "<?= site_url('seminar/simpan'); ?>";

        if (is_update) {
            seminar_id = $('#btn-simpan').data('seminar-id');
            the_url = "<?= site_url('seminar/update'); ?>";
        }

        if (nim.length == 0 || nim == '') {
            pesan('warning', 'NIM tidak boleh kosong!');
            $("#nim").focus();
            return false;
        }

        if (nama.length == 0 || nama == '') {
            pesan('warning', 'Nama mahasiswa tidak boleh kosong!');
            $("#nama").focus();
            return false;
        }

        if (tanggal.length == 0 || tanggal == '') {
            pesan('warning', 'Tanggal tidak boleh kosong!');
            $("#tanggal_input").focus();
            return false;
        }

        if (jam_mulai.length == 0 || jam_mulai == '') {
            pesan('warning', 'Jam mulai tidak boleh kosong!');
            $("#jam_mulai_input").focus();
            return false;
        }

        if (jam_selesai.length == 0 || jam_selesai == '') {
            pesan('warning', 'Jam selesai tidak boleh kosong!');
            $("#jam_selesai_input").focus();
            return false;
        }

        if (ruangan.length == 0 || ruangan == '') {
            pesan('warning', 'Ruangan tidak boleh kosong!');
            $("#ruangan").focus();
            return false;
        }

        konfirmasi('Anda yakin untuk menyimpan data?').then(function(e) {
            if (e.value) {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: the_url,
                    data: {
                        seminar_id: seminar_id,
                        nim: nim,
                        nama: nama,
                        tanggal: tanggal,
                        jam_mulai: jam_mulai,
                        jam_selesai: jam_selesai,
                        ruangan: ruangan,
                    },
                    beforeSend: function() {
                        $("#btn-simpan").attr("data-kt-indicator", "on").prop("disabled", true)
                    },
                    success: function(response) {
                        if (response.status) {
                            peringatan("Sukses", response.pesan, 'success', 1500)
                            tabel_seminar.ajax.reload();
                            reset_form();
                        } else {
                            peringatan("Error", response.pesan, 'error')
                                .then(function() {
                                    location.reload();
                                });
                        }
                        $('#modal_tambah_seminar').modal('hide');
                        $("#btn-simpan").removeAttr("data-kt-indicator").prop("disabled", false)
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        console.log(err.Message);
                        pesan("error", "Terjadi Kesalahan");
                        location.reload();
                    }
                });
            }
        })
    });

    // edit seminar
    $(document).on('click', '.btn-edit', function() {
        let seminar_id = $(this).data('id');
        is_update = true;
        is_copy = false;
        $(".judul-modal").text("Edit Seminar");

        $.ajax({
            dataType: "JSON",
            url: "<?= site_url('seminar/get_seminar_by_id'); ?>",
            data: {
                id: seminar_id
            },
            success: function(response) {
                $("#nim").val(response.nim);
                $("#nama").val(response.nama);
                $("#tanggal_input").val(response.tanggal);
                $("#jam_mulai_input").val(response.jam_mulai);
                $("#jam_selesai_input").val(response.jam_selesai);
                $("#ruangan").val(response.ruangan).trigger('change');

                $('#btn-simpan').data('seminar-id', seminar_id);
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
                pesan_swal('error', err.Message);
            }
        });
    });

    // hapus seminar
    $(document).on('click', '.btn-hapus', function() {
        let seminar_id = $(this).data('id');

        konfirmasi('Anda yakin ingin menghapus data ini?')
            .then(function(e) {
                if (e.value) {
                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('seminar/hapus'); ?>",
                        data: {
                            seminar_id: seminar_id
                        },
                        dataType: "JSON",
                        success: function(response) {
                            if (response.status) {
                                peringatan("Sukses", response.pesan, 'success', 1500)
                                    .then(function() {
                                        tabel_seminar.ajax.reload();
                                    })
                            } else {
                                peringatan("Error", response.pesan, 'error')
                                    .then(function() {
                                        location.reload();
                                    });
                            }
                        },
                        error: function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            console.log(err.Message);
                            pesan("error", "Terjadi Kesalahan");
                        }
                    });
                }
            })
    });

    $('#modal_tambah_seminar').on('hidden.bs.modal', function() {
        // $(".table-coverage").show();
        // $(".table-coverage-edit").hide();
    });

    reset_form = () => {
        $("#nim").val('');
        $("#nama").val('');
        $("#tanggal_input").val('');
        $("#jam_mulai_input").val('');
        $("#jam_selesai_input").val('');
        $("#ruangan").val(null).trigger('change');
    }

    // tanggal
    new tempusDominus.TempusDominus(document.getElementById("tanggal_input"), {
        localization: {
            locale: 'in-IN',
            format: 'dd-MM-yyyy',
        },
        display: {
            viewMode: "calendar",
            components: {
                decades: true,
                year: true,
                month: true,
                date: true,
                hours: false,
                minutes: false,
                seconds: false
            }
        }
    });

    // jam mulai
    new tempusDominus.TempusDominus(document.getElementById("jam_mulai_input"), {
        localization: {
            locale: 'in-IN',
            format: 'HH : mm',
        },
        display: {
            viewMode: "calendar",
            components: {
                decades: false,
                year: false,
                month: false,
                date: false,
                hours: true,
                minutes: true,
                seconds: false
            }
        }
    });

    // jam selesai
    new tempusDominus.TempusDominus(document.getElementById("jam_selesai_input"), {
        localization: {
            locale: 'in-IN',
            format: 'HH : mm',
        },
        display: {
            viewMode: "calendar",
            components: {
                decades: false,
                year: false,
                month: false,
                date: false,
                hours: true,
                minutes: true,
                seconds: false
            }
        }
    });
</script>