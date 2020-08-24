<?php
include 'config/database.php';
include_once "objects/product.php";


// get database connection
$database = new Database();
$db = $database->getConnection();

// set page title
$page_title="Products";

// page header html
include 'layout/layout_head.php';

// initialize objects
$product = new Product($db);


// to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";

// for pagination purposes
// page is the current page, if there's nothing set, default is page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// set records or rows of data per page
$records_per_page = 6;
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;


//read all products in the database
$stmt = $product->read($from_record_num, $records_per_page);

//count number of retrieved products
$num = $stmt->rowCount();

//if products retrieved are more than zeror
if($num > 0){
    //used for pagination
    $page_url = "products.php";
    $total_rows = $product->count();
    //show the products
?>    

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
    
    <div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12" style="margin:0.5%;padding:0.5%;">
                <h2>Menu</h2>
                <ul class="nav nav-tabs" id="tabs">
                    <li class="nav-item">
                        <a class="nav-link small text-uppercase active" data-target="#pizza" data-toggle="tab"
                           href="">Pizza</a>
                    </li>
                    <li class="nav-item"><a class="nav-link small text-uppercase" data-target="#wings_fries"
                                            data-toggle="tab"
                                            href="">Pasta, Salat, Wings & Fries</a></li>

                    <li class="nav-item"><a class="nav-link small text-uppercase" data-target="#zutaten"
                                            data-toggle="tab"
                                            href="">Zutaten</a></li>
                </ul>
                <br>
                <div class="tab-content" id="tabsContent">
                    <div class="tab-pane fade active show" id="pizza">
                        <div class="row">
                            <div class="col">
                                <table class="table table-hover" style="background:#ffffe6;">
                                    <thead>
                                    <tr style="color:#b32d00;">
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" style="width:15%">30cm</th>
                                        <th scope="col" style="width:15%">40cm</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>1. Napoli</td>
                                        <td><small>Tomaten, Mozzarella, Sardellen, Kapern</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/1"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/38"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                23.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>                                    
                                    </tbody>
                                </table>
                            </div>
                            <div class="col" >
                                <table class="table table-hover" style="background:#ffffe6;">
                                    <thead>
                                    <tr style="color:#b32d00;">
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" style="width:15%">30cm</th>
                                        <th scope="col" style="width:15%">40cm</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>19. Marie-Louise</td>
                                        <td><small>Frische Tomaten, Rucola, Auberginen, Grana Padano</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/19"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/56"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                23.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>20. Feta</td>
                                        <td><small>Frische Tomaten, Mozzarella, Schafkäse, Oliven</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/20"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/57"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                24.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>21. Deliziosa</td>
                                        <td><small>Riesencrevetten, Auberginen, Kapern, Zwiebeln, Rucola</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/21"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                12.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/58"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                27.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>22. Gamberoni</td>
                                        <td><small>Riesencrevetten</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/22"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                12.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/59"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                25.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>23. Sapori di Mare</td>
                                        <td><small>Meeresfrüchte mit Mischmuscheln und Riesencrevetten</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/23"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                12.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/60"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                28.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>24. Calzone</td>
                                        <td><small>Artischocken, Champignons, Rohschinken</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/24"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/61"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                25.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>25. Parmigiana</td>
                                        <td><small>Grillierte Auberginen, Rohschinken, Grana Padano</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/25"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                12.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/62"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                25.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>26. Kebab Pizza</td>
                                        <td><small>Kebab Fleisch</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/26"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                12.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/63"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                27.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>27. Marco Polo</td>
                                        <td><small>Speck, Auberginen, Knoblauch, Scharfe Salami, Chilli</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/27"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/64"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                25.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>28. Helvetia</td>
                                        <td><small>Gorgonzola, Mascarpone, Birne</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/28"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/65"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                26.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>29. Wilhelm Tell</td>
                                        <td><small>Speck, Schinken, Salami, Grana Padano</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/29"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/66"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                26.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>30. Ilangai (Ceylon)</td>
                                        <td><small>Ananas, Erbsen, Curry Powder, Poulet</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/30"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                12.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/67"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                27.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>31. YB</td>
                                        <td><small>Frische Tomaten, Ananas, Rucola, Oliven</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/31"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/68"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                25.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>32. Sophia Loren</td>
                                        <td><small>Frische Tomaten, Mozarella, Santa Lucia, Auberginen, Zucchetti</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/32"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/69"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                27.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>33. Monica Bellucci</td>
                                        <td><small>Frische Tomaten, Steinpilze, Knoblauch, Rohschinken</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/33"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/70"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                25.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>34. Al Pacino</td>
                                        <td><small>Pikante Salami, Gorgonzola</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/34"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/71"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                26.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>35. Roberto De Niro</td>
                                        <td><small>Frische Tomaten, Schafkäse, Rucola</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/35"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/72"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                26.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>36. SCB</td>
                                        <td><small>Frische Tomaten, Mascarpone, Rohschinken, Mozarella</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/36"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/73"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                25.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>37. Marlon Brando</td>
                                        <td><small>Steinpilze, Poulet, Gorgonzola, Sardellen, Knoblauch</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/37"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                9.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/74"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                27.95 <span class="badge badge-light"><i aria-hidden="true"
                                                                                                      class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="wings_fries">
                        <div class="row">
                            <div class="col">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li aria-current="page" class="breadcrumb-item active">Wings & Fries (Klein)
                                        </li>
                                    </ol>
                                </nav>
                                <table class="table table-hover" style="background:#ffffe6;">
                                    <thead>
                                    <tr style="color:#b32d00;">
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" style="width:15%">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>1. Chicken Wings (10 Stk)</td>
                                        <td><small>Klein Portion - ( 10 Stk. )</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/75"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                13.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>2. Chicken Nuggets (10 Stk)</td>
                                        <td><small>Klein Portion - ( 10 Stk. )</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/76"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                12.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>3. Farmer Fries (Klein)</td>
                                        <td><small>Klein</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/77"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                3.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    </tbody>
                                </table>

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li aria-current="page" class="breadcrumb-item active">Pasta</li>
                                    </ol>
                                </nav>

                                <table class="table table-hover" style="background:#ffffe6;">
                                    <thead>
                                    <tr style="color:#b32d00;">
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" style="width:15%">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>1. Penne</td>
                                        <td><small></small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/81"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                12.9 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>2. Spaghetti</td>
                                        <td><small></small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/82"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                12.9 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>3. Tagliatelle</td>
                                        <td><small></small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/83"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                14.9 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>4. Torteloni</td>
                                        <td><small></small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/84"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                14.9 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>5. Gnocchi</td>
                                        <td><small></small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/85"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                14.9 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                            </div>
                            <div class="col" >
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li aria-current="page" class="breadcrumb-item active">Wings & Fries (Grösse)
                                        </li>
                                    </ol>
                                </nav>
                                <table class="table table-hover" style="background:#ffffe6;">
                                    <thead>
                                    <tr style="color:#b32d00;">
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" style="width:15%">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>1. Chicken Wings (20 Stk)</td>
                                        <td><small>Grösse  Portion - ( 20 Stk. )</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/78"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                23.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>2. Chicken Nuggets (20 Stk)</td>
                                        <td><small>Grösse  Portion - ( 20 Stk. )</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/79"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                21.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>3. Farmer Fries (Grösse)</td>
                                        <td><small>Grösse</small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/80"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                8.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li aria-current="page" class="breadcrumb-item active">Salat</li>
                                    </ol>
                                </nav>
                                <table class="table table-hover" style="background:#ffffe6;">
                                    <thead>
                                    <tr style="color:#b32d00;">
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" style="width:15%">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>1. Caprese</td>
                                        <td><small></small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/86"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                6.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>2. Thon</td>
                                        <td><small></small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/87"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                6.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>3. Grüner Salat</td>
                                        <td><small></small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/88"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                4.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>4. Gemischter Salat</td>
                                        <td><small></small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/89"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                5.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>5. Tomaten Salat</td>
                                        <td><small></small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/90"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                5.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>6. Griechischer Salat</td>
                                        <td><small></small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/91"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                6.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>7. Focacciabrot</td>
                                        <td><small></small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/92"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                4.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>8. Knoblauchbrot</td>
                                        <td><small></small></td>
                                        <td style="width:15%">
                                            <button class="btn btn-success btn-sm btn-action" data-url="/show_atc/93"
                                                    style="padding:0px;margin:0px;color:white"
                                                    type="button">
                                                4.95 <span class="badge badge-light"><i
                                                    aria-hidden="true" class="fa fa-cart-arrow-down"></i></span>
                                            </button>
                                        </td>
                                    </tr>
                                    
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="zutaten">
                        <div class="row">
                            <div class="col">
                                <table class="table table-hover" style="background:#ffffe6;">
                                    <thead>
                                    <tr style="color:#b32d00;">
                                        <th scope="col">Name</th>
                                        <!--<th scope="col">Type</th>-->
                                        <th scope="col" style="width:15%">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>1. Frische Tomaten</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>2. Artischocken</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>3. Peporoni</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>4. Gorgonzola</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>5. Vorderschinken</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>6. Salami(scharf)</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>7. Speck</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>8. Thon</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>9. Kapern</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>10. Champignons</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>11. Auberginen</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>12. Pfefferschoten</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>13. Salami</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>14. Birne</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>15. Erbsen</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                            </div>

                            <div class="col">
                                <table class="table table-hover" style="background:#ffffe6;">
                                    <thead>
                                    <tr style="color:#b32d00;">
                                        <th scope="col">Name</th>
                                        <!--<th scope="col">Type</th>-->
                                        <th scope="col" style="width:15%">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>16. Eier</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>17. Ananas</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>18. Spinat</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>19. Meeresfrüchte</td>
<!--                                        <td><small>direct</small></td>-->
                                        <td style="width:15%">
                                            2.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>20. Oliven</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>21. Sardllen</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>22. Zwiebeln</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>23. Knoblauch</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>24. Rucola</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            0.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>25. Poulet</td>
<!--                                        <td><small>direct</small></td>-->
                                        <td style="width:15%">
                                            1.5
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>26. Risencrevetten</td>
<!--                                        <td><small>direct</small></td>-->
                                        <td style="width:15%">
                                            2.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>27. Crevetten</td>
<!--                                        <td><small>direct</small></td>-->
                                        <td style="width:15%">
                                            1.5
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>28. Lachs</td>
<!--                                        <td><small>direct</small></td>-->
                                        <td style="width:15%">
                                            2.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>29. Kebab Fleisch</td>
<!--                                        <td><small>direct</small></td>-->
                                        <td style="width:15%">
                                            3.0
                                        </td>
                                    </tr>
                                    
                                    <tr style="color:#b32d00;font-weight:bold;">
                                        <td>30. Grana Padano</td>
<!--                                        <td><small>beyound_3</small></td>-->
                                        <td style="width:15%">
                                            1.0
                                        </td>
                                    </tr>
                                    
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="/atc" method="get" name="atc">
                            <div class="modal-header">
                                <h5 class="modal-title"><font style="color:#999999;">Add to cart</font> <i class="fa fa-check-square" aria-hidden="true"></i></h5>
                                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button>
                            </div>
                            <div class="modal-body">
                                <!--<h5>Popover in a modal</h5>
                                <p id="myid"/>
                                <p>This <a class="btn btn-secondary popover-test"
                                           data-content="Popover body content is set in this attribute." href="#"
                                           role="button"
                                           title="Popover title">button</a> triggers
                                    a popover on click.</p>
                                <hr>
                                <h5>Tooltips in a modal</h5>
                                <p>
                                    <a class="tooltip-test" href="#" title="Tooltip">This link</a> and <a
                                        class="tooltip-test" href="#" title="Tooltip">that link</a> have tooltips on hover.
                                </p>-->
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit" id="atc">Proceed</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal - show atc response -->

            </div>
        </div>
    </div>
</div>
    
<?php 
}else{
    echo "<div class='col-md-12'>";
    echo "<div class='alert alert-danger'>No products found.</div>";
    echo "</div>";
}

// layout footer code
include 'layout/layout_foot.php';
?>
