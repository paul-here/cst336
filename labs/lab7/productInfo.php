<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <title> Product Information </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        <script>
            
            
        $(document).ready( function(){    
            
              $.ajax({
                    type: "GET",
                    url: "api/getProductInfo.php",
                    dataType: "json",
                    data:{"productId": <?=$_GET['productId']?>},
                    success: function(data, status) {
                         $("#productName").html(data["productName"]);
                         $("#productDescription").html(data["productDescription"]);
                         $("#productPrice").html("$"+data["productPrice"]);
                         $("#productImage").attr("src", data["productImage"]);
                    }
                });
            
        });
        
        </script>

    </head>
    <body>
        
        
        <h2 id="productName"></h2>

        <h3 id="productDescription"></h3>

        <img src="" id="productImage" alt="image of described product" width="200"/>
        
        <div id="productPrice"></div>

    </body>
</html>