// Script untuk memilih pengelola dan desainer

var datalist_pengelola;
var datalist_desainer;
var daftar_pengelola;
var daftar_desainer;

window.addEventListener('load', function() {
    datalist_pengelola = document.getElementById('daftar-pengelola');
    datalist_desainer  = document.getElementById('daftar-desainer');

    daftar_pengelola = getDaftar(datalist_pengelola);
    daftar_desainer  = getDaftar(datalist_desainer);

    let input_pengelola = document.getElementById('pengelola');
    let input_desainer  = document.getElementById('desainer');

    input_pengelola.addEventListener('input', pilihUser.bind(input_pengelola, datalist_pengelola, daftar_pengelola));
    input_desainer.addEventListener('input', pilihUser.bind(input_desainer, datalist_desainer, daftar_desainer));
});

const pilihUser = function(datalist, daftar) {
    let value = this.value.toLowerCase();

    if (value.length <= 2) {
        return;
    }

    for (const nama of daftar) {
        if (nama.includes(value)) {
            return;
        }
    }

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let res = this.response;

            res = JSON.parse(res);

            res.nama_user.forEach( user => {
                let option = document.createElement('option');
                option.setAttribute('value', user.nama);

                datalist.appendChild(option);

                daftar.push(user.nama.toLowerCase());
            });

            document.getElementsByName('csrf_test_name')[0].value = res.csrf;
        }
    }

    let token    = document.getElementsByName('csrf_test_name')[0].value;

    let data = {
        'nama_dicari': value,
        'id': this.id
    }

    xmlhttp.open('POST', '/admin/getDaftarNama', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/json');
    xmlhttp.setRequestHeader('X-CSRF-TOKEN', token);
    xmlhttp.setRequestHeader('X-Requested-With', 'XMLHTTPRequest');
    xmlhttp.send(JSON.stringify(data));
}

const getDaftar = function(datalist) {
    let daftar = [];
    let options = datalist.childNodes;

    options.forEach(option => {
        if (option.value !== undefined) {
            daftar.push(option.value.toLowerCase());
        }
    });

    return daftar;
}