<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<style>

.ui-state-active h4,
.ui-state-active h4:visited {
    color: #26004d ;
}

.ui-menu-item{
    height: 80px;
    border: 1px solid #ececf9;
}
.ui-widget-content .ui-state-active {
    background-color: white !important;
    border: none !important;
}
.list_item_container {
    width:500px;
    height: 80px;
    float: left;
}
.ui-widget-content .ui-state-active .list_item_container {
    background-color: #f5f5f5;
}

.image {
    width: 20px;
    float: left;
    padding: 10px;
    padding-right: 0px;
}
.image img{
    width: 40;
    height : 60px;
}
.label{
    width: 85%;
    float:right;
    white-space: nowrap;
    overflow: hidden;
    color: rgb(124,77,255);
    text-align: left;
    font-size: 85%;
}

</style>
<body>
    <div class="container">
        <h3 class="text-center title-color"><u>jQuery UI Autocomplete with Images Demo</u></h3>
	    <p>&nbsp;</p>
	    <div class="well">
	        <div class="row">
	            <div class="col-lg-10 col-lg-offset-1">
	                <div class="input-group">
	                    <span class="input-group-addon" style="color: white; background-color: #5b518b">BLOG SEARCH</span>
	                    <input type="text" autocomplete="off" id="search" class="form-control input-lg" placeholder="Enter Blog Title Here">
	                </div>
	            </div>
	        </div>
	    </div>
		<!-- search box container ends  -->
		<div style="padding-top:280px;" ></div>
    </div>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	    $("#search").autocomplete({
	        source: "{{ url('autocompleteajax') }}",
	            focus: function( event, ui ) {
	            //$( "#search" ).val( ui.item.title ); // uncomment this line if you want to select value to search box  
	            return false;
	        },
	        select: function( event, ui ) {
	            window.location.href = ui.item.url;
	        }
	    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
	        var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="image"><img src="' + item.image + '" ></div><div class="label"><h4><b>' + item.title + '</b></h4></div></div></a>';
	        return $( "<li></li>" )
	                .data( "item.autocomplete", item )
	                .append(inner_html)
	                .appendTo( ul );
	    };
	});
	</script>  
</body>
</html>


