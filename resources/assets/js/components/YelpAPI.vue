<template>
  <div id="vetSearchInput" class="container-fluid" style="width: auto;">
    <div class="form-group">
        <label for="searchZip">ZipCode</label>
        <input type="text" name="zipCode" value="" class="input-sm" placeholder="Zipcode Required" style="width: auto;" v-model='searchZip' required>
        <div>
        <input class="btn btn-secondary" style="color: white;" type="submit" id="submitZip" @click="getVet(); showBtn();">
        <input class="btn btn-secondary"  value="Clear" style="color:white;" type="button" id="reloadForm" @click="reloadForm();">
        </div>
    </div>


  <div id="output" class="container-fluid" v-for="vet in vetsArray" v-if="showOutput">
    <ul>
      <li><strong>Name:</strong>{{ vet.name }}</li>
      <li>{{vet.image_url}}</li>
      <li><strong>Rating:</strong>{{ vet.rating }}</li>
      <!-- <li>{{ vet.lat }}</li>
      <li>{{ vet.lon }}</li> -->
      <li><strong>Address:</strong>{{ vet.address}} </li>
      <li><strong>City:</strong>{{ vet.city }}</li>
      <li><strong>Zip:</strong>{{ vet.zipCode }}</li>
      <li><strong>Phone:</strong>{{ vet.phone }}</li>
    </ul>
  </div>
</div>

</template>

<script>

 export default {
  name: 'vetapi',
  // mounted(){
  //  },
   data: function() {
       return {
           showOutput: false,
           searchZip: '',
           vetsArray: [],
           // image_url:'',
           // rating:'',
           // lat:'',
           // lon:'',
           // active_url: '',
           // id:'',
           is_closed:'',
           zipCode:'',
           // address:'',
           // city:'',
           // phone:'',
           // image:'',
           showError: false,
           showStatus:true,
           apiRequest: null,
           api_key: "4YfigUosp-VDB6IqL0OsQwXN8R1yNldMtWH_PflYhY2EOTgfMo34jrD6YZj2ghj2Z1936M3RO6XJ6Rh43v4iEF91I1i8KWpgSHoN41WJ38oZ1Fd-Sb2Y8VLZ6l9zW3Yx"
         }
       },

     methods: {
      getAPI: function(location) {
         var url = 'https://api.yelp.com/v3/businesses/search';
         const API_Key = '4YfigUosp-VDB6IqL0OsQwXN8R1yNldMtWH_PflYhY2EOTgfMo34jrD6YZj2ghj2Z1936M3RO6XJ6Rh43v4iEF91I1i8KWpgSHoN41WJ38oZ1Fd-Sb2Y8VLZ6l9zW3Yx';

      let myHeaders = new Headers();
      myHeaders.append("Authorization", "Bearer " + API_KEY);

      fetch(url, {
        headers: myHeaders
      }).then((res) => {
        return res.json();
      }).then((json) => {
        console.log(json);
      });
    },

    reloadForm: function(){
      window.location.reload(true);
      }
    },

      getVet: function(){
      var url = "https://api.yelp.com/v3/businesses/search?categories=pets&limit=<limit>&location=<zipCode>&format=json&callback=?";

      url= url.replace("<zipCode>", this.searchCode);
      // url= url.replace("<subcategory>", 'vet');
      url= url.replace("<limit>", '10');
      url = url.replace("<cross_origin>", '?format=json&key=<apiKey>&callback=?');

      $.getJSON(url)
        .done(this.catchResponse)
        .catch(function(err) { alert('Error retrieving data!');
        });
      },

      catchResponse: function(response) {

          var response = JSON.parse(this.apiRequest.responseText);
          console.log(response);

          for(var i =0; i < response.businesses.length; i++){

              this.showError = false;
              this.showStatus = false;
               // used in search
              currentVet.name = response.businesses[i].name;
              currentVet.rating = response.businesses[i].rating;
              currentVet.lat = response.businesses[i].lat;
              currentVet.lon = response.businesses[i].lon;
              currentVet.active_url = response.businesses[i].url;
              // for response, not displayed
              currentVet.id = response.businesses[i].id;
              currentVet.is_closed = response.businesses[i].is_closed;
              currentVet.zipCode = response.businesses[i].id;
              //for response, displayed
              currentVet.address = response.businesses[i].display_address;
              currentVet.city = response.businesses[i].location.city;
              currentVet.phone = response.businesses[i].display_phone;
              currentVet.image = response.businesses[i].image_url;
              currentVet.showOutput = true;
         }

         console.log(response);
      },
      // hides next and previous buttons until submit button is clicked
      showBtn: function() {
         // document.getElementById('prev').style.display="block";
         // document.getElementById('next').style.display="block";
      },
  }
</script>
