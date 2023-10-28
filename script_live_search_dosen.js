var keyword = document.getElementById('keyword');
var cari = document.getElementById('cari');
var wadah = document.getElementById('wadah');

keyword.addEventListener('keyup', function(){

    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function(){
        if (ajax.readyState == 4 && ajax.status == 200){
             // ambil data dari resultAjax.php yg ada di ajax.open, tampilkan semua yg ada di var "wadah" yg berasal dari data_dosen.php
             // jadi apapun yg ada di dalam resultAjax.php.
            wadah.innerHTML = ajax.responseText;
        }
    }

    ajax.open('GET', 'ajax/ajax_data_dosen.php?keyword=' + keyword.value, true); // true artinya search real time
    ajax.send();

});
