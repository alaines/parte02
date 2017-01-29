<!DOCTYPE html>
<html>
    <head>
        <title>::DEVELOPERS S.A.C::</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <script src="/js/bootstrap.min.js"></script>
        <style>
            body {
                padding-top: 70px;
                padding-bottom: 30px;
              }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-10"> <strong>DEVELOPERS S.A.C</strong></div>
                <div class="col-md-2"><a href="/" class="btn btn-success btn-sm" target="_Self">VOLVER</a></div>
            </div>
            <br>
            <?php foreach ($detail as $d):?>
            <div class="row">
                <div class="col-lg-12">
                    <address>
                        <strong><?php echo $d['name']; ?></strong><br>
                        <em><?php echo $d['position']; ?></em><br>
                        <a href="mailto:<?php echo $d['email']; ?>"><?php echo $d['email']; ?></a><br>
                        <abbr title="Phone">P:</abbr> <?php echo $d['phone']; ?><br>
                        <?php echo $d['address']; ?><br>
                    </address>
                    <strong>Salary</strong><br>
                     <?php echo $d['salary']; ?><br><br>
                    <strong>Skills</strong><br>
                    <ul>
                        <?php foreach ($d['skills'] as $s): ?>
                        <li><?php echo $s['skill']; ?></li>
                        <?php endforeach;?> 
                    </ul>
                </div>
            </div>
            <?php endforeach;; ?>
        </div>
    </body>
</html>