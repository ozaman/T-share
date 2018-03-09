<?
//@copy ($_FILES['pic_file_1']['tmp_name'] , "pic/guest_no/1.png" ); 




@mkdir("pic/".$_GET['type']."/".TIMESTAMP."", 0777);

@copy ($_FILES['pic_file_1']['tmp_name'] , "pic/".$_GET['type']."/".TIMESTAMP."/1.png" ); 
@copy ($_FILES['pic_file_2']['tmp_name'] , "pic/".$_GET['type']."/".TIMESTAMP."/2.png" ); 
@copy ($_FILES['pic_file_3']['tmp_name'] , "pic/".$_GET['type']."/".TIMESTAMP."/3.png" ); 
@copy ($_FILES['pic_file_4']['tmp_name'] , "pic/".$_GET['type']."/".TIMESTAMP."/4.png" ); 
@copy ($_FILES['pic_file_5']['tmp_name'] , "pic/".$_GET['type']."/".TIMESTAMP."/5.png" ); 

?> 