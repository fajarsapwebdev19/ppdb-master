// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();


// untuk date picker



// untuk hanya angka saja

// Validasi karakter yang boleh diinpukan pada form
function getkey(e) {
    if (window.event)
        return window.event.keyCode;
    else if (e)
        return e.which;
    else
        return null;
}

function goodchars(e, goods, field) {
    var key, keychar;
    key = getkey(e);
    if (key == null) return true;

    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();
    goods = goods.toLowerCase();

    // check goodkeys
    if (goods.indexOf(keychar) != -1)
        return true;
    // control keys
    if (key == null || key == 0 || key == 8 || key == 9 || key == 27)
        return true;

    if (key == 13) {
        var i;
        for (i = 0; i < field.form.elements.length; i++)
            if (field == field.form.elements[i])
                break;
        i = (i + 1) % field.form.elements.length;
        field.form.elements[i].focus();
        return false;
    };
    // else return false
    return false;
}

function validasiFile() {
    var fileInput = document.getElementById('foto');
    var filePath = fileInput.value;
    var fileSize = $('#foto')[0].files[0].size;
    // tentukan extension yang diperbolehkan
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    // Jika tipe file yang diupload tidak sesuai dengan allowedExtensions, tampilkan pesan :
    if (!allowedExtensions.exec(filePath)) {
        alert('Tipe file foto tidak sesuai. Harap unggah file foto yang memiliki tipe *.jpg atau *.png');
        fileInput.value = '';
        document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default.png"/>';
        return false;
    }
    // jika ukuran file yang diupload lebih dari sama dengan 1 Mb
    else if (fileSize >= 1000000) {
        alert('Ukuran file foto lebih dari 1 Mb. Harap unggah file foto yang memiliki ukuran maksimal 1 Mb.');
        fileInput.value = '';
        document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="foto/default.png"/>';
        return false;
    }
    // selain itu
    else {
        // Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img class="foto-preview" src="' + e.target.result + '"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

$('#tgl').datepicker({
    format: 'dd-mm-yyyy',
    todayHighlight: true
});


$('#tgl2').datepicker({
    format: 'dd-mm-yyyy',
    todayHighlight: true
});
