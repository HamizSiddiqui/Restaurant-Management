document.addEventListener('DOMContentLoaded', function() { //see more modal
    const seeMoreLinks = document.querySelectorAll('.see-more');

    seeMoreLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Get data from clicked link
            const itemName = this.getAttribute('data-name');
            const itemDescription = this.getAttribute('data-description');

            // Populate the modal
            document.getElementById('modal-title').innerText = itemName;
            document.getElementById('modal-description').innerText = itemDescription;
        });
    });
});


// Initialize event listeners for all buttons in the cart containers
document.querySelectorAll('.cart-container').forEach(cart => {
    let counter = 0; // Initial counter value for each cart
    const cartCounter = cart.querySelector('.cart-counter'); // Cart counter icon
    const counterValue = cart.querySelector('.counter-value'); // The text span for counter value
    const addButton = cart.querySelector('.add-btn'); // Add button
    const subtractButton = cart.querySelector('.subtract-btn'); // Subtract button
  
    // Function to update the counter display
    const updateCounter = () => {
      counterValue.textContent = counter;
      if (cartCounter) cartCounter.textContent = counter; // Update cart icon counter if exists
    };
  
    // Event listener for Add button
    addButton.addEventListener('click', () => {
      counter++;
      updateCounter();
    });
  
    // Event listener for Subtract button
    subtractButton.addEventListener('click', () => {
      if (counter > 0) {
        counter--;
        updateCounter();
      }
    });
  });
  



