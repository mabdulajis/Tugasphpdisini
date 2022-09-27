<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Latihan Memproses Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>

    <body>
        <form class="border border-light p-5" method="POST">

            <p class="h4 mb-4 text-center">Form Gaji</p>

            <label for="nama">Nama Pegawai</label>
            <input type="text" name="namapegawai" class="form-control mb-4" placeholder="Nama Pegawai">

            <label for="agama">Agama</label>
            <select class="browser-default custom-select mb-4" name="agama">
                <option value="" disabled="" selected="">-- Pilih agama --</option>
                <option value="islam">Islam</option>
                <option value="kristen">Kristen</option>
                <option value="katolik">Katolik</option>
                <option value="budha">Budha</option>
                <option value="hindu">Hindu</option>
            </select>
            <br />
            <label for="Jabatan">Jabatan</label> 
            <br/>
            <input type="radio"  name="jabatan" value="manager" checked>Manager<br/>
            <input type="radio"  name="jabatan" value="asisten">Asisten<br/>
            <input type="radio" name="jabatan" value="kabag" >Kabag<br/>
            <input type="radio"  name="jabatan" value="staff">Staff<br/>

            <label for="Status">Status</label>
            <br/>
            <input type="radio"  name="status" value="menikah" checked>Menikah<br/>
            <input type="radio"  name="status" value="belum">Belum<br/>

            <label for="JumlahAnak">Jumlah Anak</label>
            <input type="text" name="jumlahanak" class="form-control mb-4" placeholder="Jumlah Anak">
           
            <button class="btn btn-info btn-block my-4" name="proses" type="submit">Simpan</button>

        </form>
        <?php 
        if (isset($_POST["proses"])) {
            # code...
        //tangkap request

        $namapegawai = $_POST['namapegawai'];
        $agama = $_POST['agama'];
        $jabatan = $_POST['jabatan'];
        $status = $_POST['status'];
        $jumlahanak = $_POST['jumlahanak'];
        $tombol = $_POST['proses'];
        //tentukan gaji pokok
        switch ($jabatan){
            case 'manager': 
                $gapok = 20000000;
                break;
            case 'asisten' :
                $gapok = 15000000;
                break;
            case 'kabag' :
                $gapok = 10000000;
                break;
            case 'staff' :
                $gapok = 4000000;
                break;
        }
        //tentukan tunjangan jabatan
        $tunjangan_jabatan = (20 * $gapok) / 100;
        if ($status == "menikah" && $jumlahanak <= 2){
            $tunjangan_keluarga = (5 * $gapok) / 100;
        } elseif ($status == "menikah" && $jumlahanak <= 5) {
            $tunjangan_keluarga = (10 * $gapok) / 100;
        } elseif ($status == "menikah" && $jumlahanak >= 5) {
            $tunjangan_keluarga = (15 * $gapok) / 100;
        } else {
            $tunjangan_keluarga = 0;
        }

        $gaji_kotor = $gapok + $tunjangan_jabatan + $tunjangan_keluarga;

        $zakat = ($agama == "islam" && $gaji_kotor >= 6000000) ? (2.5 * $gaji_kotor) / 100 : 0;
       
        $take_home = $gaji_kotor - $zakat;
        ?>
  <div class="card" style="width: 100%;">
            <div class="body">
                <div class=" alert alert-primary p-5" role="alert">
                    Nama Pegawai: <?= $namapegawai ?>
                    <br />Agama: <?= $agama ?>
                    <br />Jabatan: <?= $jabatan ?>
                    <br />Gaji profesi: <?= "Rp.".number_format($gapok) ?>
                    <br />Tunjangan jabatan: <?= "Rp.".number_format($tunjangan_jabatan) ?>
                    <br />Tunjangan keluarga: <?= "Rp.".number_format($tunjangan_keluarga) ?>
                    <br />Gaji kotor: <?= "Rp.".number_format($gaji_kotor)?>
                    <br />Zakat : <?= "Rp.".number_format($zakat) ?>
                    <br />Take home : <?= "Rp.".number_format($take_home) ?>
                </div>
            </div>
        </div>
        <?php
    } 


      
        ?>
        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
     
    </body>

</html>