function addCar(){
	fn.pushPage({'id': 'popup1.html', 'title': 'เพิ่มรถ'}, 'lift-ios')
	
}

function checkPicCar(id){
      	console.log(id)
      	var p1 = '../data/pic/car/'+id+'_1.jpg';
      	var p2 = '../data/pic/car/'+id+'_2.jpg';
      	var p3 = '../data/pic/car/'+id+'_3.jpg';
	  	var src = p1;
			$.ajax({
				url: src,
				type:'HEAD',
				error: function()
				{
				console.log('Error file');
//					$('#'+id+'_pic_car_1').hide();
				},
				success: function()
				{
					$('.'+id+'_pic_car_1').attr('src',p1);
					$('.'+id+'_pic_car_1').show();
				}
			});
			var src = p2;
			$.ajax({
				url: src,
				type:'HEAD',
				error: function()
				{
				console.log('Error file');
//					$('#'+id+'_pic_car_2').hide();
				},
				success: function()
				{
//					$('#'+id+'_pic_car_2').show();
					$('.'+id+'_pic_car_2').attr('src',p2);
					$('.'+id+'_pic_car_2').show();
				}
			});
			var src = '../data/pic/car/'+id+'_3.jpg';
			$.ajax({
				url: src,
				type:'HEAD',
				error: function()
				{
				console.log('Error file');
//					$('#'+id+'_pic_car_3').hide();
				},
				success: function()
				{
//					$('#'+id+'_pic_car_3').show();
					$('.'+id+'_pic_car_3').attr('src',p3);
					$('.'+id+'_pic_car_3').show();
				}
			});
	  }