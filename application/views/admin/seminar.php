<!--begin::Fonts(mandatory for all pages)-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<!--end::Fonts-->

<!--begin::Vendor Stylesheets(used for this page only)-->
<link href="<?= base_url() ?>public/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Vendor Stylesheets-->


<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
<link href="<?= base_url() ?>public/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>public/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->

<!--begin::Google tag-->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-37564768-1');
</script>
<!--end::Google tag-->
<script>
    // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
    if (window.top != window.self) {
        window.top.location.replace(window.self.location.href);
    }
</script>


<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid " id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        <?= $judul ?>
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">
                        Tambah data </a>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">
                <!--begin::Products-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4"><span class="path1"></span><span class="path2"></span></i> <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Report" />
                            </div>
                            <!--end::Search-->
                            <!--begin::Export buttons-->
                            <div id="kt_ecommerce_report_sales_export" class="d-none"></div>
                            <!--end::Export buttons-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <!--begin::Export dropdown-->
                            <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-exit-up fs-2"><span class="path1"></span><span class="path2"></span></i> Export Report
                            </button>
                            <!--begin::Menu-->
                            <div id="kt_ecommerce_report_sales_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-export="copy">
                                        Copy to clipboard
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-export="excel">
                                        Export as Excel
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-export="csv">
                                        Export as CSV
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-export="pdf">
                                        Export as PDF
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                            <!--end::Export dropdown-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-0">

                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_report_sales_table">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px">Date</th>
                                    <th class="text-end min-w-75px">No. Orders</th>
                                    <th class="text-end min-w-75px">Products Sold</th>
                                    <th class="text-end min-w-75px">Tax</th>
                                    <th class="text-end min-w-100px">Total</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                <tr>
                                    <td>
                                        Apr 15, 2024 </td>
                                    <td class="text-end pe-0">
                                        2 </td>
                                    <td class="text-end pe-0">
                                        5 </td>
                                    <td class="text-end pe-0">
                                        $82.00
                                    </td>
                                    <td class="text-end">
                                        $545.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nov 10, 2024 </td>
                                    <td class="text-end pe-0">
                                        1 </td>
                                    <td class="text-end pe-0">
                                        5 </td>
                                    <td class="text-end pe-0">
                                        $4.00
                                    </td>
                                    <td class="text-end">
                                        $27.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Feb 21, 2024 </td>
                                    <td class="text-end pe-0">
                                        13 </td>
                                    <td class="text-end pe-0">
                                        16 </td>
                                    <td class="text-end pe-0">
                                        $47.00
                                    </td>
                                    <td class="text-end">
                                        $311.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Dec 20, 2024 </td>
                                    <td class="text-end pe-0">
                                        20 </td>
                                    <td class="text-end pe-0">
                                        23 </td>
                                    <td class="text-end pe-0">
                                        $86.00
                                    </td>
                                    <td class="text-end">
                                        $576.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Jul 25, 2024 </td>
                                    <td class="text-end pe-0">
                                        1 </td>
                                    <td class="text-end pe-0">
                                        3 </td>
                                    <td class="text-end pe-0">
                                        $70.00
                                    </td>
                                    <td class="text-end">
                                        $469.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Jun 24, 2024 </td>
                                    <td class="text-end pe-0">
                                        17 </td>
                                    <td class="text-end pe-0">
                                        21 </td>
                                    <td class="text-end pe-0">
                                        $9.00
                                    </td>
                                    <td class="text-end">
                                        $59.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Oct 25, 2024 </td>
                                    <td class="text-end pe-0">
                                        19 </td>
                                    <td class="text-end pe-0">
                                        22 </td>
                                    <td class="text-end pe-0">
                                        $9.00
                                    </td>
                                    <td class="text-end">
                                        $61.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Apr 15, 2024 </td>
                                    <td class="text-end pe-0">
                                        19 </td>
                                    <td class="text-end pe-0">
                                        22 </td>
                                    <td class="text-end pe-0">
                                        $25.00
                                    </td>
                                    <td class="text-end">
                                        $166.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Mar 10, 2024 </td>
                                    <td class="text-end pe-0">
                                        6 </td>
                                    <td class="text-end pe-0">
                                        10 </td>
                                    <td class="text-end pe-0">
                                        $6.00
                                    </td>
                                    <td class="text-end">
                                        $41.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Jun 20, 2024 </td>
                                    <td class="text-end pe-0">
                                        19 </td>
                                    <td class="text-end pe-0">
                                        21 </td>
                                    <td class="text-end pe-0">
                                        $29.00
                                    </td>
                                    <td class="text-end">
                                        $190.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Feb 21, 2024 </td>
                                    <td class="text-end pe-0">
                                        4 </td>
                                    <td class="text-end pe-0">
                                        6 </td>
                                    <td class="text-end pe-0">
                                        $41.00
                                    </td>
                                    <td class="text-end">
                                        $273.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        May 05, 2024 </td>
                                    <td class="text-end pe-0">
                                        6 </td>
                                    <td class="text-end pe-0">
                                        9 </td>
                                    <td class="text-end pe-0">
                                        $26.00
                                    </td>
                                    <td class="text-end">
                                        $175.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nov 10, 2024 </td>
                                    <td class="text-end pe-0">
                                        4 </td>
                                    <td class="text-end pe-0">
                                        6 </td>
                                    <td class="text-end pe-0">
                                        $88.00
                                    </td>
                                    <td class="text-end">
                                        $585.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Mar 10, 2024 </td>
                                    <td class="text-end pe-0">
                                        16 </td>
                                    <td class="text-end pe-0">
                                        20 </td>
                                    <td class="text-end pe-0">
                                        $39.00
                                    </td>
                                    <td class="text-end">
                                        $259.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Mar 10, 2024 </td>
                                    <td class="text-end pe-0">
                                        1 </td>
                                    <td class="text-end pe-0">
                                        3 </td>
                                    <td class="text-end pe-0">
                                        $29.00
                                    </td>
                                    <td class="text-end">
                                        $194.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Sep 22, 2024 </td>
                                    <td class="text-end pe-0">
                                        15 </td>
                                    <td class="text-end pe-0">
                                        18 </td>
                                    <td class="text-end pe-0">
                                        $87.00
                                    </td>
                                    <td class="text-end">
                                        $583.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Apr 15, 2024 </td>
                                    <td class="text-end pe-0">
                                        12 </td>
                                    <td class="text-end pe-0">
                                        17 </td>
                                    <td class="text-end pe-0">
                                        $90.00
                                    </td>
                                    <td class="text-end">
                                        $597.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        May 05, 2024 </td>
                                    <td class="text-end pe-0">
                                        18 </td>
                                    <td class="text-end pe-0">
                                        23 </td>
                                    <td class="text-end pe-0">
                                        $45.00
                                    </td>
                                    <td class="text-end">
                                        $302.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Jul 25, 2024 </td>
                                    <td class="text-end pe-0">
                                        12 </td>
                                    <td class="text-end pe-0">
                                        17 </td>
                                    <td class="text-end pe-0">
                                        $13.00
                                    </td>
                                    <td class="text-end">
                                        $85.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        May 05, 2024 </td>
                                    <td class="text-end pe-0">
                                        17 </td>
                                    <td class="text-end pe-0">
                                        21 </td>
                                    <td class="text-end pe-0">
                                        $80.00
                                    </td>
                                    <td class="text-end">
                                        $534.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Sep 22, 2024 </td>
                                    <td class="text-end pe-0">
                                        17 </td>
                                    <td class="text-end pe-0">
                                        19 </td>
                                    <td class="text-end pe-0">
                                        $59.00
                                    </td>
                                    <td class="text-end">
                                        $390.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Sep 22, 2024 </td>
                                    <td class="text-end pe-0">
                                        9 </td>
                                    <td class="text-end pe-0">
                                        11 </td>
                                    <td class="text-end pe-0">
                                        $48.00
                                    </td>
                                    <td class="text-end">
                                        $323.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Mar 10, 2024 </td>
                                    <td class="text-end pe-0">
                                        12 </td>
                                    <td class="text-end pe-0">
                                        17 </td>
                                    <td class="text-end pe-0">
                                        $19.00
                                    </td>
                                    <td class="text-end">
                                        $127.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Mar 10, 2024 </td>
                                    <td class="text-end pe-0">
                                        6 </td>
                                    <td class="text-end pe-0">
                                        10 </td>
                                    <td class="text-end pe-0">
                                        $67.00
                                    </td>
                                    <td class="text-end">
                                        $446.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Mar 10, 2024 </td>
                                    <td class="text-end pe-0">
                                        16 </td>
                                    <td class="text-end pe-0">
                                        18 </td>
                                    <td class="text-end pe-0">
                                        $80.00
                                    </td>
                                    <td class="text-end">
                                        $532.00
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Apr 15, 2024 </td>
                                    <td class="text-end pe-0">
                                        5 </td>
                                    <td class="text-end pe-0">
                                        8 </td>
                                    <td class="text-end pe-0">
                                        $77.00
                                    </td>
                                    <td class="text-end">
                                        $516.00
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

    <!--begin::Footer-->
    <div id="kt_app_footer" class="app-footer ">
        <!--begin::Footer container-->
        <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
            <!--begin::Copyright-->
            <div class="text-gray-900 order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">2024&copy;</span>
                <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
            </div>
            <!--end::Copyright-->

            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                <li class="menu-item"><a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a></li>

                <li class="menu-item"><a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a></li>

                <li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a></li>
            </ul>
            <!--end::Menu-->
        </div>
        <!--end::Footer container-->
    </div>
    <!--end::Footer-->
</div>
<!--end:::Main-->