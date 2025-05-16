<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>weather</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
 <!-- Bootstrap 5 CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    #weather-form{
        position: relative;
    }
    #weather-form i{
        position: absolute;
        top: 35%;
        right: 10px;
        transform: translateY(-50%);
        display: none;
    }
    #weather-form.loading i{
        display: block;
    }


    </style>

</head>
<body>
    <div class="container my-5">
        <h1 class="text-center my-4">weather app from API</h1>
        <div class="table-responsive">

            <form onsubmit="getWeather(event)" id="weather-form" class="mb-4">
        <div class="mb-3">
            <label for="city" class="form-label">Enter City</label>
            <input type="text" id="city" name="city" class="form-control" placeholder="Enter city name" required>
            <i class="fas fa-spinner fa-spin fa-2x"></i>

        </div>

   <br>
        {{-- <button type="submit" class="btn btn-primary">Get Weather</button> --}}
    </form>

      <h2 class="text-center" id="temp">Weather Information</h2>
            <div id="weather-info" class="table-responsive">
                <!-- Weather information will be displayed here -->
            </div>

        </div>
    </div>

    {{-- axios library for ajax --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>

        // function getWeather(e) {
        //     e.preventDefault();
        //     let city = document.querySelector('#weather-form input').value;
        //     let url ='https://api.openweathermap.org/data/2.5/weather?q='+city+'&appid=5225bc319cf6c1c19f206f32db717d81&units=metric';

        //     axios.get(url)
        //         .then(function (response) {
        //             document.querySelector('#weather-form').classList.add('loading');

        //         document.querySelector('#temp').innerHTML = response.data.main.temp;

        //         })
        //         .catch(function (error) {
        //             document.querySelector('#temp').innerHTML = 'city not found';

        //         })
        //         .finally(function () {
        //             // always executed
        //             document.querySelector('#weather-form').classList.remove('loading');

        //         });




        // }
        // </script>


<script>
    function getWeather(e) {
        e.preventDefault();

        let city = document.querySelector('#weather-form input').value;
        let url = 'https://api.openweathermap.org/data/2.5/weather?q=' + city + '&appid=5225bc319cf6c1c19f206f32db717d81&units=metric';

        document.querySelector('#weather-form').classList.add('loading');

        axios.get(url)
            .then(function (response) {
                document.querySelector('#temp').innerHTML = "Temperature: " + response.data.main.temp + "°C";
            })
            .catch(function (error) {
                document.querySelector('#temp').innerHTML = 'City not found';
            })
            .finally(function () {
                document.querySelector('#weather-form').classList.remove('loading');
            });
    }
</script>


</body>
</html>
