 <?php
 session_start();
 // if (isset($_POST)) var_dump($_POST);
 include_once 'dbconnect.php';
 if(isset($_POST['nume'])){
 $email = $conn->real_escape_string(trim($_POST['nume']));
 $upass = $conn->real_escape_string(trim($_POST['password']));
 $query = $conn->query("SELECT * FROM admin WHERE nume='$email'");
 $row=$query->fetch_array();
 if($row['parola']== $upass){
  
}
else {
 
}

  }
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registru</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Old Standard TT">
  <style>html { font-size: 14px; font-family: Arial, Helvetica, sans-serif; }</style>
  <title></title>
  <link rel="stylesheet" href="/proiect/kendo ui/styles/kendo.common.min.css" />
  <link rel="stylesheet" href="/proiect/kendo ui/styles/kendo.flat.min.css" />
  <script src="/proiect/kendo ui/js/jquery.min.js"></script>
  <script src="/proiect/kendo ui/js/kendo.all.min.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
  <div class="bs">
    <p class="scris">Registru</p>
    <p id="scris1">Restanţieri</p>
    <img id="img" src="imagini/logo.png" >
    <div class="meniu">
      <div id="example">
        <div class="demo-section k-content">
          <ul id="fieldlist">
            <li>
              <label for="facultate">Facultatea</label>
              <input id="facultate" style="width: 200px;" />
            </li>
            <li>
              <label for="products">Catedra</label>
              <input id="products" disabled style="width: 200px;"/>
            </li>
            <li>
              <label for="grupa">Grupa</label>
              <input id="grupa" disabled style="width: 200px;"/>
            </li>

            <li>
              <label for="siesrtu">Semestrul</label>
              <input id="simestru" disabled style="width: 200px;"/>
            </li>

            <!--            <button class="k-button k-primary" id="get">Vezi lista</button>
          </li> -->
        </ul>
      </div>
      <script>
       $(document).ready(function() {
        var facultate = $("#facultate").kendoComboBox({                        
          filter: "contains",
          placeholder: "Selectati facultatea...",
          dataTextField: "denumirea_f ",
          dataValueField: "id_facultate",
          change: function(e) {
            products.enable(facultate.value());
            if (!facultate.value()) {
              products.value("");
              orders.value("");
              grupa.value("");
              products.enable(false);
              orders.enable(false);
              grupa.enable(false);
            }
          },
          dataSource: new kendo.data.DataSource({
            transport: {
              read: {
                url: "/proiect/BD.php",
                dataType: "json",
              }
            }
          })
        }).data("kendoComboBox");
        var products = $("#products").kendoComboBox({
          filter: "contains",
          placeholder: "Selectati catedra...",
          dataTextField: "denumire_c",
          dataValueField: "id_catedra",
          change: function(e) {
            grupa.enable(products.value());
            if (!products.value()) {
              orders.value("");
              grupa.value("");
              orders.enable(false);
              grupa.enable(false);
            }
          },
          dataSource:  new kendo.data.DataSource({
            transport: {
              read: {
                url: "/proiect/catedra.php",
                dataType: "json",
              }
            }
          })
        }).data("kendoComboBox");
        var grupa = $("#grupa").kendoComboBox({

          filter: "contains",
          placeholder: "Selectati grupa...",
          dataTextField: "grupa",
          dataValueField: "id_grupa",
          change: function(e) {
            orders.enable(products.value());
            if (!grupa.value()) {
              orders.value("");
              orders.enable(false);
            }
          },
          dataSource:new kendo.data.DataSource({
            transport: {
              read: {
                url: "/proiect/grupa.php",
                dataType: "json",
              }
            }
          })
        }).data("kendoComboBox");
        var orders = $("#simestru").kendoComboBox({
          filter: "contains",
          placeholder: "Selectati simestrul...",
          dataTextField: "nr_simestru",
          dataValueField: "id_simestru",
          dataSource: new kendo.data.DataSource({
            transport: {
              read: {
                url: "/proiect/simestru.php",
                dataType: "json",
              }
            }
          })
        }).data("kendoComboBox");

      });
    </script>
  </div>
</div>
</div>
<div class="chenar">
 <div id="navthing">

  <form  method="post">
    <h2><a href="#" id="loginform">Login</a> </h2>
    <div class="login">
      <div class="arrow-up"></div>
      <div class="formholder">
        <div class="randompad">

         <fieldset>
           <label >Nume</label>
           <input name="nume" type="text" placeholder="| Nume" required />
           <label >Parola</label>
           <input name="password" type="password" placeholder="| Parola" required />
           <button type="submit" id="loginform" name="log" >Logare</button>
         </fieldset>
       </div>
     </div>
   </div>
 </form>






</div>
</div>
<script src="js/index.js"></script>
</body>
</html>