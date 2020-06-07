<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà lẻ bán</title>
    <link rel="shortcut icon" href="https://www.mitdream.com/wp-content/uploads/2019/12/house-2.png"/>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/retails.css">
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
    <section class="section-news retails" style="margin-top: 80px;">
        <h2 class="title-h2">Nhà lẻ bán</h2>
        <?php 
            include "connection.php"; 
            if ($connection->connect_error) {
                header('Location: ../app/home.php');
            }
        ?>
        <div class="container" style="border-style:ridge; border-radius:10px; background-color:rgb(231,229,255);">
            <div class="row" id="filter" style="margin: 15px 20px;">
                <div class="col span-1-of-3 cell" style="text-align:center;">
                    <h3>Giá bán</h3>
                    <div id="price-slide">
                        <input type="hidden" id="hidden_minimum_price" value="5" />
                        <input type="hidden" id="hidden_maximum_price" value="8" />
                        <p id="price_show">5 - 8 tỷ</p>
                        <div id="price_range" style="margin-top:10px;"></div>
                    </div>
                </div>
                <div class="col span-1-of-3 cell" style="text-align:center; padding-left:20px;">
                    <h3>Diện tích</h3>
                    <div id="area-slide">
                        <input type="hidden" id="hidden_minimum_area" value="60" />
                        <input type="hidden" id="hidden_maximum_area" value="130" />
                        <p id="area_show">60 - 130 m2</p>
                        <div id="area_range" style="margin-top:10px;"></div>
                    </div>
                </div>
                <div class="col span-1-of-3 cell" style="text-align:center;">
                    <h3>Phòng ngủ, WC</h3>
                    <div class="list-group-item checkbox" style="padding-top:5px;">
                        <label><input type="checkbox" class="common_selector room" value="2"> 2 PN, 2 WC</label>
                    </div>
                    <div class="list-group-item checkbox" style="padding-top:5px;">
                        <label><input type="checkbox" class="common_selector room" value="3"> 3 PN, 3 WC</label>
                    </div>
                    <div class="list-group-item checkbox" style="padding-top:5px;">
                        <label><input type="checkbox" class="common_selector room" value="4"> 4 PN, 4 WC</label>
                    </div>
                    <div class="list-group-item checkbox" style="padding-top:5px;">
                        <label><input type="checkbox" class="common_selector room" value="5"> 5 PN, 5 WC</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="web-sorting" style="text-align:right; margin:20px;">
            <select id="sorting">
                <option selected disabled>- Sắp xếp theo -</option>
                <option value="1">Giá tăng dần</option>
                <option value="2">Giá giảm dần</option>
                <option value="3">Diện tích tăng dần</option>
                <option value="4">Diện tích giảm dần</option>
            </select>
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
            url:"../app/fetch_data.php",
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
    $('.common_selector').click(function() {
        filter_data();
    });
    $('#price_range').slider({
        range: true,
        min: 5,
        max: 8,
        values: [5, 8],
        step: 0.5,
        stop:function(event, ui) {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1] + ' tỷ');
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
    $('#area_range').slider({
        range: true,
        min: 60,
        max: 130,
        values: [60, 130],
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
    
})
</script>
</html>
