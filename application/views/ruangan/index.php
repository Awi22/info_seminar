<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <h1 class="page-heading d-flex text-gray-700 fw-bold fs-3 flex-column justify-content-center my-0"><?= $judul ?></h1>
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="#" class="btn btn-sm fw-bold btn-primary btn-tambah" data-bs-toggle="modal" data-bs-target="#modal_tambah_ruangan">Tambah</a>
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->


    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid py-3">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <div class="table-responsive">
                        <table id="tabel_ruangan" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="text-left">No</th>
                                    <th>Nama Ruangan</th>
                                    <th class="text-center w-250px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>


<!--start::MODALS-->
<!-- start::modal_tambah_ruangan -->
<div class="modal fade" id="modal_tambah_ruangan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-5">
                <h3 class="text-gray-700"><span class="judul-modal"></span></h3>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="bi bi-x fs-1"></i>
                </div>
            </div>
            <div class="modal-body p-5">
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <div class="fv-row mb-5">
                                <label class="fs-6 mb-1">Nama Ruangan</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Nama Ruangan" name="ruangan_name" id="ruangan_name" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer p-3">
                <button type="button" id="btn-simpan" class="btn btn-sm btn-primary">
                    <span class="indicator-label">Simpan</span>
                    <span class="indicator-progress">Menyimpan...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end::modal_tambah_role -->