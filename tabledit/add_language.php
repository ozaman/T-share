<?php require_once("includes/class.mysql.php"); 
$username = 'admin_MANbooking';
$pass = '252631MANbooking';
$db_name = 'admin_app';
?>
<meta charset="UTF-8" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script src="jquery.tabledit.js"></script>
<script src="jquery.tabledit.min.js"></script>


<div class='container'>
    <div class='row'>
    	 <div class='well'>
                <form method="post" id="form_type" name="form_type" enctype="multipart/form-data">
                    <div class='row'>
                        <div class='col-sm-10 col-sm-offset-1'  >
                            <div class='form-group'>
                                <label for='fname'>Name</label>
                                <input type='text' name='name_type' class='form-control' />
                            </div>
                          <!--<div class='form-group'>
                                <label for='lname'>Detail</label>
                                <textarea class='form-control' name='detail' rows='5' ></textarea>
                            </div>-->
                             <table  align="center" style="border-bottom: 0px;"><tr><td><button type="button" class="btn btn-success" id="submit">SUBMIT</button> <button type="reset" class="btn btn-info" id="reset">RESET</button></td></tr></table>
                        </div>
                    </div>
                </form>
            </div>
        <div style="margin: 5px;">
        	<button onclick="window.location = '?sort_empty=en' ">Sort by En empty</button>
        	<button onclick="window.location = '?sort_empty=th' ">Sort by Th empty</button>
        	<button onclick="window.location = '?sort_empty=cn' ">Sort by Cn empty</button>
        	
        	<button onclick="window.location = '?sort_empty=' ">Sort normal</button>
        </div>    
        <div class=''>
         <table class="table table-striped table-bordered" id="example1">
		    <thead>
		      <tr>
		        <th width="5%">Id</th>
		        <th width="20%">English</th>
		        <th width="20%">China</th>
		        <th width="20%">Thai</th>
		        <th width="20%">Key</th>
		        <th width="20%" style="display: none;">Link</th>
		        <!--<th align="center" width="9%">ACTION</th>-->
		      </tr>
		    </thead>
		    <tbody id="tbody_table_type">
		    <?php 
		$db = New DB();
		$db->connectdb($db_name,$username,$pass);
	mysql_query("SET NAMES utf8"); 
	mysql_query("SET character_set_results=utf-8"); 
		$numrow = $db->num_rows('app_language',"id","deleted = 0"); 
		if($numrow==0){ ?>
				<tr data-id="0" id="0">
			        <td class="tabledit-data" ></td>
			        <td class="tabledit-data" ></td>
			        <td class="tabledit-data" ></td>
			        <td class="tabledit-data" ></td>
			        <td class="tabledit-data" ></td>
			        <td class="tabledit-data" style="display: none;" ></td>
		        </tr>
		<? } else{
	mysql_query("SET NAMES utf8"); 
	mysql_query("SET character_set_results=utf-8"); 
		if($_GET[sort_empty]=="en"){
			$sort_empty = "and en = '' ";
		}
		else if($_GET[sort_empty]=="cn"){
			$sort_empty = "and cn = '' ";
		}
		else if($_GET[sort_empty]=="th"){
			$sort_empty = "and th = '' ";
		}else{
			$sort_empty = "";
		}
		$select = "select * from app_language where deleted = 0 ".$sort_empty;
		$res[other] = $db->select_query($select);
		$num = 0;
		  while($arr[other] = $db->fetch($res[other])) { ?>
		  
		      <tr id="<?=$arr[other][i_id];?>" data-id="<?=$num=+1;?>" >
		        <td class="tabledit-data" ><?=$arr[other][id];?></td>
		        <td class="tabledit-data" ><?=$arr[other][en];?></td>
		        <td class="tabledit-data" ><?=$arr[other][cn];?></td>
		        <td class="tabledit-data" ><?=$arr[other][th];?></td>
		        <td class="tabledit-data" ><?=$arr[other][keyword];?></td>
		        <td class="tabledit-data link" style="display: none;" ><a target="_blank" href="<?=$arr[other][link];?>"><?=$arr[other][link];?></a></td>
		       
		      </tr>
		    <? }  
		    } ?>
		    </tbody>
		  </table>
        </div>
    </div>
</div>


<script>

$('#example1').Tabledit({
    url: 'update.php',
    columns: {
        identifier: [0, 'Id'],
        editable: [[1, 'English'], [2, 'China'], [3, 'Thai'], [4, 'Keyword'], [5, 'Link']]
    },
	  onSuccess: function(data, textStatus, jqXHR) {
	      console.log(data);
/*	      console.log(textStatus);
	      console.log(jqXHR);*/
	  },
  onFail: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR);
      console.log(textStatus);
      console.log(errorThrown);
  }
});

var url_write = "write_define.php";
$.post(url_write, function(data) {
		console.log(data);
});
/*$('#example3').Tabledit({
    url: 'example.php',
    editButton: false,
    deleteButton: false,
    hideIdentifier: true,
    columns: {
        identifier: [0, 'id'],
        editable: [[1, 'NAME'], [2, 'DETAIL']]
    }
});*/
</script>

<script>
	$('#submit').click(function(){
		
		var url = "insert.php?action=type";
		$.post(url,$('#form_type').serialize(), function(data) {
					console.log(data);
					if(data==1){
						 alert('success');
						 load_type();
					}else{
						alert('error');
					}
		});
	});
	$('.link').find('span').each (function() {
	  	var link = $(this).text();
	  	console.log(link);
	  	$(this).html('<span class="tabledit-span"><a target="_blank" href="'+link+'" >'+link+'</a></span>');
	});
</script>

<script>
	function load_type(){
		var url = "insert.php?action=query_type";	
		$.post(url, function(data) {	
			console.log(data);	
			var res = JSON.parse(data);
                        $.each(res, function (i, item) {
//							alert(item.s_name);
							 /*$("#tbody_table_type").append("<tr id='"+item.i_id+"'><td>"+item.i_id+"</td><td>"+item.s_name+"</td><td>"+item.s_detail+"</td><td></td></tr>");*/	
									 		addrow(item.id,item.en,item.cn,item.th);
                        });
		});


	}

	function addrow(id,name,detail){
		var tableditTableName = '#example1';
	    var newID = parseInt($(tableditTableName + " tr:last").attr("data-id")) + 1;
	    var clone = $("#example1 tr:last").clone();
	    $(".tabledit-data span", clone).text("");
	    $(".tabledit-data input", clone).val("");
	    clone.appendTo("#example1");
	    $(tableditTableName + " tr:last").attr("data-id", newID)
	    $(tableditTableName + " tr:last td .tabledit-span.tabledit-identifier").text(id);
	    $(tableditTableName + " tr:last td .tabledit-input.tabledit-identifier").val(id);
	    
	    $(tableditTableName + " tr:last td .tabledit-input.tabledit-identifier").attr('id',id);
	    
	    $(tableditTableName + " tr:last td[class='tabledit-data tabledit-view-mode']:eq( 0 ) .tabledit-span").text(name);
	    $(tableditTableName + " tr:last td[class='tabledit-data tabledit-view-mode']:eq( 0 ) .tabledit-input").val(name);
	    
	    $(tableditTableName + " tr:last td[class='tabledit-data tabledit-view-mode']:eq( 1 ) .tabledit-span").text(detail);
	    $(tableditTableName + " tr:last td[class='tabledit-data tabledit-view-mode']:eq( 1 ) .tabledit-input").val(detail);
	
	   	$('#tbody_table_type tr[data-id="0"]').remove();
	}
	
	
	
</script>

