<style>
/* body {
  font-family: "Lato", sans-serif;
} */

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: rgba(17,12,17,0.8);
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  margin-top: 66px;
}

.sidenav a {
  padding: 8px 8px 8px 16px;
  text-decoration: none;
  font-size: 16px;
  color: white;
  display: block;
  /* transition: 0.3s; */
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  left: 0;
  font-size: 26px;
  margin-left: 10px;
}

.sidenav .clearbtn {
  position: absolute;
  top: 0;
  right: 0;
  font-size: 22px;
  margin-right: 10px;
} 
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="javascript:void(0)" class="clearbtn" onclick="clearNav()">Clear</a>
</div>



<script>
$(document).ready(function() {
    $.get( "/CodeBiz/MVC/notifications/show", function( data ) {
        console.log( "Data Loaded: " + data );
        $('.sidenav').append(data);
    });
});
function openNav() {
  document.getElementById("mySidenav").style.width = "400px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function clearNav() {
  $.post( "/CodeBiz/MVC/notifications/clear");
  $('.sidenav').html('<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><a href="javascript:void(0)" class="clearbtn" onclick="clearNav()">Clear</a></div>');
}
</script>