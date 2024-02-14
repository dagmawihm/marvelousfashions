function wishaddi(id, isindex) {
    if (isindex == "t") {
        var dir = 'assets/inc/addremovewishlist.php';
    }
    else {
        var dir = '../assets/inc/addremovewishlist.php';
    }


    $.ajax({
        type: 'post',
        url: dir,
        data: {
            id: id
        },
        cache: false,
        success: function (response) {
        }
    });

    cartno++;

    $('.js-addwish-b2').each(function () {
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function () {
            swal(nameProduct, "is added to wishlist !", "success");

            //$(this).addClass('js-addedwish-b2');
            //$(this).off('click');
            $('[id=wishno]').remove();
            $('[id=wish' + id + ']').remove();

            if (isindex == "t") {
                document.getElementById("wishcont" + id).innerHTML = '<div class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 js-addedwish-b2" id="wishremove' + id + '"><i class="zmdi zmdi-favorite zmdi-hc-lg"onclick="wishremovei(' + id + ', \'t\')"></i></div>';
                document.getElementById("wishdiv").innerHTML = '<div onclick="showHeaderCart()" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="wishno" data-notify="' + cartno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';
                document.getElementById("wishdiv2").innerHTML = '<div onclick="showHeaderCart()" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" id="wishno" data-notify="' + cartno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';
            }
            else {
                document.getElementById("wishcont" + id).innerHTML = '<div class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 js-addedwish-b2" id="wishremove' + id + '"><i class="zmdi zmdi-favorite zmdi-hc-lg"onclick="wishremovei(' + id + ', \'f\')"></i></div>';
                document.getElementById("wishdiv").innerHTML = '<div onclick="showHeaderCart()" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="wishno" data-notify="' + cartno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';
                document.getElementById("wishdiv2").innerHTML = '<div onclick="showHeaderCart()" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" id="wishno" data-notify="' + cartno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';
            }

        });
    });
    return false;


}

function wishremovei(id, isindex) {
    if (isindex == "t") {
        var dir = 'assets/inc/addremovewishlist.php';
    }
    else {
        var dir = '../assets/inc/addremovewishlist.php';
    }
    var remove = "true";
    $.ajax({
        type: 'post',
        url: dir,
        data: {
            id: id,
            remove: remove
        },
        cache: false,
        success: function (response) {
        }
    });
    cartno--;

    $('.js-addwish-b2').each(function () {
        var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
        $(this).on('click', function () {
            swal(nameProduct, "is removed from your wishlist !", "success");

            //$(this).addClass('js-addedwish-b2');
            //$(this).off('click');

            $('[id=wishno]').remove();
            $('[id=wishremove' + id + ']').remove();

            if (isindex == "t") {
                document.getElementById("wishdiv").innerHTML = '<div onclick="showHeaderCart()" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="wishno" data-notify="' + cartno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';
                document.getElementById("wishdiv2").innerHTML = '<div onclick="showHeaderCart()" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" id="wishno" data-notify="' + cartno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';
                document.getElementById("wishcont" + id).innerHTML = '<div class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" id="wish' + id + '"><i class="zmdi zmdi-favorite-outline zmdi-hc-lg" onclick="wishaddi(' + id + ', \'t\')"></i></div>';
            }
            else {
                document.getElementById("wishdiv").innerHTML = '<div onclick="showHeaderCart()" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="wishno" data-notify="' + cartno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';
                document.getElementById("wishdiv2").innerHTML = '<div onclick="showHeaderCart()" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" id="wishno" data-notify="' + cartno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';
                document.getElementById("wishcont" + id).innerHTML = '<div class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" id="wish' + id + '"><i class="zmdi zmdi-favorite-outline zmdi-hc-lg" onclick="wishaddi(' + id + ', \'f\')"></i></div>';
            }

        });
    });

    return false;
}
/*---------------------------------------------*//*---------------------------------------------*/

function wishadd(id, wishno) {

    $.ajax({
        type: 'post',
        url: '../assets/inc/addremovewishlist.php',
        data: {
            id: id
        },
        cache: false,
        success: function (response) {
        }
    });

    $('.js-addwish-detail').each(function () {
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

        $(this).on('click', function () {
            swal(nameProduct, "is added to your wishlist !", "success");

            //$(this).addClass('js-addedwish-detail');
            //$(this).off('click');
            $('[id=wishno]').remove();
            $('[id=wish]').remove();

            wishno++;

            document.getElementById("wishdiv").innerHTML = '<div onclick="showHeaderCart()" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="wishno" data-notify="' + wishno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';
            document.getElementById("wishdiv2").innerHTML = '<div onclick="showHeaderCart()" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" id="wishno" data-notify="' + wishno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';
            document.getElementById("wishcont").innerHTML = '<a class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-removewish tooltip100" id="wishremove" data-tooltip="Remove from Wishlist"><i class="zmdi zmdi-favorite zmdi-hc-lg" onclick="wishremove(' + id + ', ' + wishno + ')"></i></a>';
        });
    });
    return false;
}



function wishremove(id, wishno) {

    var remove = "true";
    $.ajax({
        type: 'post',
        url: '../assets/inc/addremovewishlist.php',
        data: {
            id: id,
            remove: remove
        },
        cache: false,
        success: function (response) {
        }
    });

    $('.js-removewish').each(function () {
        var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();
        $(this).on('click', function () {
            swal(nameProduct, "is removed from your wishlist !", "success");

            $('[id=wishno]').remove();
            $('[id=wishremove]').remove();
            wishno--;

            document.getElementById("wishdiv").innerHTML = '<div onclick="showHeaderCart()" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="wishno" data-notify="' + wishno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';
            document.getElementById("wishdiv2").innerHTML = '<div onclick="showHeaderCart()" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" id="wishno" data-notify="' + wishno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';
            document.getElementById("wishcont").innerHTML = '<a class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" id="wish" data-tooltip="Add to Wishlist"><i class="zmdi zmdi-favorite-outline zmdi-hc-lg" onclick="wishadd(' + id + ', ' + wishno + ')"></i></a>';
        });
    });
    return false;
}



function dwishremove(id, wishno, isindex) {

    if (isindex == "t") {
        var dir = 'assets/inc/addremovewishlist.php';
    }
    else {
        var dir = '../assets/inc/addremovewishlist.php';
    }

    var remove = "true";
    $.ajax({
        type: 'post',
        url: dir,
        data: {
            id: id,
            remove: remove
        },
        cache: false,
        success: function (response) {
        }
    });



    $('[id=litoremove' + id + ']').remove();
    wishno--;

    document.getElementById("wishdiv").innerHTML = '<div onclick="showHeaderCart()" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" id="wishno" data-notify="' + wishno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';
    document.getElementById("wishdiv2").innerHTML = '<div onclick="showHeaderCart()" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" id="wishno" data-notify="' + wishno + '"><i class="zmdi zmdi-favorite-outline"></i></div>';

    return false;
}



/*---------------------------------------------*/

function qaddtocart(cartno, id, isindex) {

    if (isindex == 1) {
        var url = 'assets/inc/addremovecartitem.php';
        var cart = 'cart/';
        var addonbtn = 1;
    }
    else {
        var url = '../assets/inc/addremovecartitem.php';
        var cart = '../cart/'
        var addonbtn = "";
    }

    var size = document.getElementById("sizeSelect").value;
    //var id = "<?php echo $id; ?>";
    if (size) {
        $.ajax({
            type: 'post',
            url: url,
            data: {
                size: size,
                id: id
            },
            cache: false,
            success: function (response) {

            }
        });

        $('.js-addcart-detail').each(function () {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            //$(this).on('click', function() {
            swal(nameProduct, "is added to cart !", "success");
            //});
        });

        $('[id=cartno]').remove();



        cartno++;
        document.getElementById("cartdiv").innerHTML = '<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" id="cartno" data-notify="' + cartno + '"><a href="' + cart + '" style="color: black;" ><i class="zmdi zmdi-shopping-cart"></i></a></div>';
        document.getElementById("cartdiv2").innerHTML = '<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" id="cartno" data-notify="' + cartno + '"><a href="' + cart + '" style="color: black;" ><i class="zmdi zmdi-shopping-cart"></i></a></div>';
        document.getElementById("qaddtocart").setAttribute('onclick', 'qaddtocart(' + cartno + ', ' + id + ', ' + addonbtn + ')');

    } else {
        alert('please select size');

    }
    return false;
}






function addtocart(cartno, id) {
    var size = document.getElementById("size").value;
    //var id = "<?php echo $id; ?>";
    if (size) {
        $.ajax({
            type: 'post',
            url: '../assets/inc/addremovecartitem.php',
            data: {
                size: size,
                id: id
            },
            cache: false,
            success: function (response) {

            }
        });

        $('.js-addcart-detail').each(function () {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            //$(this).on('click', function() {
            swal(nameProduct, "is added to cart !", "success");
            //});
        });

        $('[id=cartno]').remove();



        cartno++;
        document.getElementById("cartdiv").innerHTML = '<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" id="cartno" data-notify="' + cartno + '"><a href="../cart/" style="color: black;" ><i class="zmdi zmdi-shopping-cart"></i></a></div>';
        document.getElementById("cartdiv2").innerHTML = '<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" id="cartno" data-notify="' + cartno + '"><a href="../cart/" style="color: black;" ><i class="zmdi zmdi-shopping-cart"></i></a></div>';
        document.getElementById("addtocart").setAttribute('onclick', 'addtocart(' + cartno + ', ' + id + ')');

    } else {
        alert('please select size');

    }
    return false;
}


function removefromcart(price, id, size, title, sizei) {

    var remove = "true";
    $.ajax({
        type: 'post',
        url: '../assets/inc/addremovecartitem.php',
        data: {
            id: id,
            size: size,
            remove: remove
        },
        cache: false,
        success: function (response) {
        }
    });


    let itemlist = JSON.parse($("#itemlist").text());




    if (sizei >= 0 && sizei < itemlist.length) {
        itemlist.splice(sizei, 1);
        itemlist.splice(sizei, 1);
      }

      $("#itemlist").text(JSON.stringify(itemlist))




    $('.js-removewish').each(function () {
        var nameProduct = title;
        $(this).on('click', function () {
            swal(nameProduct, "is removed from your Cart", "success");
        });
    });

    let subtotal = document.getElementById("subtotal").textContent;
    let total = document.getElementById("total").textContent;

    subtotal = subtotal - price;
    total = total - price;
    document.getElementById("subtotal").textContent = subtotal;
    document.getElementById("total").textContent = total;



    let cartno = document.getElementById('cartno');
    let cartnoval = cartno.getAttribute('data-notify');
    cartnoval--;

    $(`[id=${id}]:first`).remove();
    $('[id=cartno]').remove();
    document.getElementById("cartdiv").innerHTML = '<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" id="cartno" data-notify="' + cartnoval + '"><a href="../cart/" style="color: black;" ><i class="zmdi zmdi-shopping-cart"></i></a></div>';
    document.getElementById("cartdiv2").innerHTML = '<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" id="cartno" data-notify="' + cartnoval + '"><a href="../cart/" style="color: black;" ><i class="zmdi zmdi-shopping-cart"></i></a></div>';
    
    location.reload(true);
    return false;
}




function removefromcartphp(id, size) {

    var remove = "true";
    $.ajax({
        type: 'post',
        url: '../assets/inc/addremovecartitem.php',
        data: {
            id: id,
            size: size,
            remove: remove
        },
        cache: false,
        success: function (response) {
        }
    });







    let cartno = document.getElementById('cartno');
    let cartnoval = cartno.getAttribute('data-notify');
    cartnoval--;

    $(`[id=${id}]:first`).remove();
    $('[id=cartno]').remove();
    document.getElementById("cartdiv").innerHTML = '<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" id="cartno" data-notify="' + cartnoval + '"><a href="../cart/" style="color: black;" ><i class="zmdi zmdi-shopping-cart"></i></a></div>';
    document.getElementById("cartdiv2").innerHTML = '<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" id="cartno" data-notify="' + cartnoval + '"><a href="../cart/" style="color: black;" ><i class="zmdi zmdi-shopping-cart"></i></a></div>';

    return false;
}

function showHeaderCart() {
    window.location.reload(true);
}






