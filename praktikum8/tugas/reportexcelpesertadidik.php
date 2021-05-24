<?php
// include file koneksi.php
include('koneksi.php');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// membuat heading dari tabel padA excel yang terletak pada baris 1
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Jenis Pendaftaran');
$sheet->setCellValue('C1', 'Tanggal Masuk Sekolah');
$sheet->setCellValue('D1', 'NIS');
$sheet->setCellValue('E1', 'Nomor Peserta Ujian');
$sheet->setCellValue('F1', 'PAUD');
$sheet->setCellValue('G1', 'TK');
$sheet->setCellValue('H1', 'Nomor Seri SKHUN');
$sheet->setCellValue('I1', 'Nomor Seri Ijazah');
$sheet->setCellValue('J1', 'Hobi');
$sheet->setCellValue('K1', 'Cita - Cita');
$sheet->setCellValue('L1', 'Nama Lengkap');
$sheet->setCellValue('M1', 'Jenis Kelamin');
$sheet->setCellValue('N1', 'NISN');
$sheet->setCellValue('O1', 'NIK');
$sheet->setCellValue('P1', 'Tempat Lahir');
$sheet->setCellValue('Q1', 'Tanggal Lahir');
$sheet->setCellValue('R1', 'Agama');
$sheet->setCellValue('S1', 'Kebutuhan Khusus');
$sheet->setCellValue('T1', 'Alamat Jalan');
$sheet->setCellValue('U1', 'RT');
$sheet->setCellValue('V1', 'RW');
$sheet->setCellValue('W1', 'Dusun');
$sheet->setCellValue('X1', 'Kelurahan');
$sheet->setCellValue('Y1', 'Kecamatan');
$sheet->setCellValue('Z1', 'Kode Pos');
$sheet->setCellValue('AA1', 'Tempat Tinggal');
$sheet->setCellValue('AB1', 'Transportasi');
$sheet->setCellValue('AC1', 'Nomor HP');
$sheet->setCellValue('AD1', 'Nomor Telepon');
$sheet->setCellValue('AE1', 'Email');
$sheet->setCellValue('AF1', 'Terima KPS');
$sheet->setCellValue('AG1', 'Nomor KPS');
$sheet->setCellValue('AH1', 'Kewarganegaraan');
$sheet->setCellValue('AI1', 'Nama Negara');

// query untuk mengambil data pada tabel pdidik
$query = mysqli_query($koneksi,"select * from pdidik");
// variabel i untuk menyimpan nomor awal cell, bernilai 2 nantinya data ditampilkan mulai dari baris 2
$i = 2;
// variabel nomor untuk memberi urutan nomor, dimulaidari 1
$no = 1;
// setiap perulangan, data disimpan pada variabel row
while($row = mysqli_fetch_array($query))
{
    // menampilkan data dari hasil query, ditampilkan secara berurutaan
    // kolom A untuk nomor
	$sheet->setCellValue('A'.$i, $no++);
    //kolom B untuk jenis_pendaftaran
	$sheet->setCellValue('B'.$i, $row['jenis_pendaftaran']);
    //kolom C untuk tanggal_masuk_sekolah
	$sheet->setCellValue('C'.$i, $row['tanggal_masuk_sekolah']);
    //kolom D untuk nis
	$sheet->setCellValue('D'.$i, $row['nis']);	
    //kolom E untuk nomor_peserta_ujian
	$sheet->setCellValue('E'.$i, $row['nomor_peserta_ujian']);
	//kolom F untuk paud
	$sheet->setCellValue('F'.$i, $row['paud']);
    //kolom G untuk tk
	$sheet->setCellValue('G'.$i, $row['tk']);
    //kolom H untuk nomor_seri_skhun
	$sheet->setCellValue('H'.$i, $row['nomor_seri_skhun']);
    //kolom I untuk nomor_seri_ijazah
	$sheet->setCellValue('I'.$i, $row['nomor_seri_ijazah']);
    //kolom J untuk hobi
	$sheet->setCellValue('J'.$i, $row['hobi']);
    //kolom K untuk cita_cita
	$sheet->setCellValue('K'.$i, $row['cita_cita']);
    //kolom L untuk nama_lengkap
	$sheet->setCellValue('L'.$i, $row['nama_lengkap']);
    //kolom M untuk jenis_kelamin 
	$sheet->setCellValue('M'.$i, $row['jenis_kelamin']);
    //kolom N untuk nisn
	$sheet->setCellValue('N'.$i, $row['nisn']);
    //kolom O untuk nik 
	$sheet->setCellValue('O'.$i, $row['nik']);
    //kolom P untuk tempat_lahir  
	$sheet->setCellValue('P'.$i, $row['tempat_lahir']);
    //kolom Q untuk tanggal_lahir
	$sheet->setCellValue('Q'.$i, $row['tanggal_lahir']);
    //kolom R untuk agama
	$sheet->setCellValue('R'.$i, $row['agama']);
    //kolom S untuk berkebutuhan_khusus
	$sheet->setCellValue('S'.$i, $row['berkebutuhan_khusus']);
    //kolom T untuk alamat_jalan
	$sheet->setCellValue('T'.$i, $row['alamat_jalan']);
    //kolom U untuk rt
	$sheet->setCellValue('U'.$i, $row['rt']);
    //kolom V untuk rw
	$sheet->setCellValue('V'.$i, $row['rw']);
    //kolom W untuk dusun
	$sheet->setCellValue('W'.$i, $row['dusun']);
    //kolom X untuk kelurahan
	$sheet->setCellValue('X'.$i, $row['kelurahan']);
    //kolom Y untuk kecamatan
	$sheet->setCellValue('Y'.$i, $row['kecamatan']);
    //kolom Z untuk kode_pos 
	$sheet->setCellValue('Z'.$i, $row['kode_pos']);
    //kolom AA untuk tempat_tinggal 
	$sheet->setCellValue('AA'.$i, $row['tempat_tinggal']);
    //kolom AB untuk transportasi 
	$sheet->setCellValue('AB'.$i, $row['transportasi']);
    //kolom AC untuk  nomor hp
	$sheet->setCellValue('AC'.$i, $row['hp']);
    //kolom AD untuk  nomor telp
	$sheet->setCellValue('AD'.$i, $row['telp']);
    //kolom AE untuk  email
	$sheet->setCellValue('AE'.$i, $row['email']);
    //kolom AF untuk terima_kps
	$sheet->setCellValue('AF'.$i, $row['terima_kps']);
    //kolom AG untuk kps
	$sheet->setCellValue('AG'.$i, $row['kps']);
    //kolom AH untuk kwn 
	$sheet->setCellValue('AH'.$i, $row['kwn']);
    //kolom AI untuk nama_negara
	$sheet->setCellValue('AI'.$i, $row['nama_negara']);
    $i++;
}

$styleArray = [
            // mengatur border untuk cell
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
$i = $i - 1;
// border digunakan dari cell A1 hingga kolom AI dengan baris diakhir perulangan data
$sheet->getStyle('A1:AI'.$i)->applyFromArray($styleArray);

// membuat report dalam bentuk xlsx
$writer = new Xlsx($spreadsheet);
// nama file excel yang akan disimpan
$writer->save('Report Data Peserta Didik.xlsx');
?>

<!doctype html>
<html>
<head>
	<title>Report EXCEL </title>
    <!-- pengaturan style untuk body dan h1 -->
	<style>
        body {background-color: #E6E6FA; 
			  width: 100%;
			  margin: auto;
			  text-align: center;
             }
        h1 {
            text-align: center;
            font-family: tahoma;
            color:black;
            background-color: lightcoral;
        } 
    </style>
</head>
<h1> DOKUMEN EXCEL BERHASIL DIBUAT</h1>
<body>
        Selamat, Dokumen Excel Berhasil Dicetak !
</body>
</html>