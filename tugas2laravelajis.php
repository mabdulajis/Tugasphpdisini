<?php

use App\Http\Controllers\mahasiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return ('<h1>Hi! Welcome To Laravel 9.0</h1>');
});

Route::get('/salam', function () {
    return view('salam');
});

Route::get('/data', [mahasiswaController::class, 'dataMahasiswa']);
Route::get('/nilai', [mahasiswaController::class, 'nilaiMahasiswa']);




<?php
// ARRAY JUDUL
$arrJudul = ['No', 'Nama', 'Nilai', 'Keterangan'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2 Laravel</title>
</head>

<body>
    <h1>Data Nilai Siswa</h1>
    <table border="1">
        <thead>
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
            foreach ($siswa as $sw) {
                //KETERANGAN
                $ket = ($sw['nilai'] >= 60) ? 'Lulus' : 'Gagal';
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $sw['nama'] ?></td>
                    <td><?= $sw['nilai'] ?></td>
                    <td><?= $ket ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>

</body>

</html>



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    public function dataMahasiswa()
    {
        $m1 = 'Budi Santoso';
        $am1 = 'Bandung';
        $m2 = 'Siti Aminah';
        $am2 = 'Tanjung Enim';

        return view(
            'daftar_mahasiswa',
            compact('m1', 'am1', 'm2', 'am2')
        );
    }

    public function nilaiMahasiswa()
    {
        // ARRAY SCALAR
        $s1 = ['nama' => 'Fawwaz', 'nilai' => 85];
        $s2 = ['nama' => 'Bedu', 'nilai' => 58];
        $s3 = ['nama' => 'Siti', 'nilai' => 95];
        $s4 = ['nama' => 'Deden', 'nilai' => 30];

        // ARRAY ASSOCIATIVE
        $siswa = [$s1, $s2, $s3, $s4];

        return view(
            'nilai_mahasiswa',
            compact('siswa')
        );
    }
}
