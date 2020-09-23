<?php include 'header.php'; ?>

<!-- END SECTION HEADER -->
		<section class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="bread-crumbs">
						<li><a href="index.html">Home</a></li>
						<li>Coffee beans</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- START SECTION SHOP CATEGORY -->
	   <!-- category code has updated by umesh -->
		<div class="wrap-shop-category-content">
			<div class="container">
				<div class="row flex-moblile">
					<div class="col-sm-4 col-md-4 col-lg-4">
						<aside class="sidebar">
							<div class="sidebar-categories">
								<p class="h4">categories</p>
								<ul class="accordeon">
								    <?php foreach($categories_list as $each_category){ ?>
									<li>
									        <?php
    $main_cat=$each_category->category_id;
    $sub_category= $this->Comman_model->getAlldata('subcategories',$where=array('subcategory_catid'=>$main_cat),$orderby='');
    ?>
										<p class="accordeon-head category" data-cat_id="<?php echo $main_cat ?>"  ><?php echo $each_category->category_name ?> 
										<?php  if(count($sub_category)>0) { ?>
										<i class="fa fa-angle-down" aria-hidden="true"></i>
										<?php } ?>
										</p>
										<ul class="accordeon-body">
                                        
                                        <?php foreach($sub_category as $each_sub_cat){ ?>
                                        <li class="sub_category"  data-cat_id="<?php echo $main_cat  ?>" data-sub_cat_id="<?php echo $each_sub_cat->subcategory_id ?>"><a href="javascript:void(0)"><?php echo $each_sub_cat->subcategory_name ?></a></li>
                                        <?php } ?>
										</ul>
									</li>
								<?php } ?>
								</ul>
							</div>
							<div class="sidebar-shop">
								<p class="h4">shop by</p>
								<ul class="accordeon" >
						
									<li>
										<p class="bold accordeon-head-3">Brands <i class="fa fa-angle-down" aria-hidden="true"></i></p>
										<div class="accordeon-body-3">
											<form action="#" class="manufacturer-form" id="brand">
                                       <?php foreach ($brnad_list as $each_brand) { ?>

                                       	<input type="checkbox" id="manufacturer<?php echo $each_brand->brand_id ?>" class="my_brand" value="<?php echo $each_brand->brand_id ?>">
									    <label for="manufacturer1" class="manufacturer<?php echo $each_brand->brand_id ?>" ><?php echo $each_brand->brand_name ?></label>
												
                                      <?php } ?>

												
											</form>
										</div>
									</li>
									<li>
										<p class="bold accordeon-head-3">Price <i class="fa fa-angle-down" aria-hidden="true"></i></p>
										<div class="accordeon-body-3">
											<div id="slider-range" class="slider-range" ></div>
                                            <input type="hidden" name="max_price" id="max_price" value="300" >
        
                                           <input type="hidden" name="min_price" id="min_price" value="60000" style="height: 50px;width:50px">
        											
											<p class="price-filter">Prise: $ <span id="from"></span> - $ <span id="to"></span></p>
										</div>
									</li>
								</ul>
							</div> 
						</aside>
					</div>
					<div class="col-sm-8 col-md-8 col-lg-8">
						<section class="shop-category-content">	 
							<form action="#" class="sort-form">
								<div class="sort">
									<p>Sort By</p>
									<div class="drop-down">
										<p class="selected"><span id="selected-sort">Position</span><i class="fa fa-caret-down" aria-hidden="true"></i></p>
										<ul class="drop-list" data-select='#selected-sort'>
											<li class="order_by" data-order_by="products.product_id"><p class="select-item">Position</p></li>
											<li class="order_by" data-order_by="product_color_size_record.pcs_sale"><p class="select-item">Price</p></li>
											<!-- <li><p class="select-item">Pub Date</p></li>
											<li><p class="select-item">Relevance</p></li> -->
										</ul>
									</div>
										<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
								</div>
								<div class="form-show">
									<p>Show</p>
									<div class="drop-down">
										<p class="selected"><span id="selected-show">8</span><i class="fa fa-caret-down" aria-hidden="true"></i></p>
										<ul class="drop-list" data-select='#selected-show'>
											<li class="per_page" data-per_page="8"><p class="select-item">8</p></li>
											<li class="per_page" data-per_page="10"><p class="select-item">10</p></li>
											<li class="per_page" data-per_page="12"><p class="select-item">12</p></li>
											<li class="per_page" data-per_page="14"><p class="select-item">14</p></li>
											<li class="per_page" data-per_page="16"><p class="select-item">16</p></li>
										</ul>
									</div>	
								</div>				
							</form>
							<div class="row row_eq" id="products">
								<?php foreach($products as $each_pro){ ?>
							<div class="col-md-6 ">
								<div>
								<div class="product">
									<div class="product-prev">
										<a href="<?php echo base_url() ?>product/<?php echo $each_pro->product_url ?>">
											<img style="max-height: 100%" src="<?php echo base_url() ?>uploads/gallery/<?php echo $each_pro->ps_image ?>"
												alt="product">
											<span
												class="product-label"><?php echo date('d-m-Y',strtotime($each_pro->production_date)); ?></span>
										</a>
										<div class="hide-product-buttons">
											<a href="#" class="h5 productaddtocart"
												data-size_id="<?php echo $each_pro->size_id; ?>"
												data-prid="<?php echo $each_pro->prid; ?>"
												data-product_id="<?php echo $each_pro->product_id; ?>"><i
													class="fa fa-shopping-basket" aria-hidden="true"></i> add to
												cart</a>
											<a href="#" class="follow productaddtowishlist"
												data-size_id="<?php echo $each_pro->size_id; ?>"
												data-prid="<?php echo $each_pro->prid; ?>"
												data-product_id="<?php echo $each_pro->product_id; ?>"><i
													class="fa fa-heart-o" aria-hidden="true"></i> <i class="fa fa-heart"
													aria-hidden="true"></i></a>
										</div>
									</div>
									<?php
		                            $pcs_mrp= $each_pro->pcs_mrp;
		                            $pcs_sale= $each_pro->pcs_sale;
		                            
		                            if($pcs_sale<='0.000')
		                            {
		                            $price=$pcs_mrp;
		                            $price1='';
		                            }else{
		                            $price=$pcs_sale; 
		                            $price1='$'.$pcs_mrp; } ?>
									<div class="product-name">
										<a href="<?php echo base_url() ?>product/<?php echo $each_pro->product_url ?>"
											class="h4"><?php echo $each_pro->product_title ?></a>
										<p class="price"><span> <?php echo $price1; ?></span> $<?php echo $price; ?></p>
									</div>
									<div class="product-desc">
										<p><?php echo $each_pro->size_name ?></p>
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
							</div>
							<?php } ?>

							</div>
							<form action="#" class="sort-form transparent">
								<div class="iner-sort-form">
									<!-- <p>Items 1-<span>8</span> of <span>15</span></p>
									 --><div class="sort">
									<p>Sort By</p>
									<div class="drop-down">
										<p class="selected"><span id="selected-sort">Position</span><i class="fa fa-caret-down" aria-hidden="true"></i></p>
										<ul class="drop-list" data-select='#selected-sort'>
											<li class="order_by" data-order_by="products.product_id"><p class="select-item">Position</p></li>
											<li class="order_by" data-order_by="product_color_size_record.pcs_sale"><p class="select-item">Price</p></li>
											<!-- <li><p class="select-item">Pub Date</p></li>
											<li><p class="select-item">Relevance</p></li> -->
										</ul>
									</div>
										<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
								</div>
								<div class="form-show">
									<p>Show</p>
									<div class="drop-down">
										<p class="selected"><span id="selected-show">8</span><i class="fa fa-caret-down" aria-hidden="true"></i></p>
										<ul class="drop-list" data-select='#selected-show'>
											<li class="per_page" data-per_page="8"><p class="select-item">8</p></li>
											<li class="per_page" data-per_page="10"><p class="select-item">10</p></li>
											<li class="per_page" data-per_page="12"><p class="select-item">12</p></li>
											<li class="per_page" data-per_page="14"><p class="select-item">14</p></li>
											<li class="per_page" data-per_page="16"><p class="select-item">16</p></li>
										</ul>
									</div>	
								</div>
								</div>
								<div class="pagination1">
								<?php 
                                    $this->load->library('pagination');
								echo 	$this->pagination->create_links(); ?>
								</div>
							</form>
						</section>
					</div>
				</div>
			</div>
		</div>
		<!-- END SECTION SHOP CATEGORY -->

<?php include 'footer.php'; ?>

<!-- jquery code written by umesh -->
<script type="text/javascript">
	$(document).ready(function(){
      cat_id='';
      sub_cat='';
      order_by='';
      srt='asc'; 
      per_page=2;
      page=1;
      $(".category").click(function(){
       cat_id= $(this).data('cat_id');
       filter_data();
      });
      $(".sub_category").click(function(){
      cat_id=  $(this).data('cat_id')
       sub_cat= $(this).data('sub_cat_id')
     filter_data(); 
      });

      $(".per_page").click(function(){
      	per_page= $(this).data('per_page');
       filter_data();
       
      })
      
      
      $(".order_by").click(function(){
      	order_by= $(this).data('order_by');
        filter_data();
        })

     
    $( "#slider-range" ).slider({
      range: true,
      min: 400,
      max: 60000,
      values: [ 400, 60000],
      slide: function( event, ui ) {
        $("#from").html(ui.values[ 0 ])
        $("#to").html(ui.values[ 1 ])
        $( "#max_price" ).val(ui.values[ 0 ]  );
        $( "#min_price" ).val(ui.values[ 1 ]  );
       filter_data();     
       }
      });
      
 $(document).on('click','.my_brand',function(e){
      e.preventDefault();
      filter_data();
  })
     
      $(document).on('click','.pagination li a',function(e){
      e.preventDefault();
      page=$(this).data('ci-pagination-page');
      filter_data();
     })
     function filter_data(){
      max= $( "#max_price" ).val();
      min=$( "#min_price" ).val();
      brand=get_brand();
      function get_brand(){
        var brands = [];
        $(".my_brand:checked").each(function(){
          brands.push($(this).val())
        });
        return brands;

      }
      $.ajax({
       url:"<?php echo base_url() ?>home/my_filters/"+page,
       method:"POST",
       data:{
         max:max,
         min:min,
         cat:cat_id,
         sub_cat:sub_cat,
         brand:brand,
         order_by:order_by,
         per_page:per_page
       },
       success:function($res){
       	var response= JSON.parse($res)
       	

       	var brands=response.brands;
       	brand_html='';
       	brands.map(function(item){
       	brand_html+='<input type="checkbox" id="manufacturer'+item.brand_id+'" class="my_brand" value="'+item.brand_id+'"><label for="manufacturer'+item.brand_id+'" class="manufacturer'+item.brand_id+'" >'+item.brand_name+'</label>'
         
       	});
       	$("#brand").html(brand_html);
       	$(".pagination1").html(response.pagination_links);
       	var products=response.products;
       	product_html='';
       	
       	// if(products.length==0)
       	// {
        //  product_html+=' <div class=" col-md-6 no_product" style="padding:50px;text-align:center;margin:auto"><h1>No Product Found Please try different filter</h1></div>';
       	// }else {
       	// {
       	base_url='<?php echo base_url() ?>';
       	date='<?php echo date("d-m-Y",strtotime('')); ?>'
       	products.map(function(item){
       	    product_html+='<div class="col-md-6 "><div><div class="product"><div class="product-prev"><a href="'+base_url+'product/'+item.product_url+' ?>"><img style="max-height: 100%" src="'+base_url+'uploads/gallery/'+item.ps_image+'"alt="product"><span class="product-label">'+item.production_date+'</span></a><div class="hide-product-buttons"><a href="#" class="h5 productaddtocart"data-size_id="'+item.size_id+'"data-prid="'+item.prid+'"data-product_id="'+item.product_id+'"><i class="fa fa-shopping-basket" aria-hidden="true"></i> add to	cart</a><a href="#" class="follow productaddtowishlist"	data-size_id="'+item.size_id+'"	data-prid="'+item.prid+'"		data-product_id="'+item.product_id+'"><i	class="fa fa-heart-o" aria-hidden="true"></i> <i class="fa fa-heart"	aria-hidden="true"></i></a>	</div>	</div><div class="product-name"><a href="'+base_url+'product/'+item.product_url+'" class="h4">'+item.product_title+'</a><p class="price">$<span>'+item.pcs_mrp+'</span> $'+item.pcs_sale+'</p>			</div>	<div class="product-desc"><p>'+item.size_name+'</p>	<p class="product-rating"><span><i class="fa fa-star" aria-hidden="true"></i></span>	<span><i class="fa fa-star" aria-hidden="true"></i></span>	<span><i class="fa fa-star" aria-hidden="true"></i></span><span><i class="fa fa-star" aria-hidden="true"></i></span>	<span><i class="fa fa-star-o" aria-hidden="true"></i></span>		</p>	</div></div></div></div>';
       	})
       
       	$("#products").html(product_html);
       	  }
      });
    }    
    
    filter_data();

  






      });


</script>
<style type="text/css">
	body ul li:before {
    content: '';
    position: absolute;
    left: 0;
    top: 11px;
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #ccc;
    display: none;
}
</style>