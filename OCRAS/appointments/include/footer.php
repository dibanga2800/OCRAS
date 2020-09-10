</div></div>
<!--footer -->
<footer class="text-center" id="footer">&copy; copyright 2019 OCRAS MSC Project </footer>

<!--scrollTop -->
<script>
jQuery(window).scroll(function(){
var vscroll =jQuery(this).scrollTop();
jQuery('#logotext').css({
"transform": "translate(0px, "+vscroll/2+"px)"
});

var vscroll =jQuery(this).scrollTop();
jQuery('#fore-flower').css({
"transform": "translate(0px, "+vscroll/2+"px)"
});
});

function detailsmodal(id){
var data ={"id" : id};
jQuery.ajax({
url: '/OCRAS/includes/detailsmodal.php',
method: "post",
data: data,
success: function(data){
  jQuery('body').append(data);
    jQuery('#details-modal').modal('toggle');
},
error: function(){
  alert("something went wrong");
}

});
}
function update_cart(mode,edit_id,edit_size){
  var data = {"mode" : mode, "edit_id" : edit_id, "edit_size" : edit_size};
  jQuery.ajax({
    url: '/OCRAS/admin/parsers/update_cart.php',
    method: "post",
    data: data,
    success: function(){location.reload();},
    error: function(){alert("something went wrong.");},
  });
}
function add_to_cart(){
  jQuery('#modal_errors').html(" ");
  var quantity = jQuery('#quantity').val();
  var size = jQuery('#size').val();
  var available = jQuery('#available').val();
  var error = '';
  var data = jQuery('#add_product_form').serialize();
  if(size == ''|| quantity =='' || quantity == 0){
    error += '<p class="text-danger text-center"> You must choose a size and quantity.</p>';
    jQuery('#modal_errors').html(error);
    return;
  }else if(quantity > available){
    error += '<p class="text-danger text-center"> There are only ' +available+'available.</p>';
      jQuery('#modal_errors').html(error);
      return;
    }else{
      jQuery.ajax({
        url:'/OCRAS/admin/parsers/add_cart.php',
        method: 'post',
        data: data,
        success:function(){
          location.reload();
        },
        error: function(){alert("something went wrong");}
      });
    }
  }
</script>


</body>
</html>
