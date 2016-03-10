<?php

function fbsm_get_options()

{

	$options=array(

			'author_name_custom'=>'WPDeveloper',
			'default_fb_url'=>'https://www.facebook.com/WPDeveloperNet'

	);

	

	$saved_options=get_option('fbsm_options',$options);

	return $saved_options;

}







function fbsm_options_page()

{

	global $wpdb;

	$fbsm_options=fbsm_get_options();

	

	if(isset($_POST['save_options']))

	{

		$options=array(

				'author_name_custom'=>stripslashes(trim($_POST['author_name_custom'])),
				'default_fb_url'=>stripslashes(trim($_POST['default_fb_url']))

		);	

	update_option('fbsm_options',$options);

	$fbsm_options=$options;

	}#end if(isset($_POST['save_options']))

	//oneTarek

	global $current_user;	

	?>

	 <div style="width: 1010px; padding-left: 10px;" class="wrap">

		 <div style="width: 700px; float:left;">

		 <div id="icon-options-general" class="icon32"></div>

		 <h2>Facebook Secret Meta Option</h2>

  <div style=" text-align:center; "><h2><b>Pro version is available now, <a href="http://wpdeveloper.net/go/FSMPro" target="_blank">get Pro</a>. Only $9.97 USD!!!</b></h2><br /></div>


            <form action="" method="post">
			<hr />
			<h3 style="text-align:center">Author By Info</h3>
            <table class="form-table">
	<tr>
			<td valign="top" align="right"><strong>Site's Main Facebook URL:</strong></td>
			<td><input type="text" name="default_fb_url" size="50" value="<?php echo $fbsm_options['default_fb_url'];?>" /></td>
			</tr>
            <tr><td  valign="top" align="right"><strong>Author Byline Text:</strong></td>
			<td>
			<input type="text" name="author_name_custom" value="<?php echo ($fbsm_options['author_name_custom'])? $fbsm_options['author_name_custom'] :'WPDeveloper';?>" size="20"  onblur="javascript: if(this.value=='') {this.value='WPDeveloper';}" onclick="javascript: if(this.value=='WPDeveloper') {this.value='';}"  />
			</td></tr>
		

           <tr><td>&nbsp;</td><td>           <em> # For personal blog it should be your full name, like <b>"John Doe"</b></em><br /><br />

            

           <em> # For other site, use your legal name or brand name, like -<br />

            a) The Something LLC or b) The Tech Journal Desk</em><br /></td></tr>

            <tr><td align="right";><input type="submit" name="save_options" value="Save Options" class='button-primary'/></td><td>&nbsp;</td></tr>

            </table>

            </form>
<hr />
 <HR />
<div style="padding:10px 50px; background:#dddddd;">
<h2 style="text-align:center;">Options for Pro version:</h2>
 
	<script type="text/javascript">

    	function show_default_cus_txt(show)

		{

			if(show)

			document.getElementById("default_custom_text_area").style.display="block";

			else

			document.getElementById("default_custom_text_area").style.display="none";

		}

    	function show_single_type_field(n)

		{

			if(n==0)

			{

			document.getElementById("single_custom_text_area").style.display="none";

			document.getElementById("author_name_type_area").style.display="none";

			}

			else if(n==1)

			{

			document.getElementById("single_custom_text_area").style.display="none";

			document.getElementById("author_name_type_area").style.display="block";					

			}

			else if(n==2)

			{

			document.getElementById("single_custom_text_area").style.display="block";

			document.getElementById("author_name_type_area").style.display="none";			

			}

		}	

		

    

    </script>



            

            <table class="form-table">

            <tr><td>

            <h3>Author By Info:</h3>

            <strong>Default for All Pages</strong>:<hr />
			<strong>Text : </strong><br />
            

            <input type="radio" name="ds" value="blogname" id="default_source_blogname" onclick="show_default_cus_txt(0)"  checked="checked" /><label for="default_source_blogname">Use Blog Name</label><br />

            <input type="radio" name="ds" value="custom" id="default_source_custom"  onclick="show_default_cus_txt(1)" /><label for="default_source_custom">Use Custom Text</label><br />

            <div id="default_custom_text_area" style="display:none"> 
	
				<input type="text" name="dct" value="" size="20" placeholder="Custom Text"  />
	
				<div style="color:#999999;"><em> # For personal blog it should be your full name, like <b>"John Doe"</b></em><br />
	
				<em> # For other site, use your legal name or brand name, like -<br />
	
				a) The Something LLC ; b) The Tech Journal Desk</em><br />
	
				</div>           

            </div>
			<div>
			<strong>Site's Main Facebook URL: </strong><input type="text" name="dfl" size="50" value="" /> 
			</div>

			</td></tr>

			<tr><td>
            <br /><strong>For Single Post/Article</strong>:<hr />


			<strong>Text : </strong><br />


            <input type="radio" name="ss" value="default" id="single_source_default" onclick="show_single_type_field(0)"  checked="checked"  /><label for="single_source_default">Use Default</label><br />

            <input type="radio" name="ss" value="postauthor" id="single_source_postauthor"  onclick="show_single_type_field(1)"  /><label for="single_source_postauthor">Use Post Author Name</label><br />

            <div id="author_name_type_area"  style="display:none"> 

			<select name="ant">

            	<option value="nickname" selected="selected">Nick Name</option>

                <option value="fullname">Full Name</option>

                <option value="username">Username</option>

                <option value="displayname">Display Name</option>            

            </select>

            </div>

            

            <input type="radio" name="ss" value="custom"  onclick="show_single_type_field(2)" id="single_source_custom"/><label for="single_source_custom">Use Custom Text</label><br />

            <div id="single_custom_text_area"  style="display:none"> 

            <input type="text" name="sct" value="" size="20" placeholder="Custom Text" />

            </div>
			<div>
				<strong>Author's Facebook URL: </strong><br />
				<input type="radio" name="sfs" value="default" id="single_fb_source_def" /> <label for="single_fb_source_def">Use Default</label> <br />
				<input type="radio" name="sfs" value="profile" id="single_fb_source_pro" /> <label for="single_fb_source_pro">Use from author's profile</label>
			</div>
            </td></tr>
            <tr><td align="left";>
			<div id="prodiv" style="background:#ffffff; padding:10px; margin-bottom:10px; display:none;">
			<h2><b>Those Exclusive Options Are Available in Pro Version! <a href="http://wpdeveloper.net/go/FSMPro" target="_blank">Get Pro</a>. Only $9.97 USD!!!</b></h2>
			</div>
			<input type="button" name="save_options" value="Save Options" class='button-primary' onclick="javascript: document.getElementById('prodiv').style.display='block'" />
			</td></tr>

            </table>
 

</div>
   <div style=" text-align:center; "><b>Example:(<a href="https://www.facebook.com/WPDeveloperNet/posts/745027968850750" target="_blank">Live</a>)</b><br />
  <!--<a target="_blank" href="http://wpdeveloper.net/free-plugin/facebook-secret-meta/"><img style="border:2px solid #ffffff;" src="<?php echo FBSM_PLUGIN_URL."/fsm-live-example-1rs.jpg" ?>" width="500" alt="Facebook Secret Meta" /></a>-->
  </div>
<!-- embeded example -->
<center>
<div id="fb-root"></div><script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script><div class="fb-post" data-href="https://www.facebook.com/WPDeveloperNet/posts/964388203581391" data-width="500"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/WPDeveloperNet/posts/964388203581391"><p>We are amazed by the Block Referral Spam community. In past one and half week, we got inputs from more then 50 users....</p>Posted by <a href="https://www.facebook.com/WPDeveloperNet">WPDeveloper</a> on&nbsp;<a href="https://www.facebook.com/WPDeveloperNet/posts/964388203581391">Saturday, July 4, 2015</a></blockquote></div></div>
<br /><br />
</center>
<!-- end embeded example -->
 <HR />
<?php

		

		echo "</div>";

	

		include_once(FBSM_PLUGIN_PATH."fbsm-sidebar.php");

		echo '<div style="clear:both"></div>';

	echo "</div>";



}



?>