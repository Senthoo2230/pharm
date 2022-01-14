
<style type="text/css">
  .li-style{
    border-bottom: medium;
    background-color:#f4f9f9;
    padding: 8px;
    color: #314e52;
  }
  .li-style:hover{
    background-color:#e7e6e1;
    color: #f2a154;
  }
  .add_items{
    width:100%;
    height:380px;
    background-color: #c4dbff;
    padding:10px;
  }
  .btn_item{
    width:100%;
  }
  .item_box{
    margin-top:20px;
    padding:20px 10px;
    background-color: #c4dbff;
    height:150px;
  }
  .item_m{
    padding:5px 0px;
  }
  .fnt-15{
    font-size:15px;
  }
  .fnt-bold{
    font-weight:bold;
  }
  .btn-wt-100{
    width:100%;
  }
  .m-top-10{
    margin-top:10px;
  }
</style>
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">  
        <h3>Add New Order</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <form action="<?php echo base_url(); //300?>Orders/validation" method="post" enctype="multipart/form-data">
            <div class="form-panel">
              <div class="row">
                <div class="col-md-4">
                  <div class="add_items">
                      <div class="m-top-10">
                        <table class="table">
                          <thead>
                            <th class="text-center">No</th>
                            <th class="text-center">Item</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Total</th>
                            <th class="text-center"></th>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-center">1</td>
                              <td class="text-left">abc123</td>
                              <td class="text-right">20.00</td>
                              <td class="text-center">3</td>
                              <td class="text-right">60.00</td>
                              <td>
                                <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                  </div>

                  <div style="margin-top:10px;">
                    <div class="row fnt-15 fnt-bold">
                      <div class="col-md-6">
                        <div class="item_m">
                          Sub Total
                        </div>
                        <div class="item_m">
                          Discount
                        </div>
                        <div class="item_m">
                          Total
                        </div>
                      </div>
                      <div class="col-md-6 text-right">
                        <div class="item_m">
                          15,000.00
                        </div>
                        <div class="item_m">
                          500.00
                        </div>
                        <div class="item_m">
                          14,500.00
                        </div>
                      </div>
                    </div>
                  </div>

                  <div style="margin-top:10px;">
                    <div class="row fnt-15 fnt-bold">
                      <div class="col-xs-3 col-md-6 col-lg-3">
                        <a class="btn btn-primary btn-wt-100" href="">Clear</a>
                      </div>
                      <div class="col-xs-3 col-md-6 col-lg-3">
                        <a class="btn btn-primary btn-wt-100" href="">Discount</a>
                      </div>
                      <div class="col-xs-3 col-md-6 col-lg-3">
                        <a class="btn btn-primary btn-wt-100" href="">Hold</a>
                      </div>
                      <div class="col-xs-3 col-md-6 col-lg-3">
                        <a class="btn btn-primary btn-wt-100" href="">Pay</a>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-3">
                      <a href="" class="btn btn-primary btn_item">Catogeries</a>
                    </div>
                    <div class="col-md-3">
                      <a href="" class="btn btn-primary btn_item">Patient</a>
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control" placeholder="Search" id="search_item">
                    </div>
                  </div>
                  <div class="row" id="items">
                    
                      <?php
                      $CI =& get_instance();
                      foreach ($items as $itm) {
                        $p_id = $itm->id;
                        ?>
                        <a href="<?php echo base_url(); ?>Orders/insert_order_item/<?php echo $p_id; ?>/<?php echo $order_no; ?>">
                          <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="item_box">
                              <div class="item_m">
                                <?php echo $item_id = $itm->item_id; ?>
                              </div>
                              <div class="item_m">
                                <?php echo $CI->Orders_model->item_name($item_id); ?>
                              </div>
                              <div class="item_m">
                                Qty : <?php echo $item_id = $itm->quantity; ?>
                              </div>
                            </div>
                          </div>
                        </a>
                        <?php
                      }
                      ?>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
</section>
    <!-- /MAIN CONTENT -->

