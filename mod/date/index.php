<?
/*
$begin = new DateTime( "2016-06-01" );
$end   = new DateTime( "2018-12-31" );

for($i = $begin; $begin <= $end; $i->modify('+1 day')){
    echo $i->format("Y-m-d");
	echo "<br>";
	
	$db->connectdb(DB_NAME_APP,DB_USERNAME,DB_PASSWORD);
	$db->add_db('date_loop',array(

			"dayall"=>$i->format("Y-m-d"),
			 
 

		));
}
?>