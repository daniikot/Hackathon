window.onload = function () {
  $("#form").submit(function (e) {
    e.preventDefault();
    var form = $(this);
    var form_data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "form.php",
      data: form_data,
      success: function (data) {

        let errorMess = document.getElementById("formArea");
        if (document.querySelector(".errorMess")) {
          let deletdouble = document.querySelector(".errorMess");
          errorMess.removeChild(deletdouble);
        }
        let result = data;
        if (data == "er1" || data == "er2" || data == "er3") {


          let divMess = document.createElement("div");
          divMess.classList.add("errorMess");
          divMess.appendChild(document.createTextNode("Неправильно указан пароль или логин"));

          errorMess.appendChild(divMess);

        }
        else {
          if (result == 1 || result==2 || result==3|| result==4) {
            window.location.href = "http://starter/accept.php";
          }

        }
      }
    });
  });
};
