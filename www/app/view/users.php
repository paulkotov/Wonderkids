<H1><?php echo "Wonderkids test"; ?></H1>
<div class="menu"><a href="/login/logout">Logout</a>&nbsp;&nbsp;&nbsp;<a href="/profile">Profile</a></div>
<br/>	

<script language="javascript" src="../js/ajax_search.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '.random_user', function(){
			$.ajax({
				type: "GET",
				url: "showrecord.php",
				data: "random",
				success: function(res){
					$('#random_user').attr('value', res);;
				}
			})
		});
	});
</script>	


<div class="search_panel">
	<select type="list" id="search_field" >
		<option value="first_name">First name</option>
		<option value="last_name">Last name</option>
		<option value="login">Login</option>
		<option value="email">E-mail</option>
	</select>

	 <input type="text" name="search_text" id="search_text" name="search_text" />
	 <input type="button" name="run_search" value="search" onclick="javascript:searchByFieldname(1)"/>
	 <input type="button" name="clear_search" value="clear" onclick="javascript:clearSearch();"; />
 </div>
<br />
<div>
	Display: 
	<select type="list" id="limit" name="limit" onchange="javascript:searchByFieldname(1)">
		<option value=10>10</option>
		<option value=20>20</option>
		<option value=50>50</option>
		<option value=100>100</option>
	 </select>
	 records
</div>
</hr>
</br>
<div class="random_user">
	Random User: <input type="text" name="search_text" id="random_user" name="search_text" value="" size="50"/>
	<input type="button" class="random_user" name="run_search" value="Get" />	
</div>