function sendUpdates(subject, message, users) {
  // Code to send updates to all users goes here (Will be added with the backend)
  console.log("Updates sent successfully!");

  document.getElementById("subject").value = "";
  document.getElementById("message").value = "";
}

function handleSubmit(event) {
  event.preventDefault();

  var subject = document.getElementById("subject").value;
  var message = document.getElementById("message").value;

  var users = [
    { name: "John Doe", email: "john.doe@example.com" },
    { name: "Jane Smith", email: "jane.smith@example.com" },
    { name: "Bob Johnson", email: "bob.johnson@example.com" },
  ];

  // Call the function to send updates to users
  sendUpdates(subject, message, users);
}

document.querySelector("form").addEventListener("submit", handleSubmit);
