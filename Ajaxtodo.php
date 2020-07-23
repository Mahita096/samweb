<?php include('Ajaxserver.php'); ?>
<html>
<head>
  <title>Ajax Todo</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
#display_area {
  width: 25%;
  padding-top: 15px;
  margin: 10px auto;
}
.comment_box {
  cursor: default;
  margin: 5px;
  border: 1px solid #cbcbcb;
  padding: 5px 10px;
  position: relative;
}
.delete {
  top: 0px;
  position: absolute;
  right: 3px;
  color: red;
  display: none;
  cursor: pointer;
}
.edit {
  position: absolute;
  top: 0px;
  right: 45px;
  color: green;
  display: none;
  cursor: pointer;
}
.comment_box:hover .edit, .comment_box:hover .delete {
  display: block;
}

</style>
<body>
<center><h2> Ajax Todolist </h2>
   <div class="wrapper">
            <?php echo $comments; ?>
  	<form class="comment_form">
      <div>
        <label for="name">Name:</label>
      	<input type="text" name="name" id="name">
      </div>
	  <br> </br>
      <div>
      	<label for="comment">Comment:</label>
      	<textarea name="comment" id="comment" cols="35"  rows="10"></textarea>
      </div><br> </br>
      <button type="button" id="submit-btn">POST</button>
	  <button type="button" id="update_btn">UPDATE</button>
     </center>
  	</form>
  </div>
  
  <script>
  alert ("Please Fill Name & Comment");
   console.log("testing");
	 $(document).on('click', '#submit-btn', function(){
		 console.log("testing");
    var name = $('#name').val();
    var comment = $('#comment').val();
    $.ajax({
      url: 'Ajaxserver.php',
      type: 'POST',
      data: {
        'save': 1,
        'name': name,
        'comment': comment,
      },
      success: function(response){
        $('#name').val('');
        $('#comment').val('');
        $('#display_area').append(response);
      }
    });
  
  
  $(document).on('click', '.delete', function(){
  	var id = $(this).data('id');
  	$clicked_btn = $(this);
  	$.ajax({
  	  url: 'Ajaxserver.php',
  	  type: 'GET',
  	  data: {
    	'delete': 1,
    	'id': id,
      },
      success: function(response){
       
        $clicked_btn.parent().remove();
        $('#name').val('');
        $('#comment').val('');
      }
	  });
  });
  
  var edit_id;
  var $edit_comment;
  $(document).on('click', '.edit', function(){
  	edit_id = $(this).data('id');
  	$edit_comment = $(this).parent();
  	
  	var name = $(this).siblings('.display_name').text();
  	var comment = $(this).siblings('.comment_text').text();
  	
  	$('#name').val(name);
  	$('#comment').val(comment);
  	$('#submit_btn').hide();
  	$('#update_btn').show();
  });
  
	$(document).on('click', '#update_btn', function(){
  	var id = edit_id;
  	var name = $('#name').val();
  	var comment = $('#comment').val();
  	$.ajax({
      url: 'Ajaxserver.php',
      type: 'POST',
      data: {
      	'update': 1,
      	'id': id,
      	'name': name,
      	'comment': comment,
      },
      success: function(response){
      	$('#name').val('');
      	$('#comment').val('');
      	$('#submit_btn').show();
      	$('#update_btn').hide();
      	$edit_comment.replaceWith(response);
      }
	  
  	});
  });
 
  	});	

</script>	
</body>
 
</html>

