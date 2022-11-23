const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
}

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
          // let's start ajax
          let xhr = new XMLHttpRequest(); // creating xml object
          xhr.open("POST","php/search.php", true);
          xhr.onload = ()=>{
              if (xhr.readyState === XMLHttpRequest.DONE) {
                  if (xhr.status === 200) {
                      let data = xhr.response;
                      usersList.innerHTML = data;
                    }
              }
          }
          xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded")
          xhr.send("searchTerm=" + searchTerm);
}

setInterval(()=>{
      // let's start ajax
      let xhr = new XMLHttpRequest(); // creating xml object
      xhr.open("GET","php/users.php", true);
      xhr.onload = ()=>{
          if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                  let data = xhr.response;
                  if (!searchBar.classList.contains("active")) {
                    usersList.innerHTML = data;
                  }
              }
          }
      }
      xhr.send();
}, 500); // this functon will run frequently after 500ms


