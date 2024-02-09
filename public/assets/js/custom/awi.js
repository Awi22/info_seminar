pesan = (status, teks) => {
    v_status = '';
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "2500",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    switch (status) {
        case 'success':
            toastr.success(teks);
            break;
        case 'info':
            toastr.info(teks);
            break;
        case 'warning':
            toastr.warning(teks);
            break;
        case 'error':
            toastr.error(teks);
            break;
        default:
            toastr.error("Unknown Toastr Status");
            break;
    }
}

konfirmasi = (pesan) => {
    e = Swal.fire({
        text: pesan,
        icon: "question",
        showCancelButton: !0,
        buttonsStyling: !1,
        reverseButtons: true,
        cancelButtonText: "Batal",
        confirmButtonText: "Ya",
        customClass: {
            cancelButton: "btn btn-sm fw-bold btn-light-secondary",
            confirmButton: "btn btn-sm fw-bold btn-light-primary btn-active-primary",
        },
    })
    return e;
}

peringatan = (judul, pesan, icon, timer) => {
    if (timer) {
        e = Swal.fire({
            title: judul,
            text: pesan,
            icon: icon,
            timer: timer,
            showCancelButton: false,
            showConfirmButton: false
        })
    } else {
        e = Swal.fire({
            title: judul,
            text: pesan,
            icon: icon,
            buttonsStyling: 1,
            customClass: {
                confirmButton: "btn btn-sm fw-bold btn-light-primary btn-active-primary",
            },
        })
    }
    return e;
}

// document.body.style.zoom = "80%";

// function setZoom() {
// if (window.matchMedia('(min-width: 780px) and (max-width: 1280px)').matches) {
// 	document.body.style.zoom = "80%";
//   } else {
// 	document.body.style.zoom = "100%";
//   }
// }

// function onError(error) {
// 	console.log(`Error: ${error}`);
//   }

//   let setting = browser.tabs.setZoom(2);
//   setting.then(null, onError);

//password meter
// var options = {
//     minLength: 8,
//     checkUppercase: true,
//     checkLowercase: true,
//     checkDigit: true,
//     checkChar: false,
//     scoreHighlightClass: "active"
// };
// var passwordMeterElement = document.querySelector("#password_meter");
// var passwordMeter = new KTPasswordMeter(passwordMeterElement, options);
