<?php ?>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/typeahead.bundle.js" type="text/javascript"></script>
<script src="js/jquery.cookie.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $(".btn-action").click(function () {
        var url1 = $(this).data("url");
        $.ajax({
            dataType: "html",
            type: 'GET',
            url: url1,
            success: function(msg){
                var result = $('<div />').append(msg).find('.modal-body').html();
                $('.modal-body').html(result);
                $('#myModal').modal('show');
            }
        });
    });
});
    </script>

<script>
    $(document).on('change', '#no_of_items', function(){
        var value = $(this).val();
        var extra_price = parseFloat($('#extra_price').val());
        var unitPrice = parseFloat($('#unitPrice').text());
        var newValue = ((unitPrice + extra_price) * value ).toFixed(2);
        $('#changed_items').text(value);
        $('#changed_total').val(newValue);
    });
        </script>

<script>
        $(document).on('change', ':checkbox', function(){
            var totalprice=0.0
            var totaloptions=0
            var totalfreeoptions=0
            var value = 0
            $(':checkbox:checked').each(function(i){
                value = $(this).val()
                totaloptions = totaloptions+1
                totalprice = totalprice +  parseFloat($(this).val())
                if (value==0){
                    totalfreeoptions=totalfreeoptions+1
                    if (totalfreeoptions>2){
                        totalprice = totalprice + 1
                        totalfreeoptions = totalfreeoptions-3
                    }
                }
            });
                $('#extra_price').val(totalprice.toFixed(2));
                $('#total_options').val(totaloptions);
                $('#e_price').text(totalprice.toFixed(2));
                var no_of_items = $('#no_of_items').val();
                var unitPrice = $('#unitPrice').text();
                var newValue = (( parseFloat(unitPrice) + totalprice ) * no_of_items).toFixed(2);
                $('#changed_total').val(newValue);
                
        });
            </script>