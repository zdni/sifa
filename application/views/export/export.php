<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemeriksaan <?= $title_pdf ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="text-center">
            <h2><?= $title_pdf ?></h2>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 50px">No.</th>
                                <th>Darah</th>
                                <th>Berat Badan</th>
                                <th>Detak Jantung</th>
                                <th>Suhu Tubuh</th>
                                <th>Imunisasi</th>
                                <th>Penyuluhan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($pemeriksaans as $pemeriksaan) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $pemeriksaan->darah; ?></td>
                                    <td><?= $pemeriksaan->bb; ?></td>
                                    <td><?= $pemeriksaan->jantung; ?></td>
                                    <td><?= $pemeriksaan->suhu; ?></td>
                                    <td><?= $pemeriksaan->imunisasiibu_name; ?></td>
                                    <td><?= $pemeriksaan->penyuluhanibu_name; ?></td>
                                </tr>
                            <?php $no++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>