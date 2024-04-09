

$('.placeorder').on('click', function (e) {

    var outOfStockButtons = $('.outofstockbtn');
    var numberOfOutOfStockButtons = outOfStockButtons.length;
    let responseDiv = $("#response");
    if (numberOfOutOfStockButtons === 0) {
        const orderinfodiv = document.querySelector('.uniqueid');
        if (orderinfodiv) {
            const id = orderinfodiv.id;

            let name = $("#name").val();
            let address = $("#address").val();
            let phone = $("#phone").val();
            let msg = $("#msg").val();

            let itemlist = $("#itemlist").text();



            if (name !== "" && address !== "" && phone !== "" && itemlist !== "") {
                $.ajax({
                    type: 'post',
                    url: '../assets/inc/placeorder.php',
                    data: {
                        id,
                        name,
                        address,
                        phone,
                        msg,
                        itemlist
                    },
                    cache: false,
                    success: function (response) {
                    },
                    error: function (error) {
                        $('#response').html('<p style="color: red;">Error: ' + error.responseText + '</p>');
                    }
                });


                var idc = id + "i";
                document.cookie = "cart=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                var orderHistory = getCookie("orderhistory");

                
                if (!orderHistory) {
                    setCookie("orderhistory", idc, 10 * 365);
                } else {
                    orderHistory = orderHistory + idc;
                    document.cookie = "orderhistory=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    setCookie("orderhistory", orderHistory, 10 * 365);
                }

                var a = document.createElement("a");
                    //a.href = "../receipts/receipt("+idc.slice(-6, -1)+").pdf";
                    a.href = "../assets/inc/openReceipt.php?oid="+idc.slice(-6, -1);
                    a.target = "_blank";
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
           
                responseDiv.html("<p style='color: green;'>Order placed successfully, We will be in touch shortly.</p>");
                alert("Order placed successfully, We will be in touch shortly.");
                // Redirect to the home page
                //window.location.href = "https://example.com"; // Replace "https://example.com" with your home page URL


            }
            else if (name === "") {
                responseDiv.html("<p style='color: red;'>*Name cannot be empty.</p>");
            }
            else if (address === "") {
                responseDiv.html("<p style='color: red;'>*Address cannot be empty.</p>");
            }
            else if (phone === "") {
                responseDiv.html("<p style='color: red;'>*Phone cannot be empty.</p>");
            }
            else if (itemlist === "") {
                responseDiv.html("<p style='color: red;'>*Your Cart is empty.</p>");
            }
            else {
                responseDiv.html("<p style='color: red;'>something went wrong please try again later/p>");
            }
        }
    }
    else {
        e.preventDefault();
        responseDiv.html("<p style='color: red;'>Remove " + numberOfOutOfStockButtons + " out-of-stock items from your cart before placing your order.</p>");
        alert("Remove " + numberOfOutOfStockButtons + " out-of-stock items from your cart before placing your order.");
    }
});

function setCookie(cookieName, cookieValue, expirationYears) {
    var d = new Date();
    d.setTime(d.getTime() + (expirationYears * 365 * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
}


function getCookie(cookieName) {
    var name = cookieName + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookieArray = decodedCookie.split(';');
    for (var i = 0; i < cookieArray.length; i++) {
        var cookie = cookieArray[i];
        while (cookie.charAt(0) == ' ') {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(name) == 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }
    return null;
}