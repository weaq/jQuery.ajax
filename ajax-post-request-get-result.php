<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $("#submit").click(function() {
    var name = $("#name").val();
    var email = $("#email").val();
    var message = $("#message").val();

    if(name==''||email==''||message=='') {
      alert("Please fill all fields.");
      return false;
    }

    $.ajax({
      type: "POST",
      url: "submit.php",
      data: {
      name: name,
      email: email,
      message: message
      },
      cache: false,
      success: function(result) {
        $("#submit_result").html(result);
        document.getElementById('submit').style.backgroundColor='green';
        document.getElementById('submit').style.color='white';
      },
      error: function(xhr, status, error) {
      console.error(xhr);
      }
    });
  });
});
</script>
</head>
<body>

<button id="submit">Send an HTTP POST request to a page and get the result back</button>
<div id="submit_result"> </div>
</body>
</html>
