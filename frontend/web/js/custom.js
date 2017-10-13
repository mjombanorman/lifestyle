
$(document).ready(function () {

    function testme() {
        alert('Successful test');
    }



    var showcart = function () {
        $('#load_cart').load("site/floatingcart");

    }

    showcart();

    $('.cart').click(function (event) {
        event.preventDefault();
        $.ajax(
                {
                    url: 'site/cart',
                    dataType: 'json',
                    method: 'GET',
                    data: {id: $(this).attr('data-id')},
                    success: function (data, textStatus, jqXHR) {
                        //console.log('Added to Cart');
                        $('#load_cart').load("site/floatingcart");

                    },
                    beforeSend: function (xhr) {

                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                    }
                });
    }
    );
    $('.uncart').click(function (event) {
        event.preventDefault();
        $.ajax(
                {
                    url: 'site/uncart',
                    dataType: 'json',
                    method: 'GET',
                    data: {id: $(this).attr('data-id')},
                    success: function (data, textStatus, jqXHR) {
                        //console.log('Added to Cart');
                        $('#load_cart').load("/lifestyle/frontend/web/site/floatingcart");
                        $('.cart-icon').trigger('mouseenter');
                    },
                    beforeSend: function (xhr) {

                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                    }
                });
    }
    );

    $body = $("body");

    $(document).on({
        ajaxStart: function () {
            $body.addClass("loading");
        },
        ajaxStop: function () {
            $body.removeClass("loading");
        }
    });


});