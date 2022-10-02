<?php
class Pegawai
{
    // VARIABEL
    public $nip;
    public $nama;
    public $jabatan;
    public $agama;
    public $status;
    public $gapok;
    public $tunjab;
    public $tunkel;
    public $zaprof;

    // KONSTRUKTOR
    public function __construct($nip, $nama, $jabatan, $agama, $status)
    {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
    }

    // METHOD
    public function setGapok($jabatan)
    {
        $this->jabatan = $jabatan;
        switch ($jabatan) {
            case 'Manager':
                $gapok = '15000000';
                break;
            case 'Asisten':
                $gapok = '10000000';
                break;
            case 'Kabag':
                $gapok = '7000000';
                break;
            case 'Staff':
                $gapok = '4000000';
                break;
            default:
                $gapok = '';
        }
        return $gapok;
    }
    public function setTunjab($gapok)
    {
        $gapok = $this->setGapok($this->jabatan);
        $tunjab = $gapok * 0.2;
        return $tunjab;
    }
    public function setTunkel($status, $gapok)
    {
        $this->status = $status;
        $gapok = $this->setGapok($this->jabatan);
        $tunkel = ($status == 'Menikah') ? $tunkel = $gapok * 0.1 : $tunkel = 0;
        return $tunkel;
    }
    public function setGator($gapok, $tunjab, $tunkel)
    {
        $gapok = $this->setGapok($this->jabatan);
        $tunjab = $this->setTunjab($this->gapok);
        $tunkel = $this->setTunkel($this->status, $this->gapok);
        $gator = $gapok + $tunjab + $tunkel;
        return $gator;
    }
    public function setZaprof($agama, $gapok, $gator)
    {
        $this->agama = $agama;
        $gapok = $this->setGapok($this->jabatan);
        $gator = $this->setGator($this->gapok, $this->tunjab, $this->tunkel);
        $zaprof = ($agama == 'Islam' && $gator >= 6000000) ? $zaprof = $gapok * 0.025 : $zaprof = 0;
        return $zaprof;
    }
    public function mencetak()
    {
        $gator = $this->setGator($this->gapok, $this->tunjab, $this->tunkel);
        $zaprof = $this->setZaprof($this->agama, $this->gapok, $this->tunjab, $this->tunkel);
        $thp = $gator - $zaprof;
        echo '<b><u>' . $this->nama . '</u></b>';
        echo '<br/>NIP: ' . $this->nip;
        echo '<br/>Jabatan Pegawai: ' . $this->jabatan;
        echo '<br/>Agama Pegawai: ' . $this->agama;
        echo '<br/>Status Pegawai: ' . $this->status;
        echo '<br/>Gaji Pokok: Rp. ' . number_format($this->setGapok($this->jabatan), 0, ',', '.');
        echo '<br/>Tunjangan Jabatan: Rp. ' . number_format($this->setTunjab($this->gapok), 0, ',', '.');
        echo '<br/>Tunjangan Keluarga: Rp. ' . number_format($this->setTunkel($this->status, $this->gapok), 0, ',', '.');
        echo '<br/>Zakat Profesi: Rp. ' . number_format($this->setZaprof($this->agama, $this->gapok, $this->tunjab, $this->tunkel), 0, ',', '.');
        echo '<br/><b>Gaji Bersih: Rp. ' . number_format($thp, 0, ',', '.') . '</b>';
        echo '<hr/>';
    }
}