cityValue = "";
sortValue = "" ;
id = "";
$("#sort").change(function(){
    sortValue = this.value;
    if(this.value = ""){

        if(cityValue != ""){
            if(id == ""){
                ajax("query.php", "city", cityValue);
                console.log("unsorted with city without id");
            } else{
                ajax("query.php", "id", id, "city", cityValue);
                console.log("unsorted with city and id");
            }

        } else{
            if(id == ""){
                ajax("query.php")
                console.log("show unsorted without id");
            } else {
                ajax("query.php", "id", id);
                console.log("show unsorted with id");
            }
        }
    } else{
        if(cityValue != ""){
            if(id == "")
            {
                ajax("query.php", "city", cityValue, "sort", "true");
                console.log("sort with city");
            } else{
                ajax("query.php", "id", id, "city", cityValue, "sort", "true");
            }
        } else{
            if(!isNaN(id))
            {
                console.log("show sorted without value and id");
                ajax("query.php", "sort", "true");
            } else{
                ajax("query.php", "id", id, "sort", "true");
                console.log("Show sorted with id without value")
            }
        }
    }
});

$("#filter").change(function(){
    cityValue = this.value;
    if(this.value = ""){

        if(sortValue != ""){
            if(id == ""){
                ajax("query.php",  "sort", "true");
                console.log("no filter without city and id");
            } else{
                ajax("query.php", "id", id, "sort", "true");
                console.log("no filter with city and id");
            }

        } else{
            if(id == ""){
                ajax("query.php")
                console.log("no filter without sort without id");
            } else {
                ajax("query.php", "id", id);
                console.log("show unsorted with id");
            }
        }
    } else{
        if(sortValue != ""){
            if(id == "")
            {
                ajax("query.php", "city", cityValue, "sort", "true");
                console.log("sort with city");
            } else{
                ajax("query.php", "id", id, "city", cityValue, "sort", "true");
            }
        } else{
            if(id == "")
            {
                console.log("show sorted without value and id");
                ajax("query.php", "city", cityValue);
            } else{
                ajax("query.php", "id", id, "city", cityValue);
                console.log("Show sorted with id without value")
            }
        }
    }
});

function ajax(PageTo, firstParam, FirstValue, secParam, secValue){
    console.log("ajax");
    if(secParam != undefined){
        output = PageTo + "?" + firstParam + "=" + FirstValue + "&" + secParam + "=" + secValue; 
    } else if(firstParam != undefined){
        output = PageTo + "?" + firstParam + "=" + FirstValue;
    } else{
        output = PageTo;
    }
    console.log(output);
    $.ajax({url: output, success: function(result){
        $("#newest-products").html(result);
    }});
}