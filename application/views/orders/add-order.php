
<style type="text/css">
  .add_items{
    width:100%;
    height:380px;
    background-color: #f7f7f7;
    padding:10px;
  }
  .btn_item{
    width:100%;
  }
  .item_box{
    
    margin-top:20px;
    padding:20px 10px;
    background-color: #f7f7f7;
    height:150px;
    border-radius: 18px;
    box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
    transition: transform .2s; /* Animation */
  }
  .item_box:hover{
    transform: scale(1.1);
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
                            <?php
                            $CI =& get_instance();
                            $i = 1;
                            $sub_total = 0;
                            foreach ($order_items as $o_itm) {
                              ?>
                              <tr>
                                <td class="text-center"><?php echo $i; ?></td>
                                <td class="text-left"><?php echo $o_itm->item_name; ?></td>
                                <td class="text-right"><?php echo $itm_amt =  $o_itm->amount; ?>.00</td>
                                <td class="text-center"><?php echo $itm_qty = $o_itm->qty; ?></td>
                                <td class="text-right"><?php echo $item_total = $itm_amt*$itm_qty; ?>.00</td>
                                <td>
                                  <a href="<?php echo base_url(); ?>Orders/delete_order_item/<?php echo $o_itm->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                </td>
                              </tr>
                              <?php
                              $sub_total = $sub_total+$item_total;
                              $i++;
                            }
                            // update total in order tbl
                            $CI->Orders_model->update_total($order_id,$sub_total);
                            ?>
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
                          <?php echo $sub_total; ?>.00
                        </div>
                        <div class="item_m">
                        <?php
                        // Discount from order
                        echo $discount = $CI->Orders_model->order_discount($order_id); //83
                        ?>.00
                        </div>
                        <div class="item_m">
                        <?php echo $sub_total-$discount; ?>.00
                        </div>
                      </div>
                    </div>
                  </div>

                  <div style="margin-top:10px;">
                    <div class="row fnt-15 fnt-bold">
                      <div class="col-xs-3 col-md-6 col-lg-3">
                        <a class="btn btn-primary btn-wt-100" href="<?php echo base_url(); ?>Orders/clear_items/<?php echo $order_id; ?>">Clear</a>
                      </div>
                      <div class="col-xs-3 col-md-6 col-lg-3">
                        <button type="button" class="btn btn-primary btn-wt-100" data-toggle="modal" data-target="#discount">Discount</button>
                      </div>
                      <div class="col-xs-3 col-md-6 col-lg-3">
                        <a class="btn btn-primary btn-wt-100" href="<?php echo base_url(); ?>Orders/hold_order/<?php echo $order_id; ?>">Hold</a>
                      </div>
                      <div class="col-xs-3 col-md-6 col-lg-3">
                        <a class="btn btn-primary btn-wt-100" href="">Pay</a>
                      </div>
                    </div>
                  </div>

                  <!-- Modal -->
                  <div id="discount" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Add Discount</h4>
                        </div>
                        <form action="<?php echo base_url(); ?>Orders/add_discount" method="post">
                        <div class="modal-body">
                          <input type="text" value="<?php echo $order_id; ?>" name="order_id" hidden>
                          <div class="row">
                            <div class="col-sm-8">
                              <input type="text" name="discount" class="form-control">
                            </div>
                            <div class="col-sm-4">
                              <select name="discount_type" class="form-control">
                                <option value="1">Amount</option>
                                <option value="2">Percentage</option>
                              </select>
                            </div>
                          </div>
                          
                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="btn btn-success" value="Add">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </form>
                        </div>
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
                      foreach ($items as $itm) {
                        $p_id = $itm->id;
                        ?>
                        <a href="<?php echo base_url(); ?>Orders/insert_order_item/<?php echo $p_id; ?>/<?php echo $order_id; ?>">
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

