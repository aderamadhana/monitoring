<html>

<body>
    <p style="text-align: center;"><strong>KEPOLISIAN NEGARA REPUBLIK INDONESIA</strong></p>
    <p style="text-align: center;"><strong>DAERAH LAMPUNG</strong></p>
    <p style="text-align: center;"><strong>DIREKTORAT RESERSE KRIMINAL UMUM</strong></p>
    <p>&nbsp;</p>
    <p style="text-align: center;"><span style="text-decoration: underline;"><strong>LAPORAN POLISI</strong></span></p>
    <p style="text-align: center;">Nomor: LP/144/X/2021/Ditreseirse</p>
    <hr />
    <p>&nbsp;</p>
    <p>1. Identitas pelapor, pelaku, korban, dan saksi</p>
    <table style="border-collapse: collapse; width: 100%;" >
        <tbody>
            <tr>
                <td style="width: 15.4779%;">Data Pelapor</td>
                <td style="width: 2.32896%;">&nbsp;</td>
                <td style="width: 17.6613%;"></td>
                <td style="width: 14.3134%;">Data Pelaku</td>
                <td style="width: 2.37747%;">&nbsp;</td>
                <td style="width: 17.6613%;"></td>
                <td style="width: 13.44%;">Data Korban</td>
                <td style="width: 2.23196%;">&nbsp;</td>
                <td style="width: 17.6613%;"></td>
                <td style="width: 13.44%;">Data Saksi</td>
                <td style="width: 2.23196%;">&nbsp;</td>
                <td style="width: 17.6613%;"></td>
            </tr>
            <tr>
                <td style="width: 15.4779%;">Nama</td>
                <td style="width: 2.32896%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['NAMA_PELAPOR'] ?></td>
                <td style="width: 14.3134%;">Nama</td>
                <td style="width: 2.37747%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['NAMA_PELAKU'] ?></td>
                <td style="width: 13.44%;">Nama</td>
                <td style="width: 2.23196%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['NAMA_KORBAN'] ?></td>
                <td style="width: 13.44%;">Nama</td>
                <td style="width: 2.23196%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['NAMA_SAKSI'] ?></td>
            </tr>
            <tr>
                <td style="width: 15.4779%;">Tempat, Tanggal Lahir</td>
                <td style="width: 2.32896%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['TEMPAT_LAHIR_PELAPOR'] ?>, <?= $kejadian['TANGGAL_LAHIR_PELAPOR'] ?></td>
                <td style="width: 14.3134%;">Tempat, Tanggal Lahir</td>
                <td style="width: 2.37747%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['TEMPAT_LAHIR_PELAKU'] ?>, <?= $kejadian['TANGGAL_LAHIR_PELAKU'] ?></td>
                <td style="width: 13.44%;">Tempat, Tanggal Lahir</td>
                <td style="width: 2.23196%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['TEMPAT_LAHIR_KORBAN'] ?>, <?= $kejadian['TANGGAL_LAHIR_KORBAN'] ?></td>
                <td style="width: 13.44%;">Tempat, Tanggal Lahir</td>
                <td style="width: 2.23196%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['TEMPAT_LAHIR_SAKSI'] ?>, <?= $kejadian['TANGGAL_LAHIR_SAKSI'] ?></td>
            </tr>
            <tr>
                <td style="width: 15.4779%;">Alamat</td>
                <td style="width: 2.32896%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['ALAMAT_PELAPOR'] ?></td>
                <td style="width: 14.3134%;">Alamat</td>
                <td style="width: 2.37747%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['ALAMAT_PELAKU'] ?></td>
                <td style="width: 13.44%;">Alamat</td>
                <td style="width: 2.23196%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['ALAMAT_KORBAN'] ?></td>
                <td style="width: 13.44%;">Alamat</td>
                <td style="width: 2.23196%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['ALAMAT_SAKSI'] ?></td>
            </tr>
            <tr>
                <td style="width: 15.4779%;">Jenis Kelamin</td>
                <td style="width: 2.32896%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['JENIS_KELAMIN_PELAPOR'] ?></td>
                <td style="width: 14.3134%;">Jenis Kelamin</td>
                <td style="width: 2.37747%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['JENIS_KELAMIN_PELAKU'] ?></td>
                <td style="width: 13.44%;">Jenis Kelamin</td>
                <td style="width: 2.23196%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['JENIS_KELAMIN_KORBAN'] ?></td>
                <td style="width: 13.44%;">Jenis Kelamin</td>
                <td style="width: 2.23196%;">:</td>
                <td style="width: 17.6613%;"><?= $kejadian['JENIS_KELAMIN_SAKSI'] ?></td>
            </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <hr />
    <p>2. Detail kejadian</p>
    <table style="border-collapse: collapse; width: 100%;" border="1">
        <tbody>
            <tr>
                <td style="width: 50%;">Peristiwa</td>
                <td style="width: 50%;"><?= $kejadian['PERISTIWA'] ?></td>
            </tr>
            <tr>
                <td style="width: 50%;">Runtutan Kejadian</td>
                <td style="width: 50%;"><?= $kejadian['KETERANGAN_KEJADIAN'] ?></td>
            </tr>
            <tr>
                <td style="width: 50%;">Kategori Kejadian</td>
                <td style="width: 50%;"><?= $kejadian['KATEGORI_KEJADIAN'] ?></td>
            </tr>
            <tr>
                <td style="width: 50%;">Tempat Kejadian</td>
                <td style="width: 50%;"><?= $kejadian['TEMPAT_KEJADIAN'] ?></td>
            </tr>
            <tr>
                <td style="width: 50%;">Waktu Kejadian</td>
                <td style="width: 50%;"><?= $kejadian['TANGGAL_KEJADIAN'] . " : " . $kejadian['WAKTU_KEJADIAN'] ?></td>
            </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <hr />
    <p>&nbsp;</p>
    <!-- <p>3. Status Verifikasi</p> -->
    <table style="border-collapse: collapse; width: 100.146%; height: 86px;" border="1">
        <tbody>
            <tr>
                <td style="width: 50%;">Nama Pencatat</td>
                <td style="width: 50%;"><?= $nip_pencatat['NAMA'] ?></td>
            </tr>
            <?php
                if ($nip_validator != null) {
            ?>
            <tr>
                <td style="width: 50%;">Nama Validator</td>
                <td style="width: 50%;"><?= $nip_validator['NAMA'] ?></td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td style="width: 50%;">Status Pelapor</td>
                <td style="width: 50%;"><?= $kejadian['STATUS_KEJADIAN'] ?></td>
            </tr>
            <tr>
                <td style="width: 50%;">Tanggal Validasi</td>
                <td style="width: 50%;"><?= $kejadian['TANGGAL_VALIDASI'] ?></td>
            </tr>
            <tr>
                <td style="width: 50%;">Tempat Pencatatan</td>
                <td style="width: 50%;"><?= $polsek['NAMA_POLSEK'] ?></td>
            </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <hr />
    <p><input id="ext" type="hidden" value="1" /></p>
</body>

</html>