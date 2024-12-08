  var add_review = function(){
     // Access form inputs
    const firstName = document.getElementById("first_name").value;
    document.getElementById("first_name").value = "";
    const lastName = document.getElementById("last_name").value;
    document.getElementById("last_name").value = "";
    const username = document.getElementById("username").value;
    document.getElementById("username").value = "";
    const websiteURL = document.getElementById("url").value;
    document.getElementById("url").value = "";
    const reviewText = document.querySelector("textarea").value;
    document.querySelector("textarea").value = "";

    const warning = document.getElementById("warning");
    warning.innerHTML = "";

    if (firstName === "" || lastName === "" || username === "" || websiteURL === "" || reviewText === "") {
      warning.innerHTML = "Please fill in all fields";
      return;
    }

    // adding more validation
    if (firstName.length < 2) {
      warning.innerHTML = "First name must be at least 2 characters long";
      return;
    }

    if (lastName.length < 2) {
      warning.innerHTML = "Last name must be at least 2 characters long";
      return;
    }

    if (username.length < 2) {
      warning.innerHTML = "Username must be at least 2 characters long";
      return;
    }

    if (websiteURL.length < 5) {
      warning.innerHTML = "Website URL must be at least 5 characters long";
      return;
    }

    if (websiteURL.indexOf("http") === -1) {
      warning.innerHTML = "Website URL must contain 'http' or 'https'";
      return;
    }

    if (reviewText.length < 50) {
      warning.innerHTML = "Review must be at least 50 characters long";
      return;
    }

    // Log the values to verify
    console.log("First Name:", firstName);
    console.log("Last Name:", lastName);
    console.log("Username:", username);
    console.log("Website URL:", websiteURL);
    console.log("Review:", reviewText); 

    const lst = document.getElementsByTagName("ul")[0];
    const li = document.createElement("li");
    li.className = "member";
    const thumb_div = document.createElement("div");
    const thumb = document.createElement("img");
    thumb.src = "https://assets.codepen.io/39255/internal/avatars/users/default.png?height=120&width=120";
    thumb_div.appendChild(thumb);
    thumb_div.className = "thumb";

    description_div = document.createElement("div");
    description_div.className = "description";

    const name = document.createElement("h3");
    name.innerHTML = firstName + " " + lastName;

    const review = document.createElement("p");
    review.innerHTML = reviewText;

    const user_url = document.createElement("a");
    user_url.href = websiteURL;
    user_url.innerHTML = username;
    review.appendChild(user_url);

    description_div.appendChild(name);
    description_div.appendChild(review);

    li.appendChild(thumb_div);
    li.appendChild(description_div);

    lst.appendChild(li);


    
  }
  document.getElementById("addReviewButton").addEventListener("click", add_review);


  var remove_review = function(){
    const lst = document.getElementsByTagName("ul")[0];
    lst.removeChild(lst.lastChild);
  }

  document.getElementById("removeReviewButton").addEventListener("click", remove_review);
