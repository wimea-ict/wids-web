   
       
  

        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 2.772404 , lng: 32.288073},
          zoom: 7
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = ''; 
          var wimea = "<br><br>"
          wimea +='<button class="btn btn-primary col-md-12" style="margin-bottom: 10px" onclick="box()">Agriculture Sector advisory</button><br/><br/>'+
            '<button class="btn btn-primary col-md-12" style="margin-bottom: 10px" onclick="foodbox()">Food Sector advisory</button><br/><br/>'+
            '<button class="btn btn-primary col-md-12" style="margin-bottom: 10px" onclick="roadbox()">Road Sector advisory</button><br/><br/>'+
            '<button class="btn btn-primary col-md-12" style="margin-bottom: 10px" onclick="waterbox()">Water Sector Advisory</button><br/>'+
            '<br/><button class="btn btn-primary col-md-12" style="margin-bottom: 10px" onclick="healthbox()">Health Sector advisory</button>'+
            '';



          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindowContent.children['daily'].innerHTML = wimea;
          infowindow.open(map, marker);
        });

        function box(){
          var x = infowindowContent.children['place-name'].textContent;
          // window.alert(x); 
          window.open("/Dissemination/index.php/map/agric/"+x,"_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
          
      }

       function healthbox(){
          var x = infowindowContent.children['place-name'].textContent;
          // window.alert(x); 
          window.open("/Dissemination/index.php/map/health/"+x,"_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
          
      }

       function waterbox(){
          var x = infowindowContent.children['place-name'].textContent;
          // window.alert(x); 
          window.open("/Dissemination/index.php/map/water/"+x,"_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
          
      }

       function roadbox(){
          var x = infowindowContent.children['place-name'].textContent;
          // window.alert(x); 
          window.open("/Dissemination/index.php/map/road/"+x,"_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
          
      }

       function foodbox(){
          var x = infowindowContent.children['place-name'].textContent;
          // window.alert(x); 
          window.open("/Dissemination/index.php/map/food/"+x,"_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
          
      }
        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });

