<style>
 #jshop_quantity_products {
     min-width: 60px;
	background: white;
     color: black;
     font: bold 20px Sans-serif;
      border-radius: 60px;
    -webkit-border-radius:60px;
}    
    .icon-cart {
	font-size: 75px;
    color: lime;
        float: left;
}
    #jshop_module_cart {
        position: absolute;
        right: 130px;
        top: 20px;
      
    }
    #jshop_module_cart > a > p:hover {
        color: darkgreen;
        
    }
 
.cart {
	border: none;
    width: 100px;
    height: 100px;
    margin-right: 0;
    right: 0;
}
</style>
<div id = "jshop_module_cart">


      <span id = "jshop_quantity_products"><?php print $cart->count_product?></span><a href = "<?php print SEFLink('index.php?option=com_jshopping&controller=cart&task=view', 1)?>"><p class="icon-cart"></p></a>&nbsp;

    
      

  
      

</div>