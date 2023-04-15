var users = [
  { name: "John Doe", age: 30, gender: "Male", email: "john.doe@example.com" },
  {
    name: "Jane Smith",
    age: 25,
    gender: "Female",
    email: "jane.smith@example.com",
  },
  {
    name: "Bob Johnson",
    age: 40,
    gender: "Male",
    email: "bob.johnson@example.com",
  },
];

function displayUsers(users) {
  var userList = document.getElementById("user-list");

  userList.innerHTML = "";

  users.forEach(function (user) {
    var row = document.createElement("tr");
    row.innerHTML =
      "<td>" +
      user.name +
      "</td>" +
      "<td>" +
      user.age +
      "</td>" +
      "<td>" +
      user.gender +
      "</td>" +
      "<td>" +
      user.email +
      "</td>";
    userList.appendChild(row);
  });
}
window.onload = function () {
  displayUsers(users);
};
