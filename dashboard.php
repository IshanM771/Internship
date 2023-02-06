<!DOCTYPE html>
<html>
  <head>
    <style>
      .hotel {
        display: flex;
        flex-direction: row;
        margin-bottom: 20px;
      }

      .hotel-image {
        width: 200px;
        height: 150px;
      }

      .hotel-info {
        margin-left: 20px;
      }
    </style>
  </head>
  <body>
    <input type="text" id="search-input" placeholder="Search for hotels">
    <br><br>
    <div id="hotels">
      <div class="hotel">
        <img class="hotel-image" src="https://www.ohotelsindia.com/pune/images/b32d5dc553ee2097368bae13f83e93cf.jpg" alt="Hotel 1">
        <div class="hotel-info">
          <h3>Amanora Park</h3>
          <p>Price: Rs 10,000</p>
        </div>
      </div>
      <div class="hotel">
        <img class="hotel-image" src="https://www.gannett-cdn.com/-mm-/05b227ad5b8ad4e9dcb53af4f31d7fbdb7fa901b/c=0-64-2119-1259/local/-/media/USATODAY/USATODAY/2014/08/13/1407953244000-177513283.jpg" alt="Hotel 2">
        <div class="hotel-info">
          <h3>Magarpatta</h3>
          <p>Price: Rs 15,000</p>
        </div>
      </div>
      <!-- Add additional hotels here -->
    </div>
    <script>
      const searchInput = document.querySelector("#search-input");
      const hotels = document.querySelector("#hotels");

      searchInput.addEventListener("input", function() {
        const searchTerm = searchInput.value.toLowerCase();
        const hotelElements = hotels.querySelectorAll(".hotel");
        for (let i = 0; i < hotelElements.length; i++) {
          const hotel = hotelElements[i];
          const hotelName = hotel.querySelector("h3").textContent.toLowerCase();
          if (hotelName.indexOf(searchTerm) === -1) {
            hotel.style.display = "none";
          } else {
            hotel.style.display = "flex";
          }
        }
      });
    </script>
  </body>
</html>
