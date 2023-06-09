<?php
$hotels = [

   [
      'name' => 'Hotel Belvedere',
      'description' => 'Hotel Belvedere Descrizione',
      'parking' => true,
      'vote' => 4,
      'distance_to_center' => 10.4
   ],
   [
      'name' => 'Hotel Futuro',
      'description' => 'Hotel Futuro Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 2
   ],
   [
      'name' => 'Hotel Rivamare',
      'description' => 'Hotel Rivamare Descrizione',
      'parking' => false,
      'vote' => 1,
      'distance_to_center' => 1
   ],
   [
      'name' => 'Hotel Bellavista',
      'description' => 'Hotel Bellavista Descrizione',
      'parking' => false,
      'vote' => 5,
      'distance_to_center' => 5.5
   ],
   [
      'name' => 'Hotel Milano',
      'description' => 'Hotel Milano Descrizione',
      'parking' => true,
      'vote' => 2,
      'distance_to_center' => 50
   ],

];

$park = $_GET['filter_parking'];

var_dump($_GET);
var_dump($park);



if (!empty($park) && !empty($_GET['filter_vote'])) {

   $hotels = array_filter($hotels, function ($hotel) {
      return $hotel['parking'] && $hotel['vote'] >= $_GET['filter_vote'];
   });
} elseif (!empty($park)) {
   $hotels = array_filter($hotels, function ($hotel) {
      return $hotel['parking'];
   });
} elseif (!empty($_GET['filter_vote'])) {
   $hotels = array_filter($hotels, function ($hotel) {
      return $hotel['vote'] >= $_GET['filter_vote'];
   });
}


/* foreach ($hotels as $hotel) {
var_dump($hotel);
} */
?>

<!DOCTYPE html>
<html lang='en'>

<head>
   <meta charset='UTF-8'>
   <meta http-equiv='X-UA-Compatible' content='IE=edge'>
   <meta name='viewport' content='width=device-width, initial-scale=1.0'>
   <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet'
      integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>
   <title>Hotels</title>
</head>

<body>


   <div class="container">

      <form>
         <label for="" class="form-label"> Filters </label>
         <div class="form-group my-3 w-25">
            <select class="form-control" name="filter_parking" id="filter_parking">
               <option selected value="">All</option>
               <option value="yes">Yes</option>
               <option value='no'>No</option>
            </select>
         </div>
         <div class="mb-3">
            <label for="Vote" class="form-label">Vote</label>
            <select class="form-select" name="filter_vote" id="filter_vote">
               <option value="">All</option>
               <option value="2">2 +</option>
               <option value="3">3 +</option>
               <option value="4">4 +</option>
               <option value="5">5</option>
            </select>
         </div>
         <button type="submit" class="btn btn-primary">Filter</button>
      </form>

      <div class="card mt-3">
         <div class="card-header">
            <h2>
               Hotels
            </h2>
         </div>
         <div class="card-body">
            <table class="table table-hover m-auto">
               <thead>
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">
                        Name
                     </th>
                     <th scope="col">
                        Description
                     </th>
                     <th scope="col">
                        Parking
                     </th>
                     <th scope="col">
                        Vote
                     </th>
                     <th scope="col">
                        Distance to Center
                     </th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($hotels as $hotel): ?>

                     <tr>
                        <th scope="row"> <b>.</b> </th>
                        <td>
                           <?= $hotel["name"] ?>
                        </td>
                        <td>
                           <?= $hotel["description"] ?>
                        </td>
                        <td>
                           <?= $hotel["parking"] ? 'Yes' : 'No' ?>
                        </td>
                        <td>
                           <?= $hotel["vote"] ?>
                        </td>
                        <td>
                           <?= $hotel["distance_to_center"] . ' Km' ?>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>

   </div>



</body>

</html>