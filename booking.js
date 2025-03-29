// Function to calculate and display the total price
function calculateTotalPrice() {
    const form = document.getElementById('bookingForm');
    const formData = new FormData(form);

    // Room type prices
    const roomPrices = {
        single: 600,
        double: 1000,
        suite: 800
    };

    const roomType = formData.get('roomtype');
    const numberOfGuests = parseInt(formData.get('numberofguests'), 10);
    const numberOfRooms = parseInt(formData.get('numberofrooms'), 10);
    const checkinDate = new Date(formData.get('checkin'));
    const checkoutDate = new Date(formData.get('checkout'));

    if (checkoutDate <= checkinDate) {
        document.getElementById('message').innerHTML = `<p class="error-message">Check-out date must be after check-in date!</p>`;
        return;
    }

    const oneDay = 24 * 60 * 60 * 1000;
    const numberOfNights = Math.round(Math.abs((checkoutDate - checkinDate) / oneDay));

    if (!roomPrices[roomType] || isNaN(numberOfGuests) || isNaN(numberOfRooms) || numberOfNights <= 0) {
        document.getElementById('message').innerHTML = `<p class="error-message">Invalid input! Please check your entries.</p>`;
        return;
    }

    const pricePerRoom = roomPrices[roomType];
    const totalPrice = pricePerRoom * numberOfGuests * numberOfRooms * numberOfNights;

    document.getElementById('totalPrice').textContent = `R${totalPrice}`;
}

// Attach event listeners for real-time updates
document.getElementById('roomtype').addEventListener('change', calculateTotalPrice);
document.getElementById('numberofguests').addEventListener('change', calculateTotalPrice);
document.getElementById('numberofrooms').addEventListener('change', calculateTotalPrice);
document.getElementById('checkin').addEventListener('change', calculateTotalPrice);
document.getElementById('checkout').addEventListener('change', calculateTotalPrice);

// Add event listener for the Confirm Payment button
document.getElementById('confirmPaymentButton').addEventListener('click', function () {
    const form = document.getElementById('bookingForm');
    const formData = new FormData(form);

    // Ensure the form is valid before submission
    if (!form.checkValidity()) {
        document.getElementById('message').innerHTML = `<p class="error-message">Please fill all required fields correctly!</p>`;
        return;
    }

    // Manually append totalPrice to FormData
    const totalPriceValue = document.getElementById('totalPrice').textContent.replace('R', '');
    formData.append('totalPrice', totalPriceValue);

    // Submit form data via fetch
    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())  // Expect JSON response
    .then(result => {
        if (result.success) {
            console.log('Form submitted successfully!');

            // Step 1: Show the 'View Receipt' button
            const viewReceiptButton = document.getElementById('viewReceiptButton');
            viewReceiptButton.style.display = 'inline';  // Make the button visible

            // Step 2: Add event listener to the 'View Receipt' button
            viewReceiptButton.addEventListener('click', function () {
                // Redirect to receipt page when clicked
                window.location.href = `receipt.php?name=${result.data.name}&surname=${result.data.surname}&roomtype=${result.data.roomtype}&numberofrooms=${result.data.numberofrooms}&numberofguests=${result.data.numberofguests}&totalPrice=${result.data.totalPrice}`;
            });
        } else {
            console.error('Error:', result.error);
            document.getElementById('message').innerHTML = `<p class="error-message">Something went wrong: ${result.error}</p>`;
        }
    })
    // Error handling on fetch failure
    .catch(error => {
        console.error('Error:', error);
        document.getElementById('message').innerHTML = `<p class="error-message">Something went wrong. Please try again!</p>`;
    });
});
