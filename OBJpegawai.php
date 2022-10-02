<?php
require 'Pegawai.php';
// MEMBUAT OBJECT
$p1 = new Pegawai(19001, 'Anggra astuti', 'Kabag', 'Islam', 'Belum Menikah');
$p2 = new Pegawai(19002, 'Bedul yuhu ', 'Staff', 'Kristen', 'Belum Menikah');
$p3 = new Pegawai(19003, 'Midat entong', 'Manager', 'Islam', 'Menikah');
$p4 = new Pegawai(19004, 'Abang gustian', 'Staff', 'Islam', 'Menikah');
$p5 = new Pegawai(19005, 'Entong Gapur', 'Asisten', 'Hindu', 'Belum Menikah');

//CETAK
$p1->mencetak();
$p2->mencetak();
$p3->mencetak();
$p4->mencetak();
$p5->mencetak();