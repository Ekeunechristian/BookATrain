// document.addEventListener('DOMContentLoaded', () => {
//     const findTicketsButton = document.querySelector('.find-tickets');

//     findTicketsButton.addEventListener('click', (event) => {
//         validateField('departing-station', 'Departing station is required *');
//         validateField('arriving-station', 'Arriving station is required *');
//         validateField('outward-date', 'Arriving date and time is required *');
//     });

//     function validateField(fieldId, errorMessage) {
//         const inputElement = document.getElementById(fieldId);
//         const errorDiv = document.getElementById(fieldId + '-error');

//         if (inputElement.value.trim() === '') {
//             inputElement.classList.add('error');
//             errorDiv.textContent = errorMessage;
//             event.preventDefault();
//         } else {
//             inputElement.classList.remove('error');
//             errorDiv.textContent = '';
//         }
//     }
// });
// document.addEventListener('DOMContentLoaded', function() {
//     const modal = document.getElementById("calendarModal");
//     const closeButton = document.querySelector(".close-button");
//     const applyButton = document.querySelector(".apply-button");
//     const outwardInput = document.getElementById("outward-date");
//     const returnInput = document.getElementById("return-date");

//     function toggleModal() {
//         modal.style.display = (modal.style.display === "block" ? "none" : "block");
//     }

//     // outwardInput.addEventListener("click", function() {
//     //     toggleModal();
//     // });
//     returnInput.addEventListener("click", function() {
//         toggleModal();
//     });
//     closeButton.addEventListener("click", toggleModal);
//     applyButton.addEventListener("click", function() {
//         modal.style.display = "none";
//         // Set the input value based on the selected date and time here
//     });
// });
// document.getElementById('signInBtn').addEventListener('click', function() {
//     document.getElementById('signInForm').style.display = 'block';
// });

// document.getElementById('closeBtn').addEventListener('click', function() {
//     document.getElementById('signInForm').style.display = 'none';
// });
// // scripts.js
// var selectedTrain;

// function selectTrain(train) {
//     selectedTrain = train;
//     document.getElementById('selected-train').innerHTML = `
//         <strong>Operator:</strong> ${train.operator}<br>
//         <strong>Departure:</strong> ${train.start_point} at ${new Date(train.departure_time).toLocaleTimeString()}<br>
//         <strong>Arrival:</strong> ${train.end_point} at ${new Date(train.arrival_time).toLocaleTimeString()}<br>
//         <strong>Duration:</strong> ${train.duration}<br>
//         <strong>Price:</strong> £${parseFloat(train.price).toFixed(2)}
//     `;
// }

// function continueBooking() {
//     var url = 'booking.php?schedule_id=' + selectedTrain.schedule_id;
//     window.location.href = url;
// }

