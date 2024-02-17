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

    // edit seminar

    // hapus seminar

    // tanggal
    new tempusDominus.TempusDominus(document.getElementById("tanggal_input"), {
        localization: {
            locale: 'in-IN',
            format: 'dddd, dd-MM-yyyy',
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