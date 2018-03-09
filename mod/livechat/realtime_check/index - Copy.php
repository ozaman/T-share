 <? //=$_GET[chat_from]?>
<script>
   if ( navigator.geolocation ) {
                    navigator.geolocation.getCurrentPosition(function(location) {
                        var location = location.coords;
          
		  
		  ///       $("#geo_data").html('lats: '+location.latitude+'<br />longs: '+location.longitude);
		  
		  
						
 
						
                        initialLocation = new google.maps.LatLng(location.latitude, location.longitude);
                        map.setCenter(initialLocation);
                        setMarker(initialLocation);
                    }, function() {
                        handleNoGeolocation();
                    });
                } else {
                    handleNoGeolocation();
                }
</script>
 

 
<? $google_api="AIzaSyDJa08ZMaSnJP5A6EsL9wxqdDderh7zU90";?>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.26&key=<?=$google_api?>&callback=initialize"></script>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 
<script type="text/javascript">

	//Icons
	var customIcons = {
      free: {
        icon: 'images/<?=$_GET[chat_to]?>.png?v=<?=time();?>'
     //shadow: 'https://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      busy: {
        icon: 'images/<?=$_GET[chat_from]?>.png?=<?=time();?>'
     //  shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      }
    };

	//Popup dos markers
	var infoWindow = null;	

	//A visibilidade do mapa precisa estar global
	var map = null;
	
	//Este é um array global dos marcadores presentes na tela
	var markersArray = [];

	/*
	 * Inicialização da API de Mapas do Google 
	 */
	function initialize() {

 
                    navigator.geolocation.getCurrentPosition(function(location) {
                        var location = location.coords;
          
		  
		  ///       $("#geo_data").html('lats: '+location.latitude+'<br />longs: '+location.longitude);
		  
		
		 
		 
      
					
					 
     
		//Não vou explicar o óbvio!!!
		var myLatlng = new google.maps.LatLng(location.latitude, location.longitude);
		var myOptions = {
			zoom : 14,
			center : myLatlng,
			mapTypeId : google.maps.MapTypeId.ROADMAP
			
		}

 
		map = new google.maps.Map(document.getElementById("map_canvas"),
				myOptions);
				
		infoWindow = new google.maps.InfoWindow;				
		
		//Esse método eu criei para realizar o load dos markers no mapa
		//Execução imediata!!!
		updateMaps();
 
		//Definimos tambem execução com intervalo de tempo
		window.setInterval(updateMaps, 1000);
		              });

	}
	
	/*
	 * Método que remove os overlays dos markers
	 */
    function clearOverlays() {
	  for (var i = 0; i < markersArray.length; i++ ) {
	   markersArray[i].setMap(null);
	  }
	}
	
	/*
	 * Método que realiza chama o caminho do xml de dados
	 * e atualiza o mapa
	 */	
	function updateMaps() {

		// Vamos remover o que já havia de overlay
		// É possível implementar a remoção e inclusão seletiva
		clearOverlays();

		//Aqui é o pulo do gato, que muita gente perde noites de sono
		//e quando você para para ver a solução, percebe que é tão óbvia
		
		//Quando chamamos um arquivo, o browser pode tomar a decisão
		//de armazenar em cache. Se o browser utilizar cache, as próximas 
		//requisições do mesmo recurso não batem no servidor.
		
		//Definindo um modificador único para o arquivo de dados conseguimos "FORÇAR" 
		//o browser a baixar novamente o arquivo.
		
		//Em java eu utilizo o header do http para dizer NO-CACHE!!
		
		var timestamp = new Date().getTime();
		var data = '../../../../data/xml/realtime/<?=$_GET[vc]?>_<?=$_GET[chat_from]?>.xml?t=' + timestamp;
		
		//Me guardo o direito a não explicar o óbvio, novamente
		$.get(data, {}, function(data) {
			$(data).find("marker").each(
					function() {
						var marker = $(this);
						var status = marker.attr("status")
						var icon = customIcons[status] || {};
						var latlng = new google.maps.LatLng(parseFloat(marker
								.attr("lat")), parseFloat(marker.attr("lng")));
						var html = "<b>this location is "+status+"</b><br/><a href=\"#\">I\'m on it!</a>";
						var marker = new google.maps.Marker({
							position : latlng,
							map : map,
							 icon: icon.icon,
							//shadow: icon.shadow,
						});
						
						 
						
					//Opa... bora guardar as referências dos markers??
					markersArray.push(marker);
						
					google.maps.event.addListener(marker, "click", function() {});
					});
			});

		}

		google.setOnLoadCallback(initialize);
	
</script>
 
	<div id="map_canvas" style="width: 100%; height:100%"> </div>
 
