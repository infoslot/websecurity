

putOrderForm.addEventListener("submit", function(event) {
  event.preventDefault();
  var orderid = document.getElementById("orderid").value;
  var amount = document.getElementById("amount").value;
  var code = document.getElementById("code").value;
  var desc = document.getElementById("desc").value;
  console.log("give order")
  $.ajax({
      url:"http://funpage.com/portal.php",  
      cache: false, 
      type: "POST", 
      crossDomain: true, 
      xhrFields: {
          withCredentials: true}, 
      dataType: "JSON",
      data: {
      orderid: orderid, 
      amount: amount,
      code: code,
      desc: desc 
      }
, 
  complete:function(response) {
      console.log(response.responseJSON);

  }
  });
})


getOrdersForm.addEventListener("submit", function(event) {
  event.preventDefault();
  var table;
  console.log("get orders")
  $.ajax({
      url:"http://funpage.com/portal.php",  
      cache: false, 
      type: "POST", 
      crossDomain: true, 
      xhrFields: {
          withCredentials: true}, 
      dataType: "JSON",
      data: {
      getorder: "true", 
       }
, 
  complete:function(response) {
      console.log(response.responseJSON);
      var json_data = response.responseJSON;
      //var obj = JSON.parse(json_data);
      $.each(json_data , function(index, item) { 
        console.log("OrderId: " + item.order_id);
        console.log("Amount" + item.amount);
        console.log("Response Description: " + item.response_desc);
        console.log("Response Code: " + item.response_code);
        var $row = "<tr><td>"+item.order_id+"</td><td> - "+item.amount+"</td><td> - "+item.response_desc+"</td><td> - "+item.response_code+"</td></tr>";
        var $row = $row + "<br/>";
        var result = document.getElementById("showOrders").insertAdjacentHTML('beforeend',$row);
    });
        
        

  }
  });
})