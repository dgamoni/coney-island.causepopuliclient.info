jQuery.noConflict();

//TWYtheme multi select script
jQuery(document).ready(function() {
	jQuery("select[multiple]").asmSelect({
		addItemTarget: 'bottom',
		animate: true,
		highlight: true,
		sortable: true
	});
}); 


//TWYtheme media upload script
jQuery(document).ready(function() {
		jQuery('.TWYtheme_upload_button').live("click", function() {
			formfield = jQuery(this).attr('name');	 
			var classList =jQuery(this).attr('class').split(' ');
			var url_input = classList[1];
			tb_show('TWY-Theme Media Upload', 'media-upload.php?type=image&amp;TB_iframe=true');
			jQuery('html').append("<meta name=\"TWYtheme_upload_button\" content=\""+url_input+"\" /> ");		
			window.custom_editor = true;
			return false;	
		});

		window.TWYtheme_upload_send_to_editor= window.send_to_editor;
		window.send_to_editor = function(html)
		{	
			var TWYtheme_upload_button= jQuery("meta[name=TWYtheme_upload_button]").attr('content');
			if (TWYtheme_upload_button) 
			{	
					imgurl = jQuery('img',html).attr('src');
					jQuery('#'+TWYtheme_upload_button).val(imgurl);
					tb_remove();
					jQuery("meta[name=TWYtheme_upload_button]").remove();
			}
			else 
			{
					window.TWYtheme_upload_send_to_editor(html);
			}
		};
});



//TWYtheme ud sidebars
jQuery(document).ready(function() {
		
	jQuery('#table_TWY_sidebars, #TWYsiderbar_page,#TWYsiderbar_post,#TWYsiderbar_cat').hide();
	
	
	jQuery('#sidebarforpages').click(function(){
	      jQuery('#TWYsiderbar_post,#TWYsiderbar_cat').hide();
	      jQuery('#TWYsiderbar_page').show();
	      jQuery('#TWYsiderbar_page #TWYtheme_sidebar_name').val('');	  
	});
	
	jQuery('#sidebarforposts').click(function(){
	      jQuery('#TWYsiderbar_page,#rtsiderbar_cat').hide();
	      jQuery('#TWYsiderbar_post').show();
	      jQuery('#TWYsiderbar_post #TWYtheme_sidebar_name').val('');	    
	});
	
	jQuery('#sidebarforcats').click(function(){
	      jQuery('#TWYsiderbar_page,#rtsiderbar_post').hide();
	      jQuery('#TWYsiderbar_cat').show();
	      jQuery('#TWYsiderbar_cat #TWYtheme_sidebar_name').val('');	      
	});	
});



//TWYtheme ud sidebars
jQuery(document).ready(function() {
		
	jQuery('#table_TWY_sidebars, #TWYsiderbar_page,#TWYsiderbar_post,#TWYsiderbar_cat').hide();
	
	
	jQuery('#sidebarforpages').click(function(){
	      jQuery('#TWYsiderbar_post,#TWYsiderbar_cat').hide();
	      jQuery('#TWYsiderbar_page').show();
	      jQuery('#TWYsiderbar_page #TWYtheme_sidebar_name').val('');	  
	});
	
	jQuery('#sidebarforposts').click(function(){
	      jQuery('#TWYsiderbar_page,#TWYsiderbar_cat').hide();
	      jQuery('#TWYsiderbar_post').show();
	      jQuery('#TWYsiderbar_post #TWYtheme_sidebar_name').val('');	    
	});
	
	jQuery('#sidebarforcats').click(function(){
	      jQuery('#TWYsiderbar_page,#TWYsiderbar_post').hide();
	      jQuery('#TWYsiderbar_cat').show();
	      jQuery('#TWYsiderbar_cat #TWYtheme_sidebar_name').val('');	      
	});	
});


//TWYtheme slider widget
jQuery(document).ready(function() {
	jQuery('.manual_related, .post_related, .manual_rest').hide();
	//jQuery(".linkto").change(function () {
	jQuery(".linkto").live('change', function () {
 

		var which_widget = (jQuery(this).attr('id'));
		var sind =jQuery(this).val();
		if(sind == "post"){
			jQuery('.'+which_widget+' .post_related, .'+which_widget+' .manual_rest').show('200');
			jQuery('.'+which_widget+' .manual_related, .'+which_widget+' .page_related').hide();
		}
		if(sind == "page"){
			jQuery('.'+which_widget+' .page_related, .'+which_widget+' .manual_rest').show('200');
			jQuery('.'+which_widget+' .manual_related, .'+which_widget+' .post_related').hide();
		}
		if(sind == "manual"){
			jQuery('.'+which_widget+' .manual_related, .'+which_widget+' .manual_rest').show('200');
			jQuery('.'+which_widget+' .post_related, .'+which_widget+' .page_related').hide();
		}
	});
	jQuery('.show_true').show();

});
 