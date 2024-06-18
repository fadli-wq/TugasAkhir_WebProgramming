<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="icon" href="https://www.upnvj.ac.id/id/files/download/89f8a80e388ced3704b091e21f510755">
    <meta charset="UTF-8">
    <title>Lihat Kritik dan Saran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5 border rounded bg-white py-4 px-5 mb-5">
        <h1 class="text-center"><a href="<?= base_url() ?>" style="text-decoration: none;"><span class="fw-bold text-dark">Kritik dan Saran</span></a></h1>
        <hr>
        <section>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kritik dan Saran</th>
                        <th>Rating</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($kritik_saran)) : ?>
                        <?php $no = 1;
                        foreach ($kritik_saran as $row) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['kritik_saran']) ?></td>
                                <td><?= htmlspecialchars($row['rating']) ?></td>
                                <td>
                                    <?php if (!empty($row['upload_foto'])) : ?>
                                        <img src="<?= base_url('uploads/' . urlencode($row['upload_foto'])) ?>" alt="Foto Kritik Saran" width="100">
                                    <?php else : ?>
                                        Tidak ada foto
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">Tidak ada data yang tersedia</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>