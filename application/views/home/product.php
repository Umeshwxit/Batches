<?php $this->load->view('home/header'); ?>

<style type="text/css">

.content .stars {color: #daa520;margin-left: 15px;}
.content .stars i {font-size: 18px;}
.content p{font-size: 15px;}
*{ margin:0;  padding:0;  box-sizing:border-box;  -webkit-box-sizing:border-box;  -moz-box-sizing:border-box;}
.star-cb-group{font-size:0 !important ;unicode-bidi:bidi-override !important ;direction:rtl}.star-cb-group *{font-size:1rem}.star-cb-group>input{display:none}.star-cb-group>input+label{font-size: 20px;margin: 0px 3px;padding-top: 15px;display:inline-block !important ;overflow:hidden !important ;text-indent:9999px !important ;width:1em !important ;white-space:nowrap !important ;cursor:pointer}.star-cb-group>input+label:before{display:inline-block !important ;text-indent:-9999px !important ;content:"☆" !important ;color:#888}.star-cb-group>input+label:hover:before,.star-cb-group>input+label:hover~label:before,.star-cb-group>input:checked~label:before{content:"★" !important ;color:#e52 !important ;text-shadow:0 0 1px #333}.star-cb-group>.star-cb-clear+label{text-indent:-9999px !important ;width:.5em !important ;margin-left:-.5em}.star-cb-group>.star-cb-clear+label:before{width:.5em}.star-cb-group:hover>input+label:before{content:"☆" !important ;color:#888 !important ;text-shadow:none}.star-cb-group:hover>input+label:hover:before,.star-cb-group:hover>input+label:hover~label:before{content:"★" !important ;color:#e52 !important ;text-shadow:0 0 1px #333}.rating-box{border:solid 1px #c1c1c1 !important ;margin:0 auto !important ;position:relative}fieldset{border:none !important ;padding:5px 20px}.rating-success{display:none !important ;text-align:center !important ;font-size:20px !important ;padding:30px 0}.rating-success.active{display:block}.error{padding-left:20px !important ;color:red !important ;font-size:12px !important;}	
</style>

<!-- END SECTION HEADER -->
		<section class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="bread-crumbs">
						<li><a href="#">Home</a>/<?php echo $product_detail['category_name'] ; ?>/<?php echo $product_detail['subcategory_name'] ; ?>/<?php echo $product_detail[0]['product_title'] ; ?></li>
						
					</ul>
				</div>
			</div>
		</section>
		<!-- START SECTION PRODUCT -->
		<main class="container product-content">
			<section class="row">
				<div class="col-sm-12 col-md-6">
					<div class="product-slider">
						<div class="big-slider">
						      <?php
    $gallery = $product_detail[0]['ps_gallery'];
    $gal = array();
    $gal = explode(",",$gallery);
    foreach($gal as $g){
    if($g!=''){
    ?>
    <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $g; ?>" alt="product">
                  <?php    }    }    ?>
						</div>
						<div class="small-slider">
						    	      <?php
    $gallery = $product_detail[0]['ps_gallery'];
    $gal = array();
    $gal = explode(",",$gallery);
    foreach($gal as $g){
    if($g!=''){
    ?>
   	<div class="small-slider-iner"> <img src="<?php echo base_url(); ?>uploads/gallery/<?php echo $g; ?>" alt="product"></div>
                  <?php    }    }    ?>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<div class="product-info">
						<h2><?php echo $product_detail[0]['product_title'] ; ?></h2>
						<div class="product-rating">
							<span><i class="fa fa-star" aria-hidden="true"></i></span>
							<span><i class="fa fa-star" aria-hidden="true"></i></span>
							<span><i class="fa fa-star" aria-hidden="true"></i></span>
							<span><i class="fa fa-star" aria-hidden="true"></i></span>
							<span><i class="fa fa-star-o" aria-hidden="true"></i></span>
							<p>(2 customer reviews)</p>
						</div>
						<p><?php echo $product_detail[0]['product_sdisc'] ; ?></p>
						<?php if($varition[0]->pcs_qty>0) { ?>
						<p class="availability"><i class="fa fa-check" aria-hidden="true"></i> In Stock</p>
						<?php }else{ ?>
                            <p class="availability"><i class="fa fa-check" aria-hidden="true"></i> Out of Stock</p>
						<?php } ?>
						<?php  
                 $pcs_mrp= $varition[0]->pcs_mrp;
                 $pcs_sale= $varition[0]->pcs_sale;
                  
                    if($pcs_sale<='0.000')			
                {
                $price=$pcs_mrp;
                $price1='';
                }else{
                $price=$pcs_sale; 
              $price1='$'.$pcs_mrp;

                }
                ?>
               	<p class="price"><span id="regular_price">  <?php echo $price1; ?></span><span id="special_price"> $<?php echo $price; ?></span></p>
										
						<form action="#" class="product-page-form">
							
							<div class="quantity">
								<div class="inner-quantity">
									<p>Quantity</p>
									<div class="counter">
										<i class="fa fa-caret-left decrement" id="decrement" aria-hidden="true"></i>
										<input id="count" class="count" value="1">
										<i class="fa fa-caret-right increment" id="increment" aria-hidden="true"></i>
									</div>
								</div>
 <button type="button" data-prid="<?php echo $product_detail[0]['prid'] ; ?>" pid="<?php echo  $product_detail[0]['product_id']; ?>" class="addtocart"><?php if($product_detail[0]['cart']=='false'){ ?>add to cart <?php  }else{ ?>In cart<?php }?></button>
							</div>
							<div class="add-buttons">
								<a href="javascript:void(0)" >
												<i id="<?php echo $product_detail[0]['prid']; ?>" class="follow <?php if($product_detail[0]['wishlist']=='true'){ ?>fa fa-heart <?php }else{ ?>fa fa-heart-o <?php } ?> <?php 
											if(empty($this->session->userdata('cid'))){ ?>header-sign<?php }else{ ?>productaddtowishlist <?php } ?>" 
											     id="<?php echo $product_detail[0]['prid']; ?>"
												data-size_id="<?php echo $varition[0]->pcs_size; ?>"
												data-prid="<?php echo $product_detail[0]['prid']; ?>"
												data-product_id="<?php echo $product_detail[0]['product_id']; ?>"
												 aria-hidden="true"></i> </a>
								 
							</div>
							<div class="secondary-info">
						
							        <?php 
							        foreach($varition as $key => $each_size){ ?>
 <a href="javascript:;" data-size_id="<?php echo $each_size->pcs_size ?>" data-pid="<?php echo $product_detail[0]['prid'] ; ?>" class=" <?php if($key=='0'){echo "activesize"; } ?>   sizebtn "><?php echo $each_size->size_name ?></a>
                                     <?php } ?>
                                     
                                       
								<p>sku: <span id="sku_pro"><?php echo $varition[0]->sku ; ?></span></p>
								<p>category: <span><?php echo $product_detail['category_name'] ; ?></span></p>
							</div>
							<div class="share-product">
								<p>share:</p>
								<ul class="share">
									<li><a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#" title="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									<li><a href="#" title="vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</form>
					</div>
				</div>		
			</section>
			<section class="row">
				<div class="col-md-12">
					<div class="tabs-box">
					    <ul class="tabs">
					        <li class="active" rel="tab1"><p class="h3">details</p></li> 
					        <li rel="tab3"><p class="h3">reviews  (<?php echo count($reveiws) ?>)</p></li>
					    </ul>
					    <div class="tab_container">
					        <p class="tab_active tab_accordion h3" rel="tab1">details <i class="fa fa-angle-down" aria-hidden="true"></i></p>
					        <div id="tab1" class="tab_content">
					            <p><?php echo $product_detail[0]['product_disc'] ; ?> </p>
					        </div>
					        <!-- end #tab1 -->
					        <p class="tab_accordion h3" rel="tab2">additional information <i class="fa fa-angle-down" aria-hidden="true"></i></p>
					        <div id="tab2" class="tab_content">
					            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
					        </div>
					        <!-- end #tab2 -->
					        <p class="tab_accordion h3" rel="tab3">reviews 
					        	(<?php echo count($reveiws) ?>) <i class="fa fa-angle-down" aria-hidden="true"></i></p>
					        <div id="tab3" class="tab_content">
					            <div class="row">
					            	





<div class="col-md-8">
<h5>Customer Reviews</h5>
<section class="reviews">

<?php foreach ($reveiws as $review) {
 ?>	
<div class="content">

<span class="name"><?php echo $review->name ?></span>
<span class="stars">
	<?php 
	  $rating=round($review->rating);
      for ($i=0; $i < 5; $i++) { 
          if($rating>$i){
             echo '<span><i class="fa fa-star fa-2x" aria-hidden="true"></i></span>';	
               }else{
               echo '<span><i class="fa fa-star-o fa-2x" aria-hidden="true"></i></span>';
                                     	}
             }
									
                                     
                                         
	?>
											
</span>
<p class="review_text"><?php echo $review->reveiw ?></p> 
</div>

 <?php  } ?>


</section>
</div>

<div class="col-md-4">
<h5>Write a review</h5>

<div class='rating-box'>
<form class='rating-form'>
	<p style="display: none; color: green;font-weight:bold;" id="rev_response">Thanks for review and rating.
	<!--  We will verify and publish it. -->
	</p>
	<span class='error' style="display: block;"></span>
  <fieldset>
    <span class="star-cb-group">
      <input type="radio" id="rating-5" name="rating" value="5" /><label for="rating-5">5</label>
      <input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
      <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
      <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
      <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
      <input type="radio" id="rating-0" name="rating" value="0" checked="checked" class="star-cb-clear" /><label for="rating-0">0</label>
    </span>
  </fieldset>
  <fieldset class="contact-form">
  	<input type="hidden" name="" id="product_id" value="<?php echo $product_detail[0]['product_id'] ; ?>">
    <input type='text' name='alias' id='alias' class='text-field' value='' maxlength='50' placeholder='Your Public name' required>
    </fieldset>
    <fieldset>
    	<input type="email" name="" required="" name="email" id="email" placeholder="Your Email Address">
    </fieldset>
  <fieldset class="contact-form">
    <textarea name='review' id='review' maxlength='100' placeholder='Write your review hear (Required)' required></textarea>
    </fieldset>
  
  <fieldset class="contact-form">
    <input class="button" type='button' value='Submit' id='submit'>
    </fieldset>
  
</form>
  
</div>

</div>


<div class="clearfix" style="clear: both;"></div>













					            </div>
					        </div>
					        <!-- end #tab3 -->
					    </div>
					</div>
				</div>
			</section>
			<section class="related-slider">
				<div class="row">
					<div class="col-md-12">
						<p class="h2">related products</p>
						<div class="prev-slider"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
						<div class="next-slider"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="slider">
						    <?php foreach($related_product as $product_detail) { ?>
							<div class="card">
										<div class="product">
											<div class="product-prev">
												<a href="<?php echo base_url() ?>product/<?php echo $product_detail->product_url ?>">
													<img src="<?php echo base_url() ?>uploads/gallery/<?php echo $product_detail->ps_image ?>" alt="product">
													<span class="product-label"><?php echo date('d-m-Y',strtotime($product_detail->production_date)); ?></span>
												</a>
												<div class="hide-product-buttons">
    <a href="#" class="h5 productaddtocart" data-size_id="<?php echo $product_detail->size_id; ?>"  data-prid="<?php echo $product_detail->prid; ?>"  data-product_id="<?php echo $product_detail->product_id; ?>" ><i class="fa fa-shopping-basket" aria-hidden="true"></i> add to cart</a>
    <a href="#" class="follow productaddtowishlist" data-size_id="<?php echo $product_detail->size_id; ?>"  data-prid="<?php echo $product_detail->prid; ?>"  data-product_id="<?php echo $product_detail->product_id; ?>"><i class="fa fa-heart-o" aria-hidden="true"></i> <i class="fa fa-heart" aria-hidden="true"></i></a>
											</div>
											</div>
										<?php
                            $pcs_mrp= $product_detail->pcs_mrp;
                            $pcs_sale= $product_detail->pcs_sale;
                            
                            if($pcs_sale<='0.000')
                            {
                            $price=$pcs_mrp;
                            $price1='';
                            }else{
                            $price=$pcs_sale; 
                            $price1='$'.$pcs_mrp; } ?>
											<div class="product-name">
												<a href="<?php echo base_url() ?>product/<?php echo $product_detail->product_url ?>" class="h4"><?php echo $product_detail->product_title ?></a>
												<p class="price"><span>  <?php echo $price1; ?></span> $<?php echo $price; ?></p>
											</div>
											<div class="product-desc">
												<p><?php echo $product_detail->size_name ?></p>
												<p class="product-rating">
													<span><i class="fa fa-star" aria-hidden="true"></i></span>
													<span><i class="fa fa-star" aria-hidden="true"></i></span>
													<span><i class="fa fa-star" aria-hidden="true"></i></span>
													<span><i class="fa fa-star" aria-hidden="true"></i></span>
													<span><i class="fa fa-star-o" aria-hidden="true"></i></span>
												</p>
											</div>
										</div>
									</div>
							
							    <?php } ?>
						</div>
					</div>
				</div>
			</section>
		</main>
		<!-- END SECTION PRODUCT -->


<?php $this->load->view('home/footer'); ?>
<style>
.activesize{
    border: 1px solid #000;
}




</style>

<script>
$(document).ready(function(){ 
           var baseUrl = '<?php echo base_url(); ?>';
     $(document).on('click', '.sizebtn', function(event) {  
                    $( ".sizebtn" ).removeClass("activesize");
                    $(this).addClass( "activesize" );
                    event.preventDefault();
                    var prid = $(this).attr('data-pid');
                    var size_id = $(this).attr('data-size_id');
console.log(prid);
console.log(size_id);
             
            $.ajax({
               url: baseUrl + "ajax/get_pricebysize",
               type: "POST",
               data: {
                  'size_id': size_id,
                  'prid': prid ,
               },
               dataType: "JSON",
               success: function(jsonStr) {
                   console.log(jsonStr);
                pcs_mrp= jsonStr['pcs_mrp'];
                pcs_sale= jsonStr['pcs_sale'];
                ps_image= jsonStr['ps_image'];
                if(pcs_sale<='0.000')
                {
                $("#special_price").html('$ '+pcs_mrp);
                $("#regular_price").html('');

                }else{
              $("#special_price").html('$ '+pcs_sale);
                $("#regular_price").html('$ '+pcs_mrp);
                
                }
                
                    sku= jsonStr['sku'];
                    $("#sku_pro").html(sku);
                    pcs_qty= jsonStr['pcs_qty'];
                    if(pcs_qty>0){ 
                    var stockhtml='<i class="fa fa-check" aria-hidden="true"></i> In Stock';
                    }else{
                    var stockhtml='<i class="fa fa-check" aria-hidden="true"></i> Out Of Stock';
                    }  
                    $(".availability").html(stockhtml);
            
           }
            });
            
       }); 
       
       
       
       
       
       $(document).on('click', '.addtocart', function(event) {  
             event.preventDefault();
            var size_id = $(".activesize").attr('data-size_id');
            var prid = $(this).attr('data-prid');
            var product_id = $(this).attr('pid');
            var qty = $("#count").val();
          var baseUrl = '<?php echo base_url(); ?>';
            $.ajax({
               url: baseUrl + "ajax/addtocart_new",
               type: "POST",
               data: {
                  'size_id': size_id,
                  'prid': prid,
                  'product_id': product_id ,
                  'qty':qty,
               },
               dataType: "json",
               success: function(data) {
                   
                   console.log(data);
                    var res_data = JSON.stringify(data);
                    var response = JSON.parse(res_data);
                    var msg = response.msg;
                        if(msg=='somthing_went_wrong'){
                      //  swal('somthing went wrong');
                        
                        }else if(msg=='out_of_stock'){
                        
                        swal('Product is out of stock');
                        
                        
                        }else if(msg=='added_in_cart'){
                        swal('Product has been added to cart');
                        
                        
                        
                        }else if(msg=='already_in_cart'){
                        swal('Product Already Into Your cart');
                        
                        
                        
                        }
                           
                        var res_data = JSON.stringify(data);
                        var response = JSON.parse(res_data); 
                        var cartcount = response['cartcount'];
                        var carttotal = response['carttotal'];
                        $("#cart_total_header").html('$ '+carttotal); 
                        $("#totalcart").html(cartcount); 

                              
        
           }
            });
       }); 
 
       
       
       
               
       }); 
      </script>

 

      <script type="text/javascript">
$('#submit').on('click',function(){
  var rating = $("input[name=rating]:checked").attr('value');
  var name = $('#alias').val();
  var email=$("#email").val();
  var review = $('#review').val();
  var product_id=$("#product_id").val();
  if(rating == '0'){
    $('.error').html('Please select rating');
    
  }else if(name == ''){
    $('.error').html('Please enter name');
  }else if(name.length <=2 || name.legth >=50){
     $('.error').html('Please enter name in less than 50 Characters');
  }else if(review == ''){
    $('.error').html('Please enter review');
  }else if(review.length <=2 || review.legth >=250){
     $('.error').html('Please enter review in less than 250 Characters');
  }else{
   
     $.ajax({
     	url:"<?php echo base_url() ?>/add_reveiw",
     	method:"POST",
     	data:{
     	  name:name,
     	  email:email,
     	  rating:rating,
     	  review:review,
     	  product_id:product_id
     	},
     	dataType:"JSON",
     	success:function(response){
     		
               $("#rev_response").css('display','block');
     		
     	}
     })
   }
})
      </script>
 
