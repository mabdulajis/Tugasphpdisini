<?php
// ARRAY SCALAR
$m1 = ['nim' => 19001, 'nama' => 'Ratna', 'nilai' => 77];
$m2 = ['nim' => 19002, 'nama' => 'Ranti', 'nilai' => 35];
$m3 = ['nim' => 19003, 'nama' => 'Retna', 'nilai' => 89];
$m4 = ['nim' => 19004, 'nama' => 'Ratni', 'nilai' => 63];
$m5 = ['nim' => 19005, 'nama' => 'Retno', 'nilai' => 92];
$m6 = ['nim' => 19006, 'nama' => 'Rasti', 'nilai' => 47];
$m7 = ['nim' => 19007, 'nama' => 'Restu', 'nilai' => 18];
$m8 = ['nim' => 19008, 'nama' => 'Resti', 'nilai' => 84];
$m9 = ['nim' => 19009, 'nama' => 'Rianti', 'nilai' => 59];
$m10 = ['nim' => 19010, 'nama' => 'Rusta', 'nilai' => 26];

// ARRAY ASSOCIATIVE
$mahasiswa = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10];

// ARRAY JUDUL
$arrJudul = ['No', 'NIM', 'Nama', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

// AGGREGATE FUNCTION
$mNilai = array_column($mahasiswa, 'nilai');
$totNilai = array_sum($mNilai);
$jmlMahasiswa = count($mahasiswa);
$maxNilai = max($mNilai);
$minNilai = min($mNilai);
$rataNilai = $totNilai / $jmlMahasiswa;
$informasi = [
    'Nilai Tertinggi' => $maxNilai,
    'Nilai Terendah' => $minNilai,
    'Nilai Rata-rata' => $rataNilai,
    'Jumlah Mahasiswa' => $jmlMahasiswa
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3 PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container p-4">
        <h1 class="text-center">Data Mahasiswa</h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table table-hover table-sm table-bordered border-primary text-center">
                    <thead class="bg-primary text-light">
                        <tr>
                            <?php
                            foreach ($arrJudul as $jdl) {
                            ?>
                                <th><?= $jdl ?></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mahasiswa as $mhs) {
                            //KETERANGAN
                            $ket = ($mhs['nilai'] >= 60) ? 'Lulus' : 'Gagal';

                            // GRADE
                            if ($mhs['nilai'] >= 85 && $mhs['nilai'] <= 100) {
                                $grade = 'A';
                            } else if ($mhs['nilai'] >= 75 && $mhs['nilai'] <= 84) {
                                $grade = 'B';
                            } else if ($mhs['nilai'] >= 65 && $mhs['nilai'] <= 74) {
                                $grade = 'C';
                            } else if ($mhs['nilai'] >= 55 && $mhs['nilai'] <= 64) {
                                $grade = 'D';
                            } else if ($mhs['nilai'] <= 54) {
                                $grade = 'E';
                            } else {
                                $grade = '';
                            }

                            // PREDIKAT
                            switch ($grade) {
                                case "A":
                                    $predikat = "Memuaskan";
                                    break;
                                case "B":
                                    $predikat = "Bagus";
                                    break;
                                case "C":
                                    $predikat = "Cukup";
                                    break;
                                case "D":
                                    $predikat = "Kurang";
                                    break;
                                case "E":
                                    $predikat = "Buruk";
                                    break;
                                default:
                                    $predikat = "";
                                    break;
                            }
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $mhs['nim'] ?></td>
                                <td><?= $mhs['nama'] ?></td>
                                <td><?= $mhs['nilai'] ?></td>
                                <td><?= $ket ?></td>
                                <td><?= $grade ?></td>
                                <td><?= $predikat ?></td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                    <tfoot class="border-secondary bg-dark text-light">
                        <?php
                        foreach ($informasi as $info => $hasil) {
                        ?>
                            <tr>
                                <th colspan=" 6"><?= $info ?></th>
                                <th><?= $hasil ?></th>
                            </tr>
                        <?php } ?>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>