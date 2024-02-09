<script>
    $(document).ready(function() {
        //vars
        id_ruangan = null;
        is_update = false;
        is_copy = false;

        tabel_ruangan = $("#tabel_ruangan").DataTable({
            processing: true,
            ajax: {
                url: "<?= site_url('ruangan/get') ?>",
            },
            language: {},
            columns: [{
                    data: "no",
                },
                {
                    data: "ruangan_name",
                },
                {
                    data: "ruangan_id",
                    searchable: false,
                    orderable: false,
                    className: "text-center",
                    render: function(data, type, row, meta) {
                        let html = '';
                        html = `
                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px btn-edit" data-id="${data}" data-bs-toggle="modal" data-bs-target="#modal_tambah_ruangan" title="Edit Ruangan">
                                    <i class="bi bi-pencil fs-4"></i>
                                </button>
                                <button class="btn btn-icon btn-active-light-danger w-30px h-30px btn-hapus" data-id="${data}" title="Hapus Ruangan">
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
        });; //table_ruangan
    }); //ready 

    // klik tombol tambah
    $('.btn-tambah').click(function() {
        is_update = false;
        is_copy = false;

        $(".judul-modal").text("Tambah Ruangan");
        $("#ruangan_name").val('');
    });

    // simpan ruangan
    $(document).on('click', '#btn-simpan', function() {
        //init var
        let ruangan_id = null,
            ruangan_name = $("#ruangan_name").val(),
            the_url = "<?= site_url('ruangan/simpan'); ?>";

        if (is_update) {
            ruangan_id = $('#btn-simpan').data('ruangan-id');
            the_url = "<?= site_url('ruangan/update'); ?>";
        }

        if (ruangan_name.length == 0 || ruangan_name == '') {
            pesan('warning', 'Nama ruangan tidak boleh kosong!');
            $("#ruangan_name").focus();
            return false;
        }

        konfirmasi('Anda yakin untuk menyimpan data?').then(function(e) {
            if (e.value) {
                $.ajax({
                    type: "POST",
                    dataType: "JSON",
                    url: the_url,
                    data: {
                        ruangan_id: ruangan_id,
                        ruangan_name: ruangan_name,
                    },
                    beforeSend: function() {
                        $("#btn-simpan").attr("data-kt-indicator", "on").prop("disabled", true)
                    },
                    success: function(response) {
                        if (response.status) {
                            peringatan("Sukses", response.pesan, 'success', 1500)
                            tabel_ruangan.ajax.reload();
                            reset_form();
                        } else {
                            peringatan("Error", response.pesan, 'error')
                                .then(function() {
                                    location.reload();
                                });
                        }
                        $('#modal_tambah_ruangan').modal('hide');
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

    // edit ruangan
    $(document).on('click', '.btn-edit', function() {
        let ruangan_id = $(this).data('id');
        is_update = true;
        is_copy = false;
        $(".judul-modal").text("Edit Ruangan");

        $.ajax({
            dataType: "JSON",
            url: "<?= site_url('ruangan/get_ruangan_by_id'); ?>",
            data: {
                id: ruangan_id,
            },
            success: function(response) {
                //fill data to form
                $("#ruangan_name").val(response.ruangan_name);
                $('#btn-simpan').data('ruangan-id', ruangan_id);
            },
            error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
                pesan_swal('error', err.Message);
            }
        });
    });

    //hapus ruangan
    $(document).on('click', '.btn-hapus', function() {
        let ruangan_id = $(this).data('id');
        konfirmasi('Anda yakin ingin menghapus data ini?')
            .then(function(e) {
                if (e.value) {
                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('ruangan/hapus'); ?>",
                        data: {
                            ruangan_id: ruangan_id
                        },
                        dataType: "JSON",
                        success: function(response) {
                            if (response.status) {
                                peringatan("Sukses", response.pesan, 'success', 1500)
                                    .then(function() {
                                        tabel_ruangan.ajax.reload();
                                    })
                            } else {
                                peringatan("Error", response.pesan, 'error')
                                    .then(function() {
                                        location.reload();
                                    })
                            }
                        },
                        error: function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            console.log(err.Message);
                            pesan('error', 'Terjadi Kesalahan');
                        }
                    })
                }
            })
    });

    $('#modal_tambah_ruangan').on('hidden.bs.modal', function() {
        // $(".table-coverage").show();
        // $(".table-coverage-edit").hide();
    });

    reset_form = () => {
        $("#ruangan_name").val('');
    }
</script>