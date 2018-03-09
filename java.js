function checkAll(field)
{
  for(i = 0; i < field.elements.length; i++)
     field[i].checked = true ;
}

function uncheckAll(field)
{
 for(i = 0; i < field.elements.length; i++)
    field[i].checked = false ;
}

function Confirm(link,text) 
{
  if (confirm(text))
     window.location=link
}

  function delConfirm(obj){
	var status=false;
	for(var i=0 ; i < obj.elements.length ; i++ ){
		if(obj[i].type=='checkbox'){
			if(obj[i].checked==true){
				status=true;
			}
		}
	}
	if(status==false){
		alert('Plese select data to delete.');
		return false;
	}else{
		if(confirm('You sure to delete data?')){
			return true;
		}else{
			return false;
		}
	}
}




//////////////////

function userAll(field)
{
  for(i = 0; i < field.elements.length; i++)
     field[i].checked = true ;
}

function unuserAll(field)
{
 for(i = 0; i < field.elements.length; i++)
    field[i].checked = false ;
}

function Confirm(link,text) 
{
  if (confirm(text))
     window.location=link
}

  function userConfirm(obj){
	var status=false;
	for(var i=0 ; i < obj.elements.length ; i++ ){
		if(obj[i].type=='checkbox'){
			if(obj[i].checked==true){
				status=true;
			}
		}
	}
	if(status==false){
		alert('Plese select user to send message.');
		return false;

	}
}


//////////// mail


  function mailConfirm(obj){
	var status=false;
	for(var i=0 ; i < obj.elements.length ; i++ ){
		if(obj[i].type=='checkbox'){
			if(obj[i].checked==true){
				status=true;
			}
		}
	}
	if(status==false){
		alert('Plese select data to send email.');
		return false;
	}else{
		if(confirm('You sure to send email?')){
			return true;
		}else{
			return false;
		}
	}
}



//////////// print


  function printConfirm(obj){
	var status=false;
	for(var i=0 ; i < obj.elements.length ; i++ ){
		if(obj[i].type=='checkbox'){
			if(obj[i].checked==true){
				status=true;
			}
		}
	}
	if(status==false){
		alert('Plese select data to print.');
		return false;
	}else{
		if(confirm('You sure to print?')){
			return true;
		}else{
			return false;
		}
	}
}





function Confirm(link,text) 
{
  if (confirm(text))
     window.location=link
}

  function itemConfirm(obj){
	var status=false;
	for(var i=0 ; i < obj.elements.length ; i++ ){
		if(obj[i].type=='checkbox'){
			if(obj[i].checked==true){
				status=true;
			}
		}
	}
	if(status==false){
		alert('Plese select item.');
		return false;
	}else{
		if(confirm('You sure to apply data?')){
			return true;
		}else{
			return false;
		}
	}
}

