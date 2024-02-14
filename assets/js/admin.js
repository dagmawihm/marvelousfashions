function stock(id, status) {
    let stockbtncont = $("#stockbtncont");
    let adminbtns = $("#adminbtns");


    if (status === "outofstock") {
        let outOfStockMsg = document.getElementById("outofstockmsg");
        let displayStyle = window.getComputedStyle(outOfStockMsg).getPropertyValue("display");
        let remark = $("#msg").val();

        if (displayStyle === "none") {
            outOfStockMsg.style.display = "flex";
        } else {
            $.ajax({
                type: 'post',
                url: '../assets/inc/toggleStockStatus.php',
                data: {
                    id,
                    availability: status,
                    remark
                },
                cache: false,
                success: function (response) {
                }
            });
            let instock = 'instock';

            outOfStockMsg.style.display = "none";
            $('[id=addtocart]').remove();
            stockbtncont.html('<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" id="addtocart" style="background-color: red;" disabled>Out of stock</button>');
            $('[id=outofstock]').remove();
            adminbtns.prepend('<button class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-r-25 p-tb-2 m-r-8 tooltip100 instock" onclick="stock(' + id + ', ' + instock + ')" id="instock" title="In Stock" data-tooltip="In Stock"><i class="fa-solid fa-check fa-4x"></i></button>');
            window.location.reload(true);


        }
    }
    else {
        $.ajax({
            type: 'post',
            url: '../assets/inc/toggleStockStatus.php',
            data: {
                id,
                availability: status,
                remark: ""
            },
            cache: false,
            success: function (response) {
                let outofstock = 'outofstock';
                $('[id=addtocart]').remove();
                stockbtncont.html('<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" onclick="addtocart(' + response + ', ' + id + ')" id="addtocart">Add to cart</button>')
                $('[id=instock]').remove();
                adminbtns.prepend('<button class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-r-25 p-tb-2 m-r-8 tooltip100 outofstock" onclick="stock(' + id + ', ' + outofstock + ')" id="outofstock" title="Out of Stock" data-tooltip="Out of Stock"><i class="fa-brands fa-x fa-4x"></i></button>');
                window.location.reload(true);

            }
        });
        

    }






    return false;
}








function showconfirmation(){
    let confirmation = document.getElementById("confirmation");
    let displayStyle = window.getComputedStyle(confirmation).getPropertyValue("display");

    if (displayStyle === "none") {
        confirmation.style.display = "block";
    }else{
        confirmation.style.display = "none";
    }

}

function deletep(id){

    $.ajax({
        type: 'post',
        url: '../assets/inc/deleteP.php',
        data: {
            id,
        },
        cache: false,
        success: function (response) {
        }
    });

    window.location.href = '../?nocache=' + new Date().getTime();

}

function deletemsg(id){
    $.ajax({
        type: 'post',
        url: '../assets/inc/deletemsg.php',
        data: {
            id,
        },
        cache: false,
        success: function (response) {
        }
    });
    $('[id='+id+']').remove();
}



function deleteimg(filename){
    $.ajax({
        type: 'post',
        url: '../assets/inc/deleteimg.php',
        data: {
            filename,
        },
        cache: false,
        success: function (response) {
        }
    });
    let id = filename.replace(/\./g, '');
    $('#' + id).remove();
}


function editorder(id){
    $.ajax({
        type: 'post',
        url: '../assets/inc/editorder.php',
        data: {
            id,
        },
        cache: false,
        success: function (response) {
        }
    });
    $('[id='+id+']').remove();
}


function removeorder(id){
    $.ajax({
        type: 'post',
        url: '../assets/inc/removeorder.php',
        data: {
            id,
        },
        cache: false,
        success: function (response) {
        }
    });
    $('[id='+id+']').remove();
}



