<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
    <title><?= $title?></title>
  </head>
  <body>
    <div class="container mt-4">
        <div class="row mt-4">
            <div class="col">
                <h2 style="font-family: 'Josefin Sans', sans-serif;" class="text-center">Dompet Pisah</h2>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="container text-center">
                            <img src="<?= base_url()?>assets/Icons/wallet.svg" alt="" style="width: 20%" class="align-content-center mb-4">
                            <h5 class="card-title font-weight-bold text-primary">Saldo Total</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Total Seluruh Saldo Tersimpan</h6>
                            <h5 class="card-text">Rp 100.000</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-sm-4 mt-3">
                <a href="<?= base_url()?>Detail_dompet" style="text-decoration:none; color: inherit;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container text-center">
                                <img src="<?= base_url()?>assets/Icons/pisah.svg" alt="" style="width: 40%" class="align-content-center mb-4">
                                <h5 class="card-title font-weight-bold text-primary">Investasi</h5>
                                <h6 class="card-subtitle mb-2 text-muted">60%</h6>
                                <h5 class="card-text">Rp 100.000</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="container text-center">
                            <img src="<?= base_url()?>assets/Icons/pisah.svg" alt="" style="width: 40%" class="align-content-center mb-4">
                            <h5 class="card-title font-weight-bold text-primary">Kebutuhan</h5>
                            <h6 class="card-subtitle mb-2 text-muted">60%</h6>
                            <h5 class="card-text">Rp 100.000</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="container text-center">
                            <img src="<?= base_url()?>assets/Icons/pisah.svg" alt="" style="width: 40%" class="align-content-center mb-4">
                            <h5 class="card-title font-weight-bold text-primary">Pegangan</h5>
                            <h6 class="card-subtitle mb-2 text-muted">60%</h6>
                            <h5 class="card-text">Rp 100.000</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahmodal">Tambah Saldo</button>
                <a href="<?= base_url()?>Login/logout"><button class="btn btn-danger">Logout</button></a>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Saldo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Rp</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>