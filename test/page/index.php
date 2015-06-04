<html lang="th" >
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="css/page.css">
        <script src="../js/jquery-1.11.2.min.js" ></script>
        <title>ระบบสินค้าคงคลัง</title>
    </head>
    <body>
        <script>
            $(document).ready(function(){
      
            });
               
            </script>
        <?php include 'menu.php'; 
        switch($_GET["page"]){
            case "stock" :
                include 'stock.php';
                break;
            case "cus" :
                 include 'cus.php';
                   break;
               case "order" :
                 include 'order.php';
                   break;
        }
        ?>
        
        
        <form>
 
    </body>
    
</html>