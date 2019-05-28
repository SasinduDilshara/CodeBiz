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

.notification {
  cursor:pointer;
  color: white;
  text-decoration: none;
  padding: 8px 12px;
  position: relative;
  display: inline-block;
}


.notification .badge {
  position: absolute;
  top: -5px;
  right: -5px;
  border-radius: 100%;
  background: #398ad7;
  color: white;
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
        var countNotification = (data.match(/href/g) || []).length ;
        $('.sidenav').append(data);
        if (countNotification != 0) {
          $('.badge').append(countNotification);
        }       
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
  $('.badge').hide()
}
</script>