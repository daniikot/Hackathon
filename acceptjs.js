window.onload = function () {
    // let tableFormat=document.querySelectorAll(".LinksDocs");
    // for( let i=0; i<tableFormat.length;i++){
    //     tableFormat[i].style.display="flex";
    // }
    let buttonDelete = document.querySelectorAll(".DeleteUser");
    for (let i = 0; i < buttonDelete.length; i++) {
        buttonDelete[i].addEventListener("click", function () {
            var form_data="ID="+buttonDelete[i].value+"&Comand=DeleteUser";
            $.ajax({
                type: "POST",
                url: "handler.php",
                data: form_data,
                success: function (data) {
                    if(data==1){
                        location.reload();
                    }
                    else{
                        alert("Невозможно выполнить действие, перезагрузите страницу");
                    }
                }
                })
        })
    }
    $("#form").submit(function (e) {
        e.preventDefault();
        var form_data = $(this).serialize()+"&Comand=AddUser";
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: form_data,
            success: function (data) {
                if(data==1){
                    location.reload();
                }
                else{
                    alert("Невозможно выполнить действие, перезагрузите страницу");
                }
            }
        })
    })
    let buttonChangeUser= document.querySelectorAll(".AcceptChange");
    for(let i=0; i<buttonChangeUser.length; i++){
        buttonChangeUser[i].addEventListener("click", function(){
        let select=document.querySelectorAll(".ChangeRole");
        var form_data = "ChangeRole="+select[i].value+"&Comand=ChangeUser&ID="+buttonChangeUser[i].value;
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: form_data,
            success: function (data) {
                if(data==1){
                    location.reload();
                }
                else{
                    alert("Невозможно выполнить действие, перезагрузите страницу");
                }
            }
        })
    })

    }
    $("#formProduct").submit(function (e) {
        e.preventDefault();
        var form_data = $(this).serialize()+"&Comand=AddProduct";
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: form_data,
            success: function (data) {
                if(data==1){
                    location.reload();
                }
                else{
                    alert("Невозможно выполнить действие, перезагрузите страницу");
                }
            }
        })
    })
    let buttonDeleteProduct=document.querySelectorAll(".DeleteProduct");
    for(let i=0; i<buttonDeleteProduct.length; i++){
        buttonDeleteProduct[i].addEventListener("click", function(){
            var form_data="ID="+buttonDeleteProduct[i].value+"&Comand=DeleteProduct"; 
            $.ajax({
                type: "POST",
                url: "handler.php",
                data: form_data,
                success: function (data) {
                    if(data==1){
                        location.reload();
                    }
                    else{
                        alert("Невозможно выполнить действие, перезагрузите страницу");
                    }
                }
                })
        })
    }
    let buttonPlusProduct=document.querySelectorAll(".PlusProduct");
    for(let i=0; i<buttonPlusProduct.length;i++){
        buttonPlusProduct[i].addEventListener("click", function(){
            let countProduct=document.querySelectorAll(".Plus");
            form_data="ID="+buttonPlusProduct[i].value+"&Plus="+countProduct[i].value+"&Comand=PlusProduct";
            $.ajax({
                type: "POST",
                url: "handler.php",
                data: form_data,
                success: function (data) {
                    if(data==1){
                        location.reload();
                    }
                    else{
                        alert("Невозможно выполнить действие, перезагрузите страницу");
                    }
                }
                })
        })
    }
    let buttonMinusProduct=document.querySelectorAll(".MinusProduct");
    for(let i=0; i<buttonMinusProduct.length;i++){
        buttonMinusProduct[i].addEventListener("click", function(){
            let countProduct=document.querySelectorAll(".Minus");
            form_data="ID="+buttonPlusProduct[i].value+"&Minus="+countProduct[i].value+"&Comand=MinusProduct";
            console.log(form_data);
            $.ajax({
                type: "POST",
                url: "handler.php",
                data: form_data,
                success: function (data) {
                    if(data==1){
                        location.reload();
                    }
                    else{
                        alert("Невозможно выполнить действие, перезагрузите страницу");
                    }
                }
                })
        })
    }

    let buttonAddDeal=document.querySelectorAll(".buttonDealAccept")
    for(let i=0; i<buttonAddDeal.length;i++){
        buttonAddDeal[i].addEventListener("click", function(){
            let checkedButton=document.querySelectorAll(".inCheckedProduct_"+i);
            let arrayResult=new Map();
            for(let j=0; j<checkedButton.length;j++){
                if(checkedButton[j].checked){
                    let varHelp=checkedButton[j].value;
                    let arrayHelp=varHelp.split("_");
                    arrayResult.set(arrayHelp[0], arrayHelp[1]);
                }
            }
            form_data="";
            arrayResult.forEach(function(value, key){
                form_data=form_data+key+"="+value+"&";
            })
            form_data=form_data+"ID="+buttonAddDeal[i].value+"&Comand=Reserve";
            $.ajax({
                type: "POST",
                url: "handler.php",
                data: form_data,
                success: function (data) {
                    if(data==1){
                        location.reload();
                    }
                    else{
                        alert("Невозможно выполнить действие, перезагрузите страницу");
                    }
                }
                })
        })
    }

    let buttonReturnDeal=document.querySelectorAll(".buttonDealReturn")
    for(let i=0; i<buttonReturnDeal.length;i++){
        buttonReturnDeal[i].addEventListener("click", function(){
            let checkedButton1=document.querySelectorAll(".inCheckedProductReturn_"+i);
            let arrayResult=new Map();
            for(let j=0; j<checkedButton1.length;j++){
                if(checkedButton1[j].checked){
                    let varHelp=checkedButton1[j].value;
                    let arrayHelp=varHelp.split("_");
                    arrayResult.set(arrayHelp[0], arrayHelp[1]);
                }
            }
            form_data="";
            arrayResult.forEach(function(value, key){
                form_data=form_data+key+"="+value+"&";
            })
            form_data=form_data+"ID="+buttonReturnDeal[i].value+"&Comand=Return";
            $.ajax({
                type: "POST",
                url: "handler.php",
                data: form_data,
                success: function (data) {
                    if(data==1){
                        location.reload();
                    }
                    else{
                        alert("Невозможно выполнить действие, перезагрузите страницу");
                    }
                }
                })
        })
    }

    let buttonAddOrder=document.getElementById('buttonOrderAccept');
    buttonAddOrder.addEventListener("click", function(){
        let InputProduct=document.querySelectorAll(".inCheckedOrder");
        console.log(InputProduct);
        let arrayResult=new Map();
        let form_data="";
        for(let i=0; i<InputProduct.length;i++){
            if(InputProduct[i].checked){
                let perForInput=document.querySelector(".inCheckedOrderField_"+i).value;
                let perForName=InputProduct[i].value;
                arrayResult.set(perForName, perForInput);
            }
            
        }
        arrayResult.forEach(function(value, key){
            form_data=form_data+key+"="+value+"&";
        })
        form_data=form_data+"Comand=CreateOrder";
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: form_data,
            success: function (data) {
                if(data==1){
                    location.reload();
                }
                else{
                    alert("Невозможно выполнить действие, перезагрузите страницу");
                }
            }
            })

    })
}