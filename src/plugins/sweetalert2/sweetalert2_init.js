window.loadScreenStart = async function() {
    $('body').prepend('<div id="loadScreen"></div>');
}

window.loadScreenEnd = async function() {
    $('#loadScreen').fadeOut('fast', function() {
        $(this).remove();
    });
}

window.SweetToast = async function(title,icon) {
    Swal.fire({
        title: title,
        icon: icon,
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
}

window.SweetModal = async function(title,url) {
    loadScreenStart();
    $.ajax({
        url: url,
        error: err => {
            Swal.fire({
                title: "An Error Occured",
                html: "error: " + err,
                icon: "error",
                toast: true,
                position: "top-end",
                showCancelButton: true
            });
            loadScreenEnd();
        },
        success: function(resp) {
            if (resp) {
                Swal.fire({
                    title: title,
                    html: resp,
                    position: "top",
                    showConfirmButton: true,
                    confirmButtonText: 'Confirm',
                    showCancelButton: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                });
                loadScreenEnd();
            }
        }
    });
}