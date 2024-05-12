var slider = document.getElementById('range1');
var output = document.getElementById('value_price1');

output.innerHTML = slider.value;  
slider.oninput = function() {
	output.innerHTML = "0 - " + this.value + ".000 đ"
}

function showMenu_Category() {
    document.getElementById("drop_contentcategory").classList.toggle("show");
  }function myFunction() {
  document.getElementById("drop_contentcategory").classList.toggle("show");
}

$(document).ready(function(){
    $(".name_Category").click(function(e){
        var name = $(this).text();
        var ID = $(this).attr("name");
        // console.log(name);
        $(".drop_category").html(name);
        $(".drop_category").attr("name",ID); // them thuộc tính name
    });

});

$(document).ready(function(){
    $("#sort").click(function(e){
        
        var IDcategory = $(".drop_category").attr("name");
        if(!IDcategory){var IDcategory=$("#title_sale").attr("name");}
        // console.log(IDcategory)
        var keysearch = $(".search_name").val();
        
        // console.log(keysearch);
        
        var value_price1 = $("#value_price1").text();
        // console.log(value_price1);
        if(value_price1!="0"){
        var temp = value_price1.split("-");
        var temp1 = temp[1].split(".");
        // console.log(temp1[0]);
        var price_max = temp1[0];
        }
        else{var price_max="10000";}
        $.ajax({
            type: 'GET',
            url: "http://localhost:8008/PHP/index.php?controller=pages&action=search",
            data:{category:IDcategory,keysearch:keysearch,price_max:price_max},
            success: function(response) {
                console.log(response);
                $("#content").html(response);
                history.pushState(null, null, "http://localhost:8008/PHP/index.php?controller=pages&action=search"+"&category=" + IDcategory + "&keysearch="+keysearch+"&price_max="+price_max);
            }
            
        })

    })
})

