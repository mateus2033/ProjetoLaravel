<div class="container">
    <div class="row">
        <div class="col-12">
            <div id='map' style='width: 1200px; height: 800px;'></div>
        </div>
    </div>
</div>


@push('scripts')


<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoibWF0ZXVzMjAzMyIsImEiOiJja3Y4cTR3bHI1YTI1MndxOWRpNjZydXNoIn0.s9jC5wwsN_ISD6cwtSaXsQ';


    var map = new mapboxgl.Map({

        container:'map',
        style: 'mapbox://styles/mapbox/streets-v11',

    });

    
    const marker = new mapboxgl.Marker({
            color: "red",
            draggable: true
    }).setLngLat([-123.9749, 40.7736])
      .addTo(map);
    



    


  
    
   

  


</script>

@endpush