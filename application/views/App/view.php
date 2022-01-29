<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-8">
                <?php echo form_open(''); ?>
                    <div class="form-panel" style="padding:25px">
                      <div id="delete_msg">
                        <?php
                          if ($this->session->flashdata('invmsg')) {
                            echo $this->session->flashdata('invmsg');
                          }
                        ?>
                      </div>
                        <h4 class="mb">Appointment Details</h4>
                        <div class="form-horizontal style-form">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Invoice No</label>
                            <div class="col-sm-8">
                            <input type="text" value="<?php echo $apps->id; ?>" class="form-control" name="invoice_no" id="invoice_no" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">NIC No<span style="color: red;"> *</span></label>
                            <div class="col-sm-8">
                            <input type="text" value="<?php echo $apps->nic; ?>" class="form-control" name="nic" id="nic">
                            <div id="nic_list"></div>
                            <span class="text-danger"><?php echo form_error('nic'); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Patient Name<span style="color: red;"> *</span></label>
                            <div class="col-sm-8">
                            <input type="text" value="<?php echo $apps->name; ?>" class="form-control" name="pname" id="pname">
                            <span class="text-danger"><?php echo form_error('pname'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Mobile No<span style="color: red;"> *</span></label>
                            <div class="col-sm-8">
                            <input type="text" value="<?php echo $apps->mobile; ?>" class="form-control" name="mobile" id="mobile">
                            <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Address</label>
                            <div class="col-sm-8">
                            <input type="text" value="<?php echo $apps->address; ?>" class="form-control" name="address" id="address">
                            <span class="text-danger"><?php echo form_error('address'); ?></span>
                            </div>
                        </div>

                        <?php
                        $CI =& get_instance();
                        ?>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Specialization<span style="color: red;"> *</span></label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $this->Appoint_model->area_name($apps->area); ?>" class="form-control" name="area" id="area">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Doctor<span style="color: red;"> *</span></label>
                          <div class="col-sm-8">
                            <input type="text" value="<?php echo $this->Appoint_model->doctor_name($apps->doctor); ?>" class="form-control" name="doctor" id="doctor">
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Doctor's Charge</label>
                            <div class="col-sm-8">
                            <input type="text" value="<?php echo $apps->doc_charge; ?>" class="form-control" name="dcharge" id="dcharge">
                            <span class="text-danger"><?php echo form_error('dcharge'); ?></span>
                            </div>
                        </div>

                        <?php
                          $month = date('m');
                          $day = date('d');
                          $year = date('Y');
                          
                          $today = $year . '-' . $month . '-' . $day;
                        ?>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Date<span style="color: red;"> *</span></label>
                          <div class="col-sm-8">
                              <input class="form-control" type="date" value="<?php echo $apps->app_date; ?>" name="app_date">
                              <span class="text-danger"><?php echo form_error('app_date'); ?></span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Time<span style="color: red;"> *</span></label>
                          <div class="col-sm-8">
                              <input class="form-control" type="text" value="<?php echo $apps->time; ?>" name="tym">
                              <span class="text-danger"><?php echo form_error('app_date'); ?></span>
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Comments</label>
                            <div class="col-sm-8">
                            <input type="text" value="<?php echo $apps->comment; ?>" class="form-control" name="comment" id="comment">
                            <span class="text-danger"><?php echo form_error('comment'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Other Charges</label>
                            <div class="col-sm-8">
                                <?php
                                    $o_charges = $this->Appoint_model->other_charges($apps->id);
                                ?>
                            <table class="table table-striped">
                                <thead>
                                    <th>Description</th>
                                    <th class="text-right">Amount</th>
                                    <th class="text-center">Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                        foreach ($o_charges as $o_char) {
                                    ?>
                                        <tr id="row<?php echo $o_char->id; ?>">
                                            <td><?php echo $o_char->description; ?></td>
                                            <td class="text-right"><?php echo $o_char->charge; ?>.00</td>
                                            <td class="text-center">
                                                <a class="btn btn-danger delete_service" id="<?php echo $o_char->id; ?>"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </div>
                        </div>


                        <div class="form-group">
                          <div class="col-sm-3"></div>
                          <div class="col-sm-8">
                            <a href="" class="btn btn-primary pull-right mr-3">Edit</a>
                            <a style="margin-right: 15px;" href="" class="pull-right btn btn-danger">Back</a>
                          </div>
                        </div>

                      </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>

<!-- Modal -->
<div id="catogery" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Catogery</h4>
      </div>

      <form method="post" action="<?php echo base_url(); ?>Inventory/add_catogery">
        <div class="modal-body">
          <div>
              <label>Catogery</label>
            </div>
            <div>
              <input class="form-control" type="text" name="catogery">
            </div>
          
        </div>
        <div class="modal-footer">
          <input type="submit" name="save_catogery" value="Save" class="btn btn-success">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>

  </div>
</div>
<!-- Catogery Modal -->

<!-- Sub Cat Modal -->
<div id="sub_catogery" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Sub Catogery</h4>
      </div>

      <form method="post" action="<?php echo base_url(); ?>Inventory/add_sub_catogery">
      <div class="modal-body">
          <div>
            <label>Catogery</label>
          </div>
          <div>
            <select class="form-control" id="main_catogery" name="catogery">
            <?php
              foreach ($catogories as $catogery) {
                echo "<option value='$catogery->cat_id'>$catogery->catogery</option>";
              }
            ?>
            </select>
          </div>

          <div>
            <label>Sub Catogery</label>
          </div>
          <div>
            <input class="form-control" type="text" name="sub_catogery">
          </div>
        
      </div>
      <div class="modal-footer">
        <input type="submit" name="save_sub_catogery" value="Save" class="btn btn-success">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- Catogery Modal -->

<!-- Filter Range Modal -->
<div id="filter_range" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Filter Range</h4>
      </div>

      <form method="post" action="<?php echo base_url(); ?>Inventory/add_frange">

      <div class="modal-body">
          <div>
            <label>Catogery</label>
          </div>
          <div>
            <select class="form-control" id="main_catogery" name="catogery">
            <?php
              foreach ($catogories as $catogery) {
                echo "<option value='$catogery->cat_id'>$catogery->catogery</option>";
              }
            ?>
            </select>
          </div>
          <div>
            <label>Filter Range</label>
          </div>
          <div>
            <input class="form-control" type="text" name="filter_range">
          </div>
      </div>

      <div class="modal-footer">
        <input type="submit" name="save_filter_range" value="Save" class="btn btn-success">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- Filter Modal -->

<!-- Modal -->
<div id="brand" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Brand</h4>
      </div>

      <form method="post" action="<?php echo base_url(); ?>Inventory/add_brand">
      <div class="modal-body">
          <div>
            <label>Catogery</label>
          </div>
          <div>
            <select class="form-control" id="main_catogery" name="catogery">
              <?php
                foreach ($catogories as $catogery) {
                  echo "<option value='$catogery->cat_id'>$catogery->catogery</option>";
                }
              ?>
            </select>
          </div>

          <div>
            <label>Brand</label>
          </div>
          <div>
            <input class="form-control" type="text" name="brand">
          </div>
        
      </div>
      <div class="modal-footer">
        <input type="submit" name="save_brand" value="Save" class="btn btn-success">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- Catogery Modal -->