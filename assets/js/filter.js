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

