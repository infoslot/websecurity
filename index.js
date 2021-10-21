//index.js



const contactFormInfo = document.getElementById("contactFormInfo");
const loginForm = document.getElementById("loginForm");
const searchFormInf0 = document.getElementById("searchFormInfo");
const vulnerabilities = document.getElementsByClassName("vulnerabilities");
const searchForm = document.getElementById("searchForm");
const getSecretContent = document.getElementById("getSecretContent");

for (x=0; x<vulnerabilities.length; x++) {
    const item = vulnerabilities[x];
    item.addEventListener("mouseenter", function(event) {
        event.target.style = "background-color: #c6c6c6;"
    })
    item.addEventListener("mouseleave", function(event) {
        event.target.style = "";
    })

}
searchForm.addEventListener("submit", function(event) {
    event.preventDefault();
    var search = document.getElementById("search");
    const searchResult  = document.getElementById("searchResult").innerHTML = "<p> You were searching for :" + search.value
})


searchFormAPI.addEventListener("submit", function(event) {
    event.preventDefault();
    var search = document.getElementById("searchAPI").value;

    $.ajax({
        url:"http://funpage.com/searchAPI.php",  
        cache: false, 
        type: "POST", 
        crossDomain: true, 
        xhrFields: {
            withCredentials: true}, 
        dataType: "JSON",
        data: {
        searchAPI: search, 
        }
, 
    complete:function(response) {
        console.log(response.responseJSON);
        var search = response.responseJSON;
        const searchResult  = document.getElementById("searchResultAPI").innerHTML = "<p> You were searching for :" + search
    }
});
})





loginForm.addEventListener("submit", function(event) {
    event.preventDefault();
    var password = document.getElementById("password").value;
    var username = document.getElementById("username").value;
    console.log("logging in")
    $.ajax({
        url:"http://funpage.com/login.php",  
        cache: false, 
        type: "POST", 
        crossDomain: true, 
        xhrFields: {
            withCredentials: true}, 
        dataType: "JSON",
        data: {
        username: username, 
        password: password 
        }
, 
    complete:function(response) {
        console.log(response.responseJSON);
        var userEmail=getCookie("PHPSESSID");
        console.log(userEmail);

    }
    });
})

logoutForm.addEventListener("submit", function(event) {
    event.preventDefault();
    console.log("logging out")
    $.ajax({
        url: "http://funpage.com/logout.php", 
        type: "POST", 
        cache: false, 
        crossDomain: true, 
        dataType: "JSON",
        xhrFields: {
            withCredentials: true},
        complete:function(response) { 
            console.log("response");
         }
    });
})
getSecretContent.addEventListener("submit", function(event) {
    event.preventDefault();
    console.log("getSecretContent");
    $.ajax({
        url:"http://funpage.com/content.php", 
        xhrFields: { 
            withCredentials: true }, 
        contentType: "application/json; charset=utf-8",
        dataType: "JSON",
        cache: false,
        xhrFields: {
            withCredentials: true},
        type : "POST", 
        complete:function (response) {
        console.log(response);
        var result = document.getElementById("showResult").innerHTML = response.responseJSON
        }
})  
    });
function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }