<?php 
/**
* @version      4.8.0 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');

$config_fields = $this->config_fields;
?>
<div class="jshop" id="comjshop">

    <h1 id="my_account_pre-text"><?php print _JSHOP_MY_ACCOUNT?></h1>

    <?php echo $this->tmpl_my_account_html_start?>
    <div class="jshop_profile_data">
    
        <?php if ($config_fields['f_name']['display'] || $config_fields['l_name']['display']){?>
      <div class="name"><h4><?php print $this->user->f_name." ".$this->user->l_name;?></h4></div>
        <?php }?>
        
        <?php if ($config_fields['city']['display']){?>
            <div class="city"><span><strong>
              
              <?php print _JSHOP_CITY?>:</strong></span><em> <?php print $this->user->city?></em></div>
        <?php }?>
        
        <?php if ($config_fields['state']['display']){?>
            <div class="state"><span><strong>
              
              <?php print _JSHOP_STATE?>:</strong></span><em> <?php print $this->user->state?></em></div>
        <?php }?>
        
        <?php if ($config_fields['country']['display']){?>
            <div class="country"><span><strong>
              
              <?php print _JSHOP_COUNTRY?>:</strong></span> <em><?php print $this->user->country?></em></div>
        <?php }?>
        
        <?php if ($config_fields['email']['display']){?>
      <div class="email"><span><strong><?php print _JSHOP_EMAIL?>:</strong></span><em> <?php print $this->user->email?></em></div>        
        <?php }?>
        
        <?php if ($this->config->display_user_group){?>
            <div class="group">
                <span><strong>
                  
                  <?php print _JSHOP_GROUP?>:</strong></span> 
              <small><?php print $this->user->groupname?></small> 
              <span class="subinfo">(<?php print _JSHOP_DISCOUNT?>:<mark> <?php print $this->user->discountpercent?>%)</mark></span>
                
                <?php if ($this->config->display_user_groups_info){?>
                    <a class="jshop_user_group_info" target="_blank" href="<?php print $this->href_user_group_info?>"><?php print _JSHOP_USER_GROUPS_INFO?></a>
                <?php }?>
                
            </div>
        <?php }?>
    </div>
    
    <div class="myaccount_urls">
        <div class="editdata">
            <a href = "<?php print $this->href_edit_data?>"><?php print _JSHOP_EDIT_DATA ?></a>
        </div>
        <div class="showorders">
            <a href = "<?php print $this->href_show_orders?>"><?php print _JSHOP_SHOW_ORDERS ?></a>
        </div>
	    <?php echo $this->tmpl_my_account_html_content?>
        <div class="urllogout">
            <a href = "<?php print $this->href_logout?>"><?php print _JSHOP_LOGOUT ?></a>
        </div>
    </div>
	<?php echo $this->tmpl_my_account_html_end?>
</div>