// header-loader.js
window.onload = function() {
    // Fetch the header and footer content
    fetch("partials/header.html")
      .then(response => response.text()) // Convert response to text
      .then(data => {
        document.getElementById("header-container").innerHTML = data; // Place header content in the container
      })
      .catch(error => {
        console.error('Error loading header:', error); // Handle error
      });
  
    fetch("partials/footer.html")
      .then(response => response.text()) // Convert response to text
      .then(data => {
        document.getElementById("footer-container").innerHTML = data; // Place footer content in the container
      })
      .catch(error => {
        console.error('Error loading footer:', error); // Handle error
      });
  };
  