<?php
require_once("inc/header.php");
?>
<section id="newest-products-container" style="padding: 70px;">

<section style="display: flex; justify-content: space-between; padding: 0px 20px">
<h1>producten</h1>
<section style="width: 50%; display: flex; margin-right: 6px;">
<select name="filter" id="filter" style="width:40%">
	<option value="">Filteren</option>
	<?php
		foreach($citiesData as $row){
				$result = "<option value='";
				$result .= $row["ID"];
				$result .= "'>";
				$result .= $row["CityName"];
				$result .= "</option>";
				echo $result;
			}
			?>
</select>
<script>

</script>

<select name="sort" id="sort" style="width:40%">
	<option value="">sorteren</option>
	<option value="price">prijs</option>
</select>

<button style="width: 20%" id="clearfilters">
	Leeg filters
</button>
</section>
<script>
<?php if(isset($_GET["id"])){
	$id = $_GET["id"];
}?>
cityValue = "";
sortValue = "";

$("#sort").change(function(){
    sortValue = this.value;
    if(this.value = ""){

        if(cityValue != ""){
            if(id == undefined){
                ajax("query.php", "city", cityValue);
                console.log("unsorted with city without id");
            } else{
                ajax("query.php", "id", id, "city", cityValue);
                console.log("unsorted with city and id");
            }

        } else{
            if(id == undefined){
                ajax("query.php")
                console.log("show unsorted without id");
            } else {
                ajax("query.php", "id", id);
                console.log("show unsorted with id");
            }
        }
    } else{
        if(cityValue != ""){
            if(id == undefined)
            {
                ajax("query.php", "city", cityValue, "sort", "true");
                console.log("sort with city");
            } else{
                ajax("query.php", "id", id, "city", cityValue, "sort", "true");
            }
        } else{
            if(id == undefined)
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
            if(id == undefined){
                ajax("query.php",  "sort", "true");
                console.log("no filter without city and id");
            } else{
                ajax("query.php", "id", id, "sort", "true");
                console.log("no filter with city and id");
            }

        } else{
            if(id == undefined){
                ajax("query.php")
                console.log("no filter without sort without id");
            } else {
                ajax("query.php", "id", id);
                console.log("show unsorted with id");
            }
        }
    } else{
        if(sortValue != ""){
            if(id == undefined)
            {
                ajax("query.php", "city", cityValue, "sort", "true");
                console.log("sort with city");
            } else{
                ajax("query.php", "id", id, "city", cityValue, "sort", "true");
            }
        } else{
            if(id == undefined)
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

function ajax(PageTo, firstParam, FirstValue, secParam, secValue, thirdParam, thirdValue){
    console.log("ajax");

    if(thirdParam != undefined){
    	 output = PageTo + "?" + firstParam + "=" + FirstValue + "&" + secParam + "=" + secValue + "&" + thirdParam + "=" + thirdValue; 
    }
    else if(secParam != undefined){
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

window.onload = function(){
	id = window.location.search.substr(1).split('=')[1];
	if(id == undefined){
		ajax("query.php");
	} else {
		ajax("query.php?id=" + id);
	}

		subMenu = document.getElementById("submenu");
	loginMenu = document.getElementById("login");
	menuOn = false;
	loginOn = false;
}

$("#clearfilters").click(function(){
	if(id == undefined){
		ajax("query.php");
	} else {
		ajax("query.php?id=" + id);
	}
	$("#filter").val = "";
	$("#sort").val = "";
	sortValue = "";
	cityValue = "";
});
</script>
</section>
<section id="newest-products">




</section>

</section>
<?php
require_once("inc/footer.php");
?>