document.getElementById("form").addEventListener("submit", function(event) {
    var selectedDate = new Date(document.getElementById("selectdate").value);
    var selectedTime = document.getElementById("selecttime").value;

    var currentDate = new Date();
    var startTime = new Date().setHours(10, 0, 0);
    var endTime = new Date().setHours(18, 0, 0);

    if (!selectedDate || selectedDate <= currentDate) {
        alert("Please select a future date.");
        event.preventDefault();
        return;
    }

    if (!selectedTime) {
        alert("Please select a time.");
        event.preventDefault();
        return;
    }

    var timeParts = selectedTime.split(":");
    var selectedHour = parseInt(timeParts[0], 10);
    var selectedMinute = parseInt(timeParts[1], 10);
    var selectedDateTime = new Date(selectedDate);
    selectedDateTime.setHours(selectedHour, selectedMinute, 0, 0);

    // if (selectedDateTime.getTime() < startTime || selectedDateTime.getTime() > endTime) {
    //     alert("Please select a time between 10:00 AM and 6:00 PM.");
    //     event.preventDefault();
    //     return;
    // }
});
