<!DOCTYPE html>
<html>
    <title></title>
<style type="text/css">
    *{
    margin: 0;
    padding: 0px;
    text-decoration: none;
    }
.sidebar{
    position: fixed;
    left: 0px;
    width: 200px;
    height: 100%;
    background: #1e1e1e;
    /*transition: 1pall .5s ease-in ;*/
}
.sidebar header{
    color: white;
    font-size: 28px;
    line-height: 70px;
    text-align: center;
}
.sidebar a{
    display: block;
    color: white;
    height: 65px;;
    width: 100%;
    line-height: 65px;
    padding-left: 30px;
    border-bottom: 1px solid rgba(255,255,255,.1);
    border-top: 1px solid black;
    border-left: 5px solid transparent;
    box-sizing: border-box;
    font-family: 'Open Sans',sans-serif;
    /*transition: 1pall .5s ease-in ;*/
}
.sidebar a span{
  letter-spacing: 1px;
  text-transform: uppercase;
}
a:hover,a.active{
	border-left: 5px solid #b93632;
  color: red;
}
.sidebar a i{
  font-size: 23px;
  margin-right: 16px;
  letter-spacing: 2px;
}

  </style>
  <body>
<div class="sidebar">
    <header>My Dashboard</header>
    <a href="listbook.php"><i class="fas fa-list"></i><span>List Book</span></a>
    <a href="addbook.php"><i class="fas fa-book"></i><span>Add Book</span></a>
    <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>Cart</span></a>
  </div>
</body>
</html>