
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Fitness Club | Invoice</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print();">
    <div class="wrapper">
      <!-- Main content -->
      <?php
                             $user_id = $_REQUEST['id'];
                              require_once 'db.php';
                             $sql = "SELECT * FROM users left join package on package.package_id = users.user_package  where user_id = '$user_id' ";
                             $retval = mysqli_query($conn, $sql);
                             
                             if(! $retval ) {
                                die('Could not get data: ' . mysql_error());
                             }
                  ?>
      <section class="invoice"> <?php  while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {  ?>
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Fitness Club, Inc.
                <?php $date = date('d/m/yy'); ?>

                <small class="pull-right">Date: <?php echo $date;?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>Fitness Club, Inc.</strong><br>
                Mumbai, Mu 94107<br>
                Phone: (804) 123-5432<br/>
                Email: info@execoders.com
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong> <?php echo $row['user_fname'] ?>  <?php echo $row['user_lname'] ?></strong><br>
                <?php echo $row['user_address'] ?><br>
                Phone: <?php echo $row['user_contact'] ?><br/>
                Email: <?php echo $row['user_email'] ?>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Invoice #007612</b><br/>
              <br/>
              <b>Order ID:</b> 4F3S8J<br/>
              <b>Payment Due:</b> 2/22/2014<br/>
              <b>Account:</b> 968-34567
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Qty</th>
                    <th>Package Validity</th>
                    <th>Package Name</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><?php echo $row['package_validity'] ?> Days</td>
                    <td><?php echo $row['package_name'] ?></td>
                    <td>&#8377;<?php echo $row['package_price'] ?></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <!--<p class="lead">Payment Methods:</p>
              <img src="../dist/img/credit/visa.png" alt="Visa"/>
              <img src="../dist/img/credit/mastercard.png" alt="Mastercard"/>
              <img src="../dist/img/credit/american-express.png" alt="American Express"/>
              <img src="../dist/img/credit/paypal2.png" alt="Paypal"/>-->
             <!--  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
              </p> -->
            </div><!-- /.col -->
            <div class="col-xs-6">
              <!-- <p class="lead">Amount Due 2/22/2014</p> -->
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>&#8377;<?php $i =$row['package_price'];  echo $newprice = $i * ((100 - 9.5 ) / 100); ?></td>
                  </tr>
                  <tr>
                    <th>Tax (9.3%)</th>
                    <td>&#8377;<?php  echo $row['package_price'] - $newprice; ?></td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>&#8377;<?php echo $row['package_price'];?></td>
                  </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

               <?php } ?> 

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="print-invoice.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
             <!--  <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button> -->
            </div>
          </div>
        </section><!-- /.content -->
    </div><!-- ./wrapper -->
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
  </body>
</html>