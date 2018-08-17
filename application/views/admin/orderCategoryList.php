<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Orders By Category</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Orders List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Orders List 
                <a href="<?php echo base_url('admin/products/orders');?>" class="btn btn-success btn-sm">View Order Category</a>
              </h3>
            </div>
            <!-- /.box-header -->
            <?php if(!empty($level)){ ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Records</th>
                  <th>Order.No.</th>
                  <th>Date</th>
                  <th>Name</th>
                  <?php foreach($level as $level_name){?>
                  <th><?php echo $level_name->cat_track_name;?></th>
                  <?php } ?>
                  <th>Packed Done</th>
                  <th>Despatched</th>
                  <th>Remarks</th>
                  <th>Action</th>
                </tr>
                </thead>
                <?php if(!empty($orders)){ ?>
                <tbody>
                <?php foreach($orders as $orderslist){ ?>
                <tr>

                  <td>
                    <!-- <input type="checkbox" name="download_excel" data-toggle="modal" data-target="#download_excel" class="minimal" style="position: relative;opacity: 1;"> -->
                    <a href="#" data-toggle="modal" data-target="#orderReport">
                      <span class="badge bg-blue info" info="<?php echo $orderslist->ord_id?>"><i class="fa fa-eye"></i></span>
                    </a>
                  </td>

                  <td><?php echo $orderslist->ord_reference_id;?></td>
                  <td>
                    <?php $date = $orderslist->ord_created;
                          $newDate = date('d-m-Y', strtotime($date));
                          echo $newDate;
                    ?>
                  </td>

                  <td><?php echo $orderslist->pro_title;?></td>

                  <?php foreach($level as $level_name){?>
                  <td>
                    <?php foreach($track_status as $levels){ ?>
                    <?php if(($level_name->cat_track_id)==($levels->cat_track_id)){ ?>
                    <?php if(($levels->track_status)=="1"){?>
                      <a href="#" class="trackLevelYes" id="trackLevelYes<?php echo $orderslist->ord_id;?>" trackLevelYes="<?php echo $level_name->cat_track_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($levels->track_status)=="0"){ ?>
                      <a href="#" class="trackLevelNo" id="trackLevelNo<?php echo $orderslist->ord_id;?>" trackLevelNo="<?php echo $level_name->cat_track_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                    <?php } } }?>
                      <a href="#" class="trackLevelYes" id="trackLevelYes<?php echo $orderslist->ord_id;?>" ordid="<?php echo $orderslist->ord_id;?>" trackLevelYes="<?php echo $level_name->cat_track_id;;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="trackLevelNo" id="trackLevelNo<?php echo $orderslist->ord_id;?>" ordid="<?php echo $orderslist->ord_id;?>" trackLevelNo="<?php echo $level_name->cat_track_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                  </td>
                  <?php } ?>

                  <td>
                    <input type="hidden" name="ordid" value="<?php echo $orderslist->ord_id;?>">
                    <?php if(($orderslist->ord_photo_status)=="1"){?>
                      <a href="#" class="photoReceivedYes" id="photoyes<?php echo $orderslist->ord_id;?>" photoyes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($orderslist->ord_photo_status)=="0"){ ?>
                      <a href="#" class="photoReceivedNo" id="photono<?php echo $orderslist->ord_id;?>" photono="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                      <a href="#" class="photoReceivedYes" id="photoyes<?php echo $orderslist->ord_id;?>" photoyes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="photoReceivedNo" id="photono<?php echo $orderslist->ord_id;?>" photono="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php } ?>
                  </td>

                  <td>
                    <?php if(($orderslist->ord_shipping_required)=="1"){?>
                      <a href="#" class="shippingYes" id="shippingYes<?php echo $orderslist->ord_id;?>" shippingyes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                    <?php }else if(($orderslist->ord_shipping_required)=="0"){ ?>
                      <a href="#" class="shippingNo" id="shipingNo<?php echo $orderslist->ord_id;?>" shippingno="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php }else{ ?>
                      <a href="#" class="shippingYes" id="shippingYes<?php echo $orderslist->ord_id;?>" shippingyes="<?php echo $orderslist->ord_id;?>"><span class="badge bg-green"><i class="fa fa-check-circle"></i></span></a>
                      <a href="#" class="shippingNo" id="shipingNo<?php echo $orderslist->ord_id;?>" shippingno="<?php echo $orderslist->ord_id;?>"><span class="badge bg-red"><i class="fa fa-times-circle"></i></span></a>
                    <?php } ?>
                  </td>

                  <?php if(!empty($orderslist->ord_txt_message)){?>
                  <td><?php echo $orderslist->ord_txt_message;?></td>
                  <?php }else{ ?>
                  <td>NA</td>
                  <?php } ?>

                  <td>
                    <!-- <a href="#"><span class="badge bg-green"><i class="fa fa-edit"></i></span></a> -->
                    <a href="javascript:(void)"><span class="badge bg-red disable" disable="<?php echo $orderslist->ord_id?>"><i class="fa fa-trash"></i></span></a>
                  </td>

                </tr>
                <?php } ?>
                </tbody>
              </table>
              <?php }else{ ?>
                  <p style="text-align: center;margin-top: 20px;font-weight: bold;padding:30px">No Orders Found</p>
              <?php } ?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-left">
              <form action="<?php echo base_url('admin/excel_export/action');?>" method="post">
                <input type="hidden" name="category_id" id="category_id" value="<?php echo $level_name->cate_id;?>">
                <input type="submit" name="submit" value="Excel File" class="btn btn-primary btn-sm">
                </form>
              </ul>
            </div>
            <?php }else{ ?>
                <p style="text-align: center;margin-top: 20px;font-weight: bold;padding:30px">You haven't added any records yet!</p>
            <?php } ?>
          </div>
          <!-- /.box -->
          <!-- /.modal -->
          <div class="modal fade" id="orderReport">
            <div class="modal-dialog" style="margin-top:5%;width:85%">
              <div class="modal-content">
                <div class="modal-header">
                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title" id="productName">Product Information</h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <!-- <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="#" id="picture"  class="img-circle img-responsive"> </div> -->
                        <div class=" col-md-12 col-lg-12 "> 
                          <table class="table table-bordered">
                            <tr>
                              <th>Name</th>
                              <th>Theme</th>
                              <th>Offer</th>
                              <th>Required Picture</th>
                              <th>Message On Card</th>
                              <th>Product Size</th>
                            </tr>
                            <tr>
                              <td><span id="name"></span></td>
                              <td><span id="theme"></span></td>
                              <td>Rs-<span id="offer"></span></td>
                              <td><span id="required"></span></td>
                              <td><span id="msgOnCard"></span></td>
                              <td><span id="sizes"></span></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="panel-heading">
                      <h3 class="panel-title">Customer Information</h3>
                    </div>
                    <div class="panel panel-body">
                      <div class="row">
                        <div class=" col-md-12 col-lg-12 "> 
                          <table class="table table-bordered">
                             <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile No</th>
                              <th>State/City</th>
                              <th>Landmark</th>
                              <th>Addrees</th>
                            </tr>
                            <tr>
                              <td><span id="cname"></span></td>
                              <td><span id="email"></span></td>
                              <td><span id="mobile1"></span>/<span id="mobile2"></span></td>
                              <td><span id="scname1"></span>/<span id="scname2"></span></td>
                              <td><span id="lmname"></span></td>
                              <td><span id="addname2"></span>,<span id="addname1"></span>-(<span id="pincode"></span>)</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="panel-heading">
                      <h3 class="panel-title">Order Information</h3>
                    </div>
                    <div class="panel panel-body">
                      <div class="row">
                        <div class=" col-md-12 col-lg-12 "> 
                          <table class="table table-bordered">
                            <tr>
                              <th>Order No</th>
                              <th>Quantity</th>
                              <th>Price/Product</th>
                              <th>Product Discount</th>
                              <th>Payable Amount</th>
                              <th>Mode Of Payment</th>
                            </tr>
                            <tr>
                              <td><span id="ordno"></span></td>
                              <td><span id="qty"></span></td>
                              <td>Rs-<span id="price"></span></td>
                              <td>Rs-<span id="discount"></span></td>
                              <td>Rs-<span id="total"></span></td>
                              <td><span id="modeofpay"></span></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                </div> -->
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
