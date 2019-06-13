<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Pastor Alci</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/datatables.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <?=$link; ?>

</head>

<body>
    <!--        inicio do conteudo-->
    <div class="container-fluid">
        <div class="content">
            <hr>
            <?= $contents; ?>
            <hr>
        </div>
    </div>

    <!--        final do conteudo-->

    <!--        inicio do bottom-->

    <footer class="fixed-bottom sticky-bottom text-center" style="margin-bottom: 5px;">
        &copy; <script>document.write(new Date().getFullYear())</script> Douglas Kjellin.
    </footer>

</body>


<script src="<?= base_url(); ?>assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/js/popper.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/js/datatables.js"></script>
<script src="<?= base_url(); ?>assets/js/custom.js"></script>

</html>