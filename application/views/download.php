<?php
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'default_font_size' => 0,
    'default_font' => '',
    'margin_left' => 20,
    'margin_right' => 20,
    'margin_top' => 5,
    'margin_bottom' => 5,
    'margin_header' => 5,
    'margin_footer' => 5,
    'orientation' => 'P',
]);
$kls = substr($this->session->userdata('kelas'), 4, 3);
if ($kls == "IPA") {
    $kelas = "PEMINATAN ILMU PENGETAHUAN ALAM (IPA)";
} else {
    $kelas = "PEMINATAN ILMU PENGETAHUAN SOSIAL (IPS)";
}
$html = '<!DOCTYPE html>
<html>
<head>
<title>' . $this->session->userdata('nama') . '</title>
<link rel="apple-touch-icon" href="' . base_url() . 'assets/images/logo.png">
<link rel="shortcut icon" type="image/x-icon" href="' . base_url() . 'assets/images/logo.png">
</head>
<body style="font-size:13px;">';
$html .= '<img src="' . base_url('assets/images/kop.png') . '" style="width:100%;">';
$html .= '
<div style="text-align:center;"><h3 style="margin-bottom:-2px;"><b><u>PENGUMUMAN KELULUSAN</u></b></h3>
Nomor : 423.7/......./SMA.08/V/2022</div><br>
Kepala SMA Negeri 1 Anjatan Selaku Ketua Penyelenggara Ujian Sekolah Tahun Pelajaran 2021/2022 berdasarkan :
<ol>
<li>Ketuntasan dari seluruh program pembelajaran pada kurikulum 2013</li>
<li>Kriteria kelulusan dari satuan pendidikan sesuai dengan Surat Edaran Kadisdik Jabar No.17225/PK.03.04.06-Bid.PSMA Tentang Surat Keterangan Lulus SDLB,SMPLB, SMA/SMALB dan SMK Tahun Pelajaran 2021/2022</li>
<li>Rapat Pleno Dewan Guru tentang Kelulusan pada tanggal 28 April 2022</li>
</ol>
Menerangkan bahwa:
';
$html .= '
<table width="100%">
<tr>
<td width="40%">Nama</td>
<td width="2%">:</td>
<td><b>' . $this->session->userdata('nama') . '</b></td>
</tr>
<tr>
<td>NIS/NISN</td>
<td>:</td>
<td>' . $this->session->userdata('nis') . ' / ' . $this->session->userdata('nisn') . '</td>
</tr>
<tr>
<td>Peminatan / Kompetensi Keahlian</td>
<td>:</td>
<td>' . $kelas . '</td>
</tr>
<tr>
<td>Dinyatakan</td>
<td>:</td>
<td></td>
</tr>
<tr>
<td colspan="3" style="text-align:center;"><h2>LULUS</h2></td>
</tr>
</table>
';
$html .= '
Pengumuman & Informasi
<ol>
    <li>Pembagian Surat Keterangan Lulus (SKL)</li>
    <table width="90%" border="1" style="font-size:13px;border-collapse:collapse;">
        <tr style="text-align:center;" style="background-color:#ddd;">
            <th>Tanggal 12 Mei 2022</th>
            <th>Ruang</th>
            <th>Tanggal 13 Mei 2022</th>
            <th>Ruang</th>
        </tr>
        <tr>
            <td>XII IPA-1 (08.00-09.00)</td>
            <td style="text-align:center;" rowspan="2">XII IPA-1</td>
            <td>XII IPA-7 (08.00-09.00)</td>
            <td style="text-align:center;" rowspan="2">XII IPA-1</td>
        </tr>
        <tr>
            <td>XII IPA-2 (10.00-11.00)</td>
            <td>XII IPS-1 (10.00-11.00)</td>
        </tr>
        <tr>
            <td>XII IPA-3 (08.00-09.00)</td>
            <td style="text-align:center;" rowspan="2">XII IPA-2</td>
            <td>XII IPS-2 (08.00-09.00)</td>
            <td style="text-align:center;" rowspan="2">XII IPA-2</td>
        </tr>
        <tr>
            <td>XII IPA-4 (10.00-11.00)</td>
            <td>XII IPS-3 (10.00-11.00)</td>
        </tr>
        <tr>
            <td>XII IPA-5 (08.00-09.00)</td>
            <td style="text-align:center;" rowspan="2">XII IPA-3</td>
            <td>XII IPS-4 (08.00-09.00)</td>
            <td style="text-align:center;" rowspan="2">XII IPA-3</td>
        </tr>
        <tr>
            <td>XII IPA-6 (10.00-11.00)</td>
            <td>XII IPS-5 (10.00-11.00)</td>
        </tr>
    </table>
    <li>Sesuai dengan surat pernyataan yang ditanda tangani siswa dilarang untuk :</li>
    a). Konvoi kendaraan bermotor<br>
    b). Corat-coret pakaian seragam dan atau tembok bangunan<br>
    c). Merusak fasilitas umum<br>
    d). Pesta miras, Narkoba & sejenisnya.
    <li>Bagi siswa yang memiliki sangkutan :</li>
    a). Sangkutan keuangan agar segera menghubungi (Ibu Heni Indriangingsih)<br>
    b). Pengembalian buku perpustakaan menghubungi (Ibu Lia Herlianingsih).
    <li>Bagi siswa yang mau bersodaqoh baju seragam agar dibawa saat pengambilan SKL dan dapat dititipkan ke Bapak Khaerul Muslimin.</li>
</ol>
Demikian pengumuman kelulusan, kami sampaikan untuk dipergunakan sebagai mana mestinya.
<table width="100%" style="margin-top:35px;">
    <tr>
        <td width="70%"></td>
        <td>
            Anjatan, 5 Mei 2022<br>
            Kepala Sekolah, <br>
            <img src="' . base_url() . 'assets/images/ttd.png" style="margin:10px;width:90px;"/><br>
            <b><u>DARYAM, S.Pd., M.Pd.</u></b><br>
            Pembina Tk. I<br>
            NIP. 196810031994121004
        </td>
    </tr>
</table>
';
$html .= '</body></html>';
$mpdf->WriteHTML($html);
$mpdf->Output();
