<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        /* Custom CSS Styles */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .package-info {
            text-align: center;
            margin-bottom: 30px;
        }

        .package-image {
            width: 100%;
            height: auto;
            max-height: 390px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .package-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .agency-name {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .package-details {
            margin-bottom: 10px;
            text-align: justify !important;
            font-size: medium;
        }

        .package-price {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .select-button,
        .chat-button {
            margin-top: 10px;
        }

        .navbar {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .navbar-nav .nav-item {
            margin-right: 10px;
        }

        .hotel-list,
        .meal-list,
        .bus-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 30px;
        }

        .list-item {
            text-align: left;
        }



        .day-highlights {
            margin: 10px 50px;
        }

        .review-table {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
        }

        .review-table th,
        .review-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .review-table th {
            background-color: #f8f9fa;
            font-weight: bold;
            text-align: left;
        }

        .action-btn {
            margin: 1rem 0;
            display: flex;
            flex-direction: column;

        }

        .review-list{
            margin: 10px 50px;
        }
        button{
            background-color: green;
            color: white;
            
        }
    </style>
</head>
<?php
include("Header.php");

include("../Assets/Connection/Connection.php") ;
$sel="select * from tbl_package p inner join tbl_agency a on a.agency_id=p.agency_id where p.package_id='".$_GET["pid"]."' ";
$data=$conn->query($sel);
$row=$data->fetch_assoc();
?>
<br><br><br><br><br>
<body>
    <div class="container">
        <div class="package-info">
         
            <div class="row">
                <div class="col-6">
                    <img src="../Assets/Files/Package/<?php echo $row["package_cover"]?>" alt="Package Image" class="package-image">
                    <br><br><br>
                    <h3 class="package-price">Rs.<?php echo $row["package_rate"]?>  (Free cancellation before 10 days of booking)</h3>
                    <div class="button-group">
                        <br>
                        <a href="PackageBooking.php?pid=<?php echo $row["package_id"]?>" class="btn btn-primary select-button">SELECT</a>
                        <a href="{% url 'User:Chat-user' PACK.agency.id %}" class="btn btn-primary chat-button">Chat Now</a>
                    </div>
                </div>
                <div class="col-6">
                    <h2 class="package-name"><?php echo $row["package_name"]?></h2>
                    <p class="agency-name"><a
                            href="{% url 'User:viewagencyprofile' PACK.agency.id %}" style="color: blue;"><?php echo $row["agency_name"]?></a></p>
                    <p class="package-details"><?php echo $row["package_details"]?></p>
                    <p class="package-details"><b>Locations</b><?php echo $row["package_destination"]?></p>
                    <p class="package-details"><b>Number of Days</b><?php echo $row["days"]?> Days and<?php echo $row["nights"]?> Nights</p>
                    
                        
                        
                        
                        
                        <a href="#review-list" style="color: rgb(15, 6, 107);"><button>View Highlights</button></a>
                        <a href="#review-list" style="color: rgb(15, 6, 107);"><button>View Reviews</button></a>
                    </div>
                </div>

            </div>
            <div class="row action-btn" id="day-highlights">
                
               
            </div>
        </div>
    </div>

    
    <div class="day-highlights" id="review-list">
        <h2>Day Highlights</h2>
        <table class="table">
         <?php 
            $selhighlight="select * from tbl_highlights where package_id='".$_GET["pid"]."'";
            $datahigh=$conn->query($selhighlight);
            while($rowhigh=$datahigh->fetch_assoc())
            {
         ?>
            <tr>
                <td>Day: <?php echo $rowhigh["highlight_day"]?></td>
                <td><img src="../Assets/Files/Package/<?php echo $row["package_cover"]?>" alt="Day Image" height="200px" width="400px"></td>
                <td>
                    <p> <?php echo $rowhigh["highlight_details"]?></p>
                </td>
            </tr>
           <?php 
            }
           ?>
        </table>
    </div>
    
    <div class="review-list">
        <h2>Reviews</h2>
        <table class="review-table">
            <tr>
                <th>User Name</th>
                <th>Review</th>
                
            </tr>
            {% for i in RV %}
            <tr>
                <td>{{i.user_name}}</td>
                <td>{{i.user_review}}</td>
               
            </tr>
            {% endfor %}
        </table>
    </div>
    
    </div>
</body>

</html>
<?php
include("Footer.php"); 
?>
