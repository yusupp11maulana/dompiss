<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="icon" href="<?= base_url()?>assets/Icons/wallet.png">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title><?= $title?></title>
    </head>
    <body>
        <?php if ($this->session->flashdata('data')) {
            if ($this->session->flashdata('data') == "Berhasil") {
                echo '<script>Swal.fire("Berhasil", "Data Tersimpan", "success");</script>';
                unset($_SESSION['data']);
            } else if ($this->session->flashdata('data') == "Salah") {
                echo '<script>Swal.fire("Gagal", "Isilah Data Dengan Benar", "error");</script>';
                unset($_SESSION['data']);
            }
        }
        ?>
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
                                <h5 class="card-title font-weight-bold text-primary"><?= $dompet['nama_dompet']?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $dompet['presentase']?>%</h6>
                                <h5 class="card-text">Rp <?= number_format($saldo,0,',','.')?></h5>
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
                <div class="tab-content mb-4" id="myTabContent">
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
                                                <td>Rp <?= number_format($m['jumlah'],0,',','.')?></td>
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
                                                <td>Rp <?= number_format($k['jumlah'],0,',','.')?></td>
                                                <td><?= date('d F Y', strtotime($k['tanggal'])).'&emsp;'.$k['waktu']?></td>
                                                <td><?= $k['keterangan']?></td>
                                            <td><a href="<?= base_url()?>Detail_dompet/hapus/<?= $k['id_detail']?>/<?= $id_wallet?>" class="tombol-hapus"><button class="btn btn-danger">Hapus</button></td></>
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
                        <form action="<?= base_url()?>Detail_dompet/pengeluaran/<?= $id_wallet?>" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tarik Saldo</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Nominal Rp</span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" name="nominal" id="rupiah" aria-describedby="inputGroup-sizing-default" autocomplete="OFF">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Keterangan  </span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Sizing example input" name="keterangan" aria-describedby="inputGroup-sizing-default" autocomplete="OFF">
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
        <script>
            $('.tombol-hapus').on('click', function (e){
                e.preventDefault();
                const hrefnya = $(this).attr('href');

                Swal.fire({
                    title: 'Menghapus Data Ini',
                    text: "Apakah anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value) {
                        document.location.href=hrefnya;
                    }
                })
            });
        </script>
        <script type="text/javascript">
        $(function(){
            $("#rupiah").keyup(function(e){
                $(this).val(format($(this).val()));
            });
        });
        var format = function(num){
            var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
            if(str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }
            str = str.split("").reverse();
            for(var j = 0, len = str.length; j < len; j++) {
                if(str[j] != ",") {
                output.push(str[j]);
                if(i%3 == 0 && j < (len - 1)) {
                    output.push(",");
                }
                i++;
                }
            }
            formatted = output.reverse().join("");
            return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
        };
        </script>
    </body>
</html>