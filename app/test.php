<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/common.css">
    <!-- <link rel="stylesheet" href="../css/login.css"> -->
    <link rel="stylesheet" href="../css/grid.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
* {
    margin: 0 0;
    padding: 0 0;
}
.image-intro-item {
    /* margin-left: 10%;
    margin-right: 10%;
    width: 80%; */
    height: 50vh;
    width: 50%;
    display: inline-block;
}
.image-intro {
    margin-top: 70px;
    margin-left: 10%;
    margin-right: 10%;
    width: 80%;
    display: flex;
}

.content-detail {
    margin-top: 15px;
    margin-left: 10%;
    margin-right: 10%;
    width: 80%;
}

.title-detail {
    /* font-weight: 900px; */
    font-size: 30px;
    /* color: #2980b9 */
}

.location-detail {
    font-size: 15px;
    margin-top: 15px;
}

.price-detail {
    font-size:18px;
    color: #2980b9;
    margin-top: 25px;
    margin-bottom: 5px;
}

.body-detail, .agency-of-detail {
    font-size: 16px;
}

h4 {
    margin-top: 45px;
    margin-bottom: 15px;
}

.main-info {
    margin-top: 10px;
    margin-bottom: 10px;
}

li {
    margin-top: 5px;
    margin-bottom: 5px;
    margin-left: 50px;
}

.box-agency {
    width: 80%;
    margin-left: 10%;
    margin-right: 10%;
    height: 200px;
    background: white;
    margin-top: 80px;
    -webkit-box-shadow: 4px 4px 15px 3px rgba(99,94,94,0.77);
    -moz-box-shadow: 4px 4px 15px 3px rgba(99,94,94,0.77);
    box-shadow: 4px 4px 15px 3px rgba(99,94,94,0.77);
}

.box-title {
    padding-top: 25px;
    padding-left: 25px;
    font-size: 20px;
}

.image-agency {
    margin-left: 25px;
    margin-top: 30px;
    width: 70px;
    height: 70px;
    border-radius: 50px;
}

.agency-name {
    margin-top: 30px;
    font-size: 20px;
    color: #2b86c5;
    margin-bottom: 10px;
}

</style>
<body>
    <?php include "menu.php";?>
    <div class="image-intro">
        <img src="../image/image-retail-1.jpg" alt="detail" class="image-intro-item">
        <img src="../image/image-retail-1.jpg" alt="detail" class="image-intro-item">
    </div>
    <div class="content-detail">
        <div class="title-detail">
            <b> Chính chủ rao bán căn hoa hậu tại The Golden Palm 21 Lê Văn Lương (ngay chân cầu vượt Láng Hạ - Lê Văn Lương) </b>
        </div>  
        <div class="location-detail">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            Liễu Giai- Kim Mã -Ba Đình- Hà Nội
        </div>
        <div class="price-detail"> <b> 3,600,000,000 VND </b></div>
        <hr>
        <div class="row">
            <div class="col span-2-of-3 body-detail">
                <h4>Thông tin chính</h4><hr>
                <div class="main-info">
                    <ul>
                        <li> Diện tích: 84m2 </li>
                        <li> Số phòng ngủ: 3 </li>
                        <li> Số phòng WC: 2 </li>
                    </ul>
                </div> 
                <h4>Mô tả</h4><hr>
                <div class="main-info">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error repudiandae numquam repellat placeat blanditiis veritatis aut officiis. Sapiente architecto veniam facere nobis, vitae autem quos consequuntur in nemo sint excepturi.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem, asperiores veniam pariatur natus aliquam eligendi nulla ratione unde laborum consequuntur accusantium, eos praesentium cupiditate? Non enim quibusdam pariatur cumque laudantium.</p>
                </div> 
            </div>
            <div class="col span-1-of-3 agency-of-detail">
                <div class="box-agency">
                    <div class="box-title"><b>Liên hệ môi giới</b></div>
                    <div class="row">
                        <div class="col span-1-of-3">
                            <img src="../image/image-retail-1.jpg" alt="agency" class="image-agency">
                        </div>
                        <div class="col span-2-of-3">
                            <div class="agency-name"><b>Dương Hoàng Long</b></div>
                            <div class="agency-phone">0986542689</div>
                            <div class="agency-email">longdh@gmail.com</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>