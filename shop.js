const callApi = document.getElementById("callApi");
callApi.addEventListener("submit", function(event) {
    event.preventDefault();
    var order = document.getElementById("orderId").value
    $.getJSON({
      url:"http://funpage.com/api.php?order_id=" + order, 
      type: "GET", 
      xhrFields: {withCredentials: true}, 
      dataType: "JSON",
      async: false,
      complete:function (response) {
        console.log(response.responseJSON)
        var search = document.getElementById("apiResult").innerHTML = "<p>" + JSON.stringify(response.responseJSON) + "</p>"
      },
      error: function() {
        console.log('error');
    }
      });

   });


 