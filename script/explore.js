console.log("Hello World");

var cardData;
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    cardData = JSON.parse(this.responseText);
    console.log(this.responseText);
    for (let i = 0; i < cardData.length; i++) {
        const table = document.getElementById("table");
        console.log(table);
      
        const card = document.createElement("div");
        card.className = "card";
        card.onclick = function () {
          console.log("clicked");
        }
      
        const content = document.createElement("div");
        content.className = "content";
      
        const front = document.createElement("div");
        front.className = "front";

        const head = document.createElement('h2')
        head.className = "trekname";
        head.textContent = cardData[i].name;

        const date = document.createElement('div')
        date.className = "date";
        date.textContent = cardData[i].date;

        const time = document.createElement('div')
        time.className = "time";
        time.textContent = cardData[i].time;
        
        // front.innerHTML = 'front div';
        
      
        const back = document.createElement("div");
        back.className = "back";
        // back.innerText = "back div";
        back.textContent = cardData[i].location;
      
        card.appendChild(content);
        content.appendChild(front);
        front.appendChild(head);
        front.appendChild(date);
        front.appendChild(time);
        content.appendChild(back);
        table.appendChild(card);
      }
  }
};
xhttp.open("GET", "../getdata.php", true);
xhttp.send();
