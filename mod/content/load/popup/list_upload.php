<table class="table">
				  			<tr>
				  				<td align="left"><strong>ประเภท</strong></td>
				  				<td align="left"><strong>ชื่อ</strong></td>
				  				<td align="left"><strong>หมดอายุ</strong></td>
				  				<td align="left"><strong>เหลือเวลา</strong></td>
				  				<td align="center" width="10%"><strong>ดาวน์โหลด</strong></td>
				  				<td align="center" width="10%"><strong>ลบ</strong></td>
				  			</tr>
				  			
				  <? 
					$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
					$res[doc] = $db->select_query("SELECT * FROM place_document_file where product_id =".$_GET[id]."  ");
					
					while($arr[doc] = $db->fetch($res[doc])){ 
						$res[doc_type] = $db->select_query("SELECT * FROM place_detail_doc_group where id = ".$arr[doc][type]."  ");
						$arr[doc_type] = $db->fetch($res[doc_type]);
					?>
						<tr id="row_show_file_db_<?=$arr[doc_type][id];?>">
							<td><?=$arr[doc_type][category_name];?></td>
							<td><span title="<?=$arr[doc][document_name];?>"><?="...".substr($arr[doc][document_name],10);?></span></td>
							<td align="left"><? if($arr[doc][end_expired]=="" or $arr[doc][end_expired] == NULL){
								echo "-";
							}else{
								echo $arr[doc][end_expired];
							}?></td>
							
							<td>
							<?php 
							$now = time(); // or your date as well
							$your_date = strtotime($arr[doc][end_expired]);
							$datediff = $now - $your_date;
							if($datediff>0){
								$color = "color:#ff0000";
								$txt_ckc = "เกิน";
							}else if($datediff<=0){
								$color = "color:#000000"; 
								$txt_ckc = "เหลือ";
							}
							$day = floor($datediff / (60 * 60 * 24));
							?>
							<span style="<?=$color;?>" id="dift_date_<?=$arr[doc_type][id];?>"><?=$txt_ckc." ".abs($day)." วัน";?></span>
							</td>
							
							<td align="center"><a href="../data/pic/document/place/<?=$arr[doc][document_name];?>" download><button class="btn btn-md" type="button"><i class="fa fa-download" aria-hidden="true"></i></button></a></td>
							<td align="center"><button class="btn btn-md btn-info" type="button" onclick="deleteFile('<?=$arr[doc_type][id];?>','<?=$arr[doc][document_name];?>');"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
						</tr>
				<?	}
				  	 ?>
				  			
				  		</table>
			  		
		<script>
		function findDift(id){
			var end = parseDate($('#end_expired_'+id).val());
				var current =  parseDate($('#current_expired_'+id).val());
				console.log(end+" :: "+current);
				var total = daydiff(current,end);
				console.log(total);
		}
		function parseDate(str) {
		    var mdy = str.split('/');
		    return new Date(mdy[2], mdy[0]-1, mdy[1]);
		}

		function daydiff(first, second) {
		    return Math.round((second-first)/(1000*60*60*24));
		}

//		console.log(daydiff(parseDate($('#first').val()), parseDate($('#second').val())));	
		
			  				
		function deleteFile(id,filename){
			console.log(id+" : "+filename);

			 swal({
					title: "<font style='font-size:28px'><b> คุณแน่ใจหรือไม่",
					text: "<font style='font-size:22px'>ว่าต้องการลบ <? echo $arr[place][topic_th];?>",
					type: "error",
					showCancelButton: true,
					animation:  false ,
					
					confirmButtonColor: '#DD6B55',
					confirmButtonText: 'ใช่',
					cancelButtonText: "ไม่ใช่",
					closeOnConfirm: true,
					closeOnCancel: true,
					html: true
				},
				function(isConfirm){
				    if (isConfirm){
						$.post( "empty_style.php?name=content/load&file=place&op=sub_file_deleted&id=<?=$_GET[id];?>",{ id_row : id , filename : filename},  function( data ) {
								$('#row_show_file_db_'+id).remove();
								console.log(data);
						});	
				    } else {
				      swal("Cancelled", "", "error");
				    }
				});			
			

		}
				  		</script>