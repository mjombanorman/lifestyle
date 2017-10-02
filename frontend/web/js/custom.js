
$(document).ready(function () {

    function testme() {
        alert('Successful test');
    }



    var showcart = function () {
        $('#load_cart').load("/lifestyle/floatingcart");

    }

    showcart();

    $('.cart').click(function (event) {
        event.preventDefault();
        $.ajax(
                {
                    url: '/lifestyle/cart',
                    dataType: 'json',
                    method: 'GET',
                    data: {id: $(this).attr('data-id')},
                    success: function (data, textStatus, jqXHR) {
                        //console.log('Added to Cart');
                        $('#load_cart').load("/lifestyle/floatingcart");

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
                    url: '/lifestyle/frontend/web/site/uncart',
                    dataType: 'json',
                    method: 'GET',
                    data: {id: $(this).attr('data-id')},
                    success: function (data, textStatus, jqXHR) {
                        //console.log('Added to Cart');
                        $('#load_cart').load("/lifestyle/frontend/web/site/floatingcart");

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