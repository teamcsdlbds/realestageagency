<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà lẻ cho thuê</title>
    <link rel="shortcut icon" href="https://www.mitdream.com/wp-content/uploads/2019/12/house-2.png"/>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/hired.css">
    <link rel="stylesheet" href="../css/grid.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <script src="../js/jquery-1.10.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.min.css">
</head>
<body>
    <?php include "menu.php";?>
    <section class="section-news hired" style="margin-top: 80px;">
        <h2 class="title-h2">Nhà lẻ cho thuê</h2>
        <?php 
            include "connection.php"; 
            if ($connection->connect_error) {
                header('Location: ../app/home.php');
            }
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <div class="col span-1-of-6 cell" style="border-style: solid; border-radius: 5px; border-width: thin;">
                        <div id="box-price">
                            <div class="main-price" style="margin: 5px;"><span id="amount">Khoảng giá</span><i class="fa fa-caret-down" style="float: right; margin-right: 5px;"></i></div>
                        </div>
                    </div>
                    
                    <div class="col span-1-of-6 cell" style="border-style: solid; border-radius: 5px; border-width: thin;">
                        <div id="box-area">
                            <div class="main-area" style="margin: 5px;"><span id="amount" style="margin: 5px;">Diện tích</span><i class="fa fa-caret-down" style="float: right;margin-right: 5px;"></i></div>
                        </div>
                    </div>

                    <div class="col span-1-of-6 cell" style="border-style: solid; border-radius: 5px; border-width: thin;">
                        <div id="box-room">
                            <div class="main-room" style="margin: 5px;"><span id="amount" style="margin: 5px;">Số phòng ngủ</span><i class="fa fa-caret-down" style="float: right; margin-right: 5px;"></i></div>
                        </div>
                    </div>
                </div>
                <div class="web-sorting" style="text-align: right; margin: 20px;">
                    <select id="sorting">
                        <option value="">- Sắp xếp theo -</option>
                        <option value="1">Giá tăng dần</option>
                        <option value="2">Giá giảm dần</option>
                        <option value="3">Diện tích tăng dần</option>
                        <option value="4">Diện tích giảm dần</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col span-1-of-6 cell" style="padding-left: 5px;">
                <div class="box-price-range" style="display: none;">
                    <h3>Giá thuê</h3>
                    <div id="price-slide">
                        <input type="hidden" id="hidden_minimum_price" value="5" />
                        <input type="hidden" id="hidden_maximum_price" value="40" />
                        <p id="price_show">5 - 40 triệu/tháng</p>
                        <div id="price_range" style="margin-top: 10px;"></div>
                    </div>
                </div>
            </div>
            <div class="col span-1-of-6 cell" style="padding-left: 11px;">
                <div class="box-area-range" style="display: none;">
                    <h3>Diện tích</h3>
                    <div id="area-slide">
                        <input type="hidden" id="hidden_minimum_area" value="65" />
                        <input type="hidden" id="hidden_maximum_area" value="150" />
                        <p id="area_show">65 - 150 m2</p>
                        <div id="area_range" style="margin-top: 10px;"></div>
                    </div>
                </div>
            </div>
            <div class="col span-1-of-6 cell" style="padding-left: 10px;">
                <div class="box-room-check" style="display: none;">
                    <h3>Phòng ngủ</h3>
                    <div class="list-group-item checkbox" style="padding-top: 5px;">
                        <label><input type="checkbox" class="common_selector room" value="3"> 3</label>
                    </div>
                    <div class="list-group-item checkbox" style="padding-top: 5px;">
                        <label><input type="checkbox" class="common_selector room" value="4"> 4</label>
                    </div>
                    <div class="list-group-item checkbox" style="padding-top: 5px;">
                        <label><input type="checkbox" class="common_selector room" value="5"> 5</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row filter_data"></div>
    </section>
    <?php include "footer.php";?>
</body>
<script>
$(document).ready(function() {
    filter_data();
    function filter_data() {
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var minimum_area = $('#hidden_minimum_area').val();
        var maximum_area = $('#hidden_maximum_area').val();
        var room = get_filter('room');

        var option = $('#sorting option:selected');
        var price_asc;
        var price_desc;
        var area_asc;
        var area_desc;
        if(option.val() == "1") price_asc = option.val();
        else if(option.val() == "2") price_desc = option.val();
        else if(option.val() == "3") area_asc = option.val();
        else if(option.val() == "4") area_desc = option.val();

        $.ajax({
            url:"../app/fetch_data_1.php",
            method:"POST",
            data: {
                action:action, 
                minimum_price:minimum_price, 
                maximum_price:maximum_price, 
                minimum_area:minimum_area, 
                maximum_area:maximum_area, 
                room:room,
                
                price_asc:price_asc,
                price_desc:price_desc,
                area_asc:area_asc,
                area_desc:area_desc
            },
            success:function(data) {
                $('.filter_data').html(data);
            }
        });
    }
    function get_filter(class_name){
        var filter = [];
        $('.'+class_name+':checked').each(function() {
            filter.push($(this).val());
        });
        return filter;
    }
    $('.main-price').click(function() {
        $('.box-price-range').slideToggle();
    });
    $('.main-area').click(function() {
        $('.box-area-range').slideToggle();
    });
    $('.main-room').click(function() {
        $('.box-room-check').slideToggle();
    });
    $('.common_selector').click(function() {
        filter_data();
    });
    $('#price_range').slider({
        range: true,
        min: 5,
        max: 40,
        values: [5, 40],
        step: 5,
        stop:function(event, ui) {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1] + ' triệu/tháng');
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
    $('#area_range').slider({
        range: true,
        min: 65,
        max: 150,
        values: [65, 150],
        step: 10,
        stop:function(event, ui) {
            $('#area_show').html(ui.values[0] + ' - ' + ui.values[1] + ' m2');
            $('#hidden_minimum_area').val(ui.values[0]);
            $('#hidden_maximum_area').val(ui.values[1]);
            filter_data();
        }
    });
    
    $('#sorting').change(function() {
        filter_data();
    });
    
});
</script>
</html>
