var base_url = $('meta[name="base_url"]').attr('content');
$(document).ready(function(){

    $('#mulaiUjianSiswa').on('click', function(){
        var cek = $('#checkujian').val();
        var kode = $('#code_auth_ujian').val();
        var ujian = $('#id_ujian').val();

        $.ajax({
            type:'post',
            url: base_url + 'cbt_ujian/check_ujian/authentication?kode='+cek,
            data:{
                kode:kode,
                ujian:ujian,
                cek:cek,
            },
            success:function(cek){
                console.log('Connection 200 OK');
                let rows = JSON.parse(cek);
                console.log(rows.tipe);
                swal({
                    icon: rows.tipe,
                    title: rows.tipe,
                    text :rows.pesan,
                    timer: 1250,
                    button:false
                })
                .then((value) => {
                    switch (rows.tipe) {
                        case "success":
                            $.ajax({
                            type:'post',
                            url: base_url + 'ujian/set_session',
                            data:{
                                kode:kode,
                                ujian:ujian,
                            },
                            success:function(){
                                document.location.href = base_url + 'ujian/ujian';
                            }
                        })
                        break;
                      case "error":
                        break;
                   
                      default:
                        swal("Got away safely!");
                    }
                  });
                
               
            },
            error:function(err){
                console.log(err.status + ' ' +  err.statusText);
            }
        })

        // if(cek != 'Saya siap melaksanakan ujian'){
        //     swal('ERROR', 'Pesan tidak sama, mohon ketik ulang','error');
        // }else{
        //     swal('SUKSES', 'Pesan sama','success');
        // }
    })

    $('#dataSiswaUjian').on('click', function(){
        var nis = $('#nis_siswa').val();
        var kelas = $('#id_kelas').val();
        var ujian = $('#id_ujian').val();

        $.ajax({
            type:'post',
            url: base_url + 'cbt_ujian/check_ujian/identitas',
            data:{
                id_siswa:nis,
                id_kelas:kelas,
                id_ujian:ujian,
            },
            success:function(){
                console.log('Connection 200 OK');
            },
            error:function(err){
                console.log(err.status + ' ' +  err.statusText);
            }
        })
        
    })

    $('#id_siswa_ujian').on('click', function(){
        var nis = $('#nis_siswa').val();
        var kelas = $('#id_kelas').val();
        var ujian = $('#id_ujian').val();

        $.ajax({
            type:'post',
            url: base_url + 'cbt_ujian/check_ujian/identitas',
            data:{
                id_siswa:nis,
                id_kelas:kelas,
                id_ujian:ujian,
            },
            success:function(){
                console.log('Connection 200 OK');
            },
            error:function(err){
                console.log(err.status + ' ' +  err.statusText);
            }
        })
        
    })
});

function getSoal(nourut = 0) {
    $("#pilihanNa").html(`Loading Pilihan . . .`);
    $("#soalNa").html(`Loading Soal . . .`);
    $ujianid = $('#sessionSoalUjian').val();
    $.ajax({
        type:'POST',
        url: `${base_url}/cbt_ujian/soal_ujian`,
        data: {noUrut : nourut,ujian:$ujianid},
        success: function(result) {
            get_panel();
            let pilihan = '';
            let panel = '';
            let html = '';
            let button = '';
            let data = JSON.parse(result)
            let pil = data.pilihan;
            pilihan += `
                <img class="m-3" width="600" height="400" src="${base_url}assets/data/soal/${data.gambar}" alt="" >
                `
            $("#soalNa").html(`${data.noSoal}. ${data.soal}`)
            Object.entries(pil).forEach(items => {
                let checked = '';
                const [key, value] = items;
                if (key == data.jawaban) {
                    checked = 'checked'
                }
                pilihan += `
                <li class="list-group-item">
                <label class="checkboxRadio">
                <input name="inputJawabanUjian" id="inputJawabanUjian" class="inputJawabanUjian" type="radio" data-idJawaban="${key}" data-idSoal="${data.idsoal}" data-idnumber="${data.noSoal}" ${ checked }/>
                <span class="primary"></span>
                </label>
                ${key}. ${value}
                <img class="m-3" width="300" height="150" src="${base_url}assets/data/soal/${data.gambar}" alt="" >
                    </li>
                `;
            });
            $("#paginationBtn").html(`
            <div class="col">
            <button class="btn btn-sm btn-primary" id="btnPrevSoal" onclick='getSoal(${data.noSoal - 1})'>Previous</button>
            </div>
            <div class="col text-right mr-4">
            <button class="btn btn-sm btn-primary" id="btnNextSoal" onclick='getSoal(${data.noSoalNext})' >Next</button>
            <button class="btn btn-sm btn-success" id="btnFinishUjian">Finish</button>
            </div>
            `)
                if(data.noSoal==data.jmlSoal){
                    $("#btnNextSoal").hide();
                    $("#btnFinish").show();
                }else if(data.noSoal == 1){
                    $("#btnPrevSoal").attr('disabled', 'true');
                    $("#btnFinishUjian").hide();
                }else{
                    $("#btnNextSoal").show();
                    $("#btnFinishUjian").hide();
                }
            console.log(data.jawaban);
            $("#pilihanNa").html(pilihan);
            console.log(data.waktu);
            const waktu = data.waktu;
            const countDownDate = new Date(waktu).getTime();
            const x = setInterval(function() {
            const now = new Date().getTime();
            const distance = countDownDate - now;
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
            document.getElementById("timerUjian").innerHTML = hours + "h "
            + minutes + "m " + seconds + "s ";
        
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById('mulaiUjianSiswa').removeAttribute('disabled');
                        $('#coming-soon').hide();
                        $('#demo').hide();
                        $('#hr-hr').hide();
                        $('#id_ujian_masuk').show();
                    }
                    }, 1000);
        },
        error: function(error){
            console.log(error);
        }
    })
    

    $('#pilihanNa').on('click','#inputJawabanUjian', function(){
        const jawaban = $(this).data('idjawaban');
        const soal = $(this).data('idsoal');
        const number = $(this).data('idnumber');
        
        $.ajax({
            type:'POST',
            url: `${base_url}ujian/jawaban_ujian`,
            data: {soal : soal,jawaban:jawaban, number:number},
            success: function(res){
                let pesan = JSON.parse(res);
                console.log('Connection 200 OK')
                console.log(pesan);
                get_panel();
            },
            error: function(err){
                console.log(err.status + ' ' + err.statusText)
            }
        })
    })
}

function get_panel(){
        
    $.ajax({
        dataType: 'JSON',
        url: `${base_url}ujian/panel`,
        success: function(res){
            let panel = '';
            res.forEach(item => {
                let warnaPanel = '';
                if (item.selected == 'true') {
                    warnaPanel = 'bg-primary'
                } else if (item.selected == 'false') {
                    warnaPanel = 'bg-secondary'
                    if (item.jawaban != null) 
                        warnaPanel = 'bg-success'
                }
            
                panel += `
                    <div onclick='getSoal(${item.no_urut})' class="card text-white ${warnaPanel} my-3 ml-2" style="width: 5rem;">
                        <div class="card-body text-center">
                            <span class="card-text">${item.no_urut}. <b>${ item.jawaban == null ? '-' : item.jawaban }</b></span>
                        </div>
                    </div>
                `;
                $("#panelJawabanUjian").html(panel);
            })
            // let pesan = JSON.parse(res);
            // console.log('Connection 200 OK')
            // console.log(res);
        },
        error: function(err){
            console.log(err.status + ' ' + err.statusText)
        }
    })
}