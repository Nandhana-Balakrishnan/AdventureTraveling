<?php
include("Header.php"); 
include("../Assets/Connection/Connection.php");
if(isset($_GET["aid"]))
{
    $_SESSION["agency"]=$_GET["aid"];
}
?>

<head>
    <style>
        .pagination {
            margin: 0 auto;
            /* Set left and right margin to "auto" */
            width: 10%;
        }

        .place-padding {
    padding-top: 30px;
    padding-bottom: 70px;
}
input[type=text],[type=password],[type=email],[type=date], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #110242;
  border-radius: 10px;
  box-sizing: border-box;
}

textarea{
    padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #110242;
  border-radius: 10px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 100px;
  background-color: #110242;
  color: white;
  padding:  15px;
  margin: 4px 0;
  border: none;
  border-radius: 20px;
  cursor: pointer;
}
input[type=reset] {
  width: 20%;
  background-color: #110242;
  color: white;
  padding: 15px;
  margin: 4px 0;
  border: none;
  border-radius: 20px;
  cursor: pointer;
}
input[type=submit]:hover {
  background-color: #110242;
}
input[type=reset]:hover {
  background-color: #110242;
}
    </style>

<script src=  
"https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js">  
    </script>  
    
    <script src=  
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.js">  
    </script>  
    
    <link href=  
"http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/ui-lightness/jquery-ui.css"
        rel="stylesheet" type="text/css" />  

</head>


<main>
    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center"
            data-background="{% static 'Main/assets/img/hero/contact_hero.jpg' %}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Our Packages</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!-- Favourite Places Start -->
    <div class="favourite-place place-padding">
        <div class="container">
            <!-- Section Tittle -->

            <form action="" method="post" id="SearchPackage">
             
                <table align="center">
                    <tr>
                        <td><input type="text" name="search" id="search" placeholder="Enter destination" required="" autocomplete="off"></td>
                        <td><input type="submit" value="Search" name="btns"></td>
                    </tr>
                </table>
                <div>
                    <p></p><p></p><p></p>
                    <h1></h1>
                </div>
              
                   
               

                <?php
// Step 1: Define items per page and current page
if(isset($_POST["btns"]))
{
$itemsPerPage = 5;
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Step 2: Count total records (modify your query accordingly)
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM  tbl_package p inner join tbl_packagetype pt on pt.packagetype_id=p.packagetype_id  inner join tbl_agency a on a.agency_id=p.agency_id WHERE a.agency_id = '".$_SESSION["agency"]."' and p.package_destination='".$_POST["search"]."'";
echo $totalRecordsQuery;
$totalRecordsResult = $conn->query($totalRecordsQuery);
$totalRecordsRow = $totalRecordsResult->fetch_assoc();
$totalRecords = $totalRecordsRow['total'];

// Step 3: Calculate total pages
$totalPages = ceil($totalRecords / $itemsPerPage);

// Step 4: Modify your database query to include LIMIT and OFFSET
$offset = ($currentPage - 1) * $itemsPerPage;
$query = "select  * from tbl_package p inner join tbl_packagetype pt on pt.packagetype_id=p.packagetype_id  inner join tbl_agency a on a.agency_id=p.agency_id WHERE a.agency_id = '".$_SESSION["agency"]."' and p.package_destination='".$_POST["search"]."' LIMIT $itemsPerPage OFFSET $offset";
$data = $conn->query($query);
?>
<div class="row">
    <?php
// Step 5: Display your results
while ($row = $data->fetch_assoc()) {
    ?>
  <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-place mb-30">
                            <div class="place-img">
                                <a href="{% url 'User:viewdetails' i.id %}"><img src="{{i.package_cover.url}}" alt=""></a>
                            </div>
                            <div class="place-cap">
                                <div class="place-cap-top">
                                    
                                        <!--Star rating-->
                                        
                                    <h3><a href="{% url 'User:viewdetails' i.id %}"><?php echo $row["package_name"] ?></a></h3>
                                    <p class="dolor"><?php echo $row["package_rate"] ?> <span> For <?php echo $row["package_persons"] ?>
                                            People</span>&nbsp;&nbsp;
                                        <span><i class="fa fa-bus" aria-hidden="true"></i></span><span><a
                                                href="{% url 'User:viewagencyprofile' i.agency.id %}"
                                                style="color: black;"><?php echo $row["agency_name"] ?></a></span>
                                    </p>
                                    <span><p>Free cancellation before 10 days</p></span>
                                </div>
                                <div class="place-cap-bottom">
                                    <ul>
                                        <li><i class="far fa-clock"></i><?php echo $row["days"] ?>D <?php echo $row["nights"] ?>N
                                        </li>
                                        <li><i class="fas fa-map-marker-alt"></i><?php echo $row["package_destination"] ?></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php
}
?>
 </div>
<?php
// Step 6: Display pagination links
echo '<div class="pagination">';
if ($currentPage > 1) {
    echo '<a href="?page=1">First</a>';
    echo '<a href="?page='.($currentPage - 1).'">Previous</a>';
}
for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $currentPage) {
        echo '<span class="current">'.$i.'</span>';
    } else {
        echo '<a href="?page='.$i.'">'.$i.'</a>';
    }
}
if ($currentPage < $totalPages) {
    echo '<a href="?page='.($currentPage + 1).'">Next</a>';
    echo '<a href="?page='.$totalPages.'">Last</a>';
}
echo '</div>';
?>






<?php
}
else
{
// Step 1: Define items per page and current page
$itemsPerPage = 5;
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Step 2: Count total records (modify your query accordingly)
$totalRecordsQuery = "SELECT COUNT(*) AS total from tbl_package p inner join tbl_packagetype pt on pt.packagetype_id=p.packagetype_id  inner join tbl_agency a on a.agency_id=p.agency_id WHERE a.agency_id = '".$_SESSION["agency"]."'";
$totalRecordsResult = $conn->query($totalRecordsQuery);
$totalRecordsRow = $totalRecordsResult->fetch_assoc();
$totalRecords = $totalRecordsRow['total'];

// Step 3: Calculate total pages
$totalPages = ceil($totalRecords / $itemsPerPage);

// Step 4: Modify your database query to include LIMIT and OFFSET
$offset = ($currentPage - 1) * $itemsPerPage;
$query = "select  * from tbl_package p inner join tbl_packagetype pt on pt.packagetype_id=p.packagetype_id  inner join tbl_agency a on a.agency_id=p.agency_id WHERE a.agency_id = '".$_SESSION["agency"]."' LIMIT $itemsPerPage OFFSET $offset";
$data = $conn->query($query);
?>
<div class="row">
    <?php
// Step 5: Display your results
while ($row = $data->fetch_assoc()) {
    ?>
  <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-place mb-30">
                            <div class="place-img">
                                <a href="ViewDetails.php?pid=<?php echo $row["package_id"] ?>"><img src="../Assets/Files/Package/<?php echo $row["package_cover"]?>" alt=""></a>
                            </div>
                            <div class="place-cap">
                                <div class="place-cap-top">
                                    
                                        <!--Star rating-->
                                        
                                    <h3><a href="ViewDetails.php?pid=<?php echo $row["package_id"] ?>"><?php echo $row["package_name"] ?></a></h3>
                                    <p class="dolor"><?php echo $row["package_rate"] ?> <span> For <?php echo $row["package_persons"] ?>
                                            People</span>&nbsp;&nbsp;
                                        <span><i class="fa fa-bus" aria-hidden="true"></i></span><span><a
                                                href="{% url 'User:viewagencyprofile' i.agency.id %}"
                                                style="color: black;"><?php echo $row["agency_name"] ?></a></span>
                                    </p>
                                    <span><p>Free cancellation before 10 days</p></span>
                                </div>
                                <div class="place-cap-bottom">
                                    <ul>
                                        <li><i class="far fa-clock"></i><?php echo $row["days"] ?>D <?php echo $row["nights"] ?>N
                                        </li>
                                        <li><i class="fas fa-map-marker-alt"></i><?php echo $row["package_destination"] ?></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php
}
?>
 </div>
<?php
// Step 6: Display pagination links
echo '<div class="pagination">';
if ($currentPage > 1) {
    echo '<a href="?page=1">First</a>';
    echo '<a href="?page='.($currentPage - 1).'">Previous</a>';
}
for ($i = 1; $i <= $totalPages; $i++) {
    if ($i == $currentPage) {
        echo '<span class="current">'.$i.'</span>';
    } else {
        echo '<a href="?page='.$i.'">'.$i.'</a>';
    }
}

}
?>
            </form>
            
        </div>
    </div>
    <!-- Favourite Places End -->
</main>

<?php
include("Footer.php"); 
?>

<!-- JS here -->




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    





