 <?php
 $masc = false;
 session_start();
 // if (isset($_POST)) var_dump($_POST);
 include_once 'dbconnect.php';
 if(isset($_POST['nume'])){
   $email = $conn->real_escape_string(trim($_POST['nume']));
   $upass = $conn->real_escape_string(trim($_POST['password']));
   $query = $conn->query("SELECT * FROM admin WHERE nume='$email'");
   $row=$query->fetch_array();
   if($row['parola']== $upass){
      $masc = true;
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
    <link rel="stylesheet" href="/kendo ui/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="/kendo ui/styles/kendo.flat.min.css" />
    <script src="/kendo ui/js/jquery.min.js"></script>
    <script src="/kendo ui/js/kendo.all.min.js"></script>
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
        dataTextField: "nume ",
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
              url: "/BD.php",
              dataType: "json",
          }
      }
  })
    }).data("kendoComboBox");
    var products = $("#products").kendoComboBox({
        filter: "contains",
        placeholder: "Selectati catedra...",
        dataTextField: "nume_c",
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
              url: "/catedra.php",
              dataType: "json",
          }
      }
  })
    }).data("kendoComboBox");
    var grupa = $("#grupa").kendoComboBox({

        filter: "contains",
        placeholder: "Selectati grupa...",
        dataTextField: "nume_g",
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
              url: "/grupa.php",
              dataType: "json",
          }
      }
  })
    }).data("kendoComboBox");
    var orders = $("#simestru").kendoComboBox({
        filter: "contains",
        placeholder: "Selectati simestrul...",
        dataTextField: "nr",
        dataValueField: "id_simestru",
        dataSource: new kendo.data.DataSource({
          transport: {
            read: {
              url: "/simestru.php",
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
<div class="tabel">
  <div id="example">
    <div id="grid"></div>
    <script>
        $(document).ready(function () {

            var crudServiceBaseUrl = "//demos.telerik.com/kendo-ui/service",
            dataSource = new kendo.data.DataSource({
                transport: {
                    read:  {
                        url: crudServiceBaseUrl + "/Products",
                        dataType: "jsonp"
                    },
                    update: {
                        url: crudServiceBaseUrl + "/Products/Update",
                        dataType: "jsonp"
                    },
                    destroy: {
                        url: crudServiceBaseUrl + "/Products/Destroy",
                        dataType: "jsonp"
                    },
                    create: {
                        url: crudServiceBaseUrl + "/Products/Create",
                        dataType: "jsonp"
                    },
                    parameterMap: function(options, operation) {
                        if (operation !== "read" && options.models) {
                            return {models: kendo.stringify(options.models)};
                        }
                    }
                },
                batch: true,
                pageSize: 20,
                schema: {
                    model: {
                        id: "ProductID",
                        fields: {
                            ProductID: { editable: false, nullable: true },
                            ProductName: { validation: { required: true } },
                            UnitPrice: { type: "number", validation: { required: true, min: 1} },
                            Discontinued: { type: "boolean" },
                            UnitsInStock: { type: "number", validation: { min: 0, required: true } }
                        }
                    }
                }
            });
            $("#grid").kendoGrid({
                dataSource: dataSource,
                pageable: true,
                height: 550,
                <?php if($masc == true){ ?>
                    toolbar: ["Adauga o inscriere"],
                    <?php  } ?>
                    columns: [
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";

// Create connection
                    $mysqli = mysqli_connect($servername, $username, $password,"registru1");

// Check connection
                    if ($mysqli->connect_errno) {
                        printf("Соединение не удалось: %s\n", $mysqli->connect_error);
                        exit();
                    }

                    $query = "  SELECT * FROM facultate , catedra , grupa , leg1 , obiect, simestru WHERE nume = 'Fcim' AND nume_c = 'Cim' AND facultate.id_facultate = catedra.id_facultate AND grupa.nume_g = 'C141' AND grupa.id_catedra = catedra.id_catedra and simestru.nr = 1 and simestru.id_simestru = leg1.id_simestru  and leg1.id_obiect = obiect.id_obiect AND obiect.id_grupa = grupa.id_grupa ";

                    if ($result = $mysqli->query($query)) {

                        /* извлечение ассоциативного массива */

                        printf("%s%s%s%s\n" ,'"', "Nume Prenume" , '"' ," , ");
                        while ($row = $result->fetch_assoc()) {
                            printf ("%s%s%s%s\n",  '"', $row["nume_o"] , '"' ,  " , ");
                        } 

                        /* удаление выборки */
                        $result->free();
                    }
                    else{
                        echo("Error description: " . $mysqli->error);
                    }

                    /* закрытие соединения */
                    $mysqli->close();
                    ?>
                    
                    {  <?php if($masc == true){  ?> command: ["editeaza", "strege"],  title: "&nbsp;", width: "250px" <?php  } ?> }],
                    editable: "inline"                
                });
        });
    </script>
</div>
</div>
<div class="chenar">
   <div id="navthing">
    <?php
    if($masc == false){ 
        ?>

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
 <?php
}
?>
<?php
if($masc == true){ 
    ?>
    <h2><a href="exit.php" id="loginform">Esire</a> </h2>
    
    <?php
}
?>
</div>
</div>
<script src="js/index.js"></script>
</body>
</html>