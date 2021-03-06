<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url(); ?>assets/admin/lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/admin/lib/advanced-datatable/js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url(); ?>assets/admin/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/admin/lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url(); ?>assets/admin/lib/common-scripts.js"></script>

  <script src="<?php echo base_url(); ?>assets/admin/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--custom switch-->
  <script src="<?php echo base_url(); ?>assets/admin/lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="<?php echo base_url(); ?>assets/admin/lib/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/lib/form-component.js"></script>
  <!--script for this page-->

  
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
      });


    });
  </script>

<script type="text/javascript">
  $(document).ready(function(){
      $("#search_item").on("keyup", function(){
        var search_text = $(this).val();
          $.ajax({
            url:"<?php echo base_url(); ?>Orders/item_search", //756
            type:"POST",
            cache:false,
            data:{search_text:search_text},
            success:function(data){
              //alert(data);
              $("#items").html(data);
              $("#items").fadeIn();
            }
          });
      });

      // click one particular city name it's fill in textbox
      $(document).on("click","#vehicle_no_list li", function(){

        $('#vehicle_no').val($(this).text());
        $('#vehicle_no_list').fadeOut("fast");
        var v_no = $('#vehicle_no').val();

        //$('#c_no').fadeOut("fast");

         $.ajax({
          url:"<?php echo base_url(); ?>Orders/contact_no",
          type:"POST",
          cache:false,
          data:{v_no:v_no},
          success:function(data){
            $("#contact_no").val(data);
            //alert(data);
          }
        });

        $.ajax({
          url:"<?php echo base_url(); ?>Orders/customername",
          type:"POST",
          cache:false,
          data:{v_no:v_no},
          success:function(data){
            $("#customer_name").val(data);
            //alert(data);
          }
        });
      });
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){
      // Full Service Module
      $( "#method" ).change(function() {
        if ($(this).val() == 'cheque') {
          $("#check_date").show();
        }
        else{
          $("#check_date").hide();
        }
      });
    });

    $(document).ready(function(){
      setTimeout(function() {
        $("#delete_msg").hide('blind', {}, 500)
    }, 3000);
    });

</script>

<script type="text/javascript">
// Load sub cat  and brand for Catogery
    $(document).ready(function(){
      $("#ex_catogery").change(function(){
        var catogery = $(this).val();
        $.ajax({
          url:"<?php echo base_url(); ?>Inventory/show_sub_cat",
          type:"POST",
          cache:false,
          data:{catogery:catogery},
          success:function(data){
            //alert(data);
            $("#ex_sub_catogery").html(data);
          }
        });
      }); 
    });

    // Price for Service
    $(document).ready(function(){
      $("#add_service").click(function(){
        var service = $("#service").val();
        var bill_no = $("#bill_no").val();

        if (service == "") {
          $("#service_error").html("Please Select a Service");
        }
        else{
          $("#service_error").html("");
          $.ajax({
            url:"<?php echo base_url(); ?>Orders/Add_Service", //495
            type:"POST",
            cache:false,
            data:{service:service,bill_no:bill_no},
            success:function(data){
              //alert(data);
              $("#service_tbl").html(data);
              $('#service').val("");
              $('#submit_btn').show();
            }
          });
        }
        
      }); 
    });

    $(document).ready(function(){
        
    }); 

    // Price for Service
    $(document).ready(function(){
      $("#add_order_item").click(function(){
        var order_no = $("#order_no").val();
        var p_id = $("#p_id").val();
        alert(p_id)
          /*$.ajax({
            url:"<?php echo base_url(); ?>Orders/insert_order_item", //803
            type:"POST",
            cache:false,
            data:{bill_no:bill_no},
            success:function(data){
              //alert(data);
              $("#service_tbl").html(data);
              $('#service').val("");
              $('#submit_btn').show();
            }
          });*/
      }); 
    });

    $(document).ready(function(){
        var bill_no = $("#bill_no").val();
          $.ajax({
            url:"<?php echo base_url(); ?>Orders/Add_item", //495
            type:"POST",
            cache:false,
            data:{bill_no:bill_no},
            success:function(data){
              //alert(data);
              $("#item_tbl").html(data);
              $('#items').val("");
              if (data != "") {
                  ('submit_btn').show();
              }
            }
          });
        
    }); 

    
  </script>
</body>

</html>
