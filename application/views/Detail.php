<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <title><?= $title?></title>
    </head>
    <body>
        <div class="container mt-4">
            <div class="row mb-4">
                <div class="col">
                    <a href="<?= base_url()?>Home"><button class="btn btn-secondary">Kembali</button></a>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#keluar">Tarik Saldo</button>
                    <a href="<?= base_url()?>Login/logout"><button class="btn btn-danger">Logout</button></a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="container text-center">
                                <img src="<?= base_url()?>assets/Icons/pisah.svg" alt="" style="width: 20%" class="align-content-center mb-4">
                                <h5 class="card-title font-weight-bold text-primary">Kebutuhan</h5>
                                <h6 class="card-subtitle mb-2 text-muted">60%</h6>
                                <h5 class="card-text">Rp 100.000</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col mt-4">
                    <h5 class="text-center">Detail Transaksi</h5>
                </div>
            </div>
            <div class="container">
                <ul class="nav nav-tabs font-weight-bold" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Masuk</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Keluar</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 15%">No</th>
                                            <th scope="col" style="width: 25%">Jumlah</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($masuk as $m):$n=1;?>
                                            <tr>
                                                <td><?= $n++?></td>
                                                <td><?= $m['jumlah']?></td>
                                                <td><?= date('d F Y', strtotime($m['tanggal'])).'&emsp;'.$m['waktu']?></td>
                                                <td><?= $m['keterangan']?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>                    
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 15%">ID</th>
                                            <th scope="col" style="width: 25%">Jumlah</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col" style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($keluar as $k):$n=1;?>
                                        <tr>
                                             <td><?= $n++?></td>
                                                <td><?= $k['jumlah']?></td>
                                                <td><?= date('d F Y', strtotime($k['tanggal'])).'&emsp;'.$k['waktu']?></td>
                                                <td><?= $k['keterangan']?></td>
                                            <td><button class="btn btn-danger">Hapus</button></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="keluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tarik Saldo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Nominal Rp</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Keterangan  </span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>                    
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tarik</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    </body>
</html>