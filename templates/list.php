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
                <div class="col-lg-12"> <strong>DEVELOPERS S.A.C</strong></div>
            </div>
            <hr>
            <form class="form-inline" action="/search" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail2">Email</label>
                  <input type="email" class="form-control" name="InputEmail" id="Email2" placeholder="example@example.com">
                </div>
                <button type="submit" class="btn btn-default">BUSCAR</button>
            </form>
            <hr>
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th class="text-center">POSITION</th>
                            <th>EMAIL</th>
                            <th>SALARY</th>
                            <th class="text-center">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1; ?>
                        <?php foreach ($listado as $l): ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $l['name']; ?></td>
                            <td class="text-center"><?php echo $l['position']; ?></td>
                            <td><?php echo $l['email']; ?></td>
                            <td><?php echo $l['salary']; ?></td>
                            <td class="text-center"><a href="/detail/<?php echo $l['id']; ?>" class="btn btn-success btn-sm" target="_Self">DETAIL</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <pre>
        <?php //print_r($listado); ?>     
        </pre>

    </body>
</html>
