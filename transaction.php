<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">   

    <title>SJS-M</title>

    <!-- Bootstrap core CSS -->
    <link href="stylesheets/bootstrap.css" rel="stylesheet">
    <!-- Custom stylesheets for this template -->
    <link href="stylesheets/sticky-footer-navbar.css" rel="stylesheet">
 <link href="stylesheets/navbar-static-top.css" rel="stylesheet">
 <link href="stylesheets/screen.css" rel="stylesheet">

  <link href="/css/bootstrap.min.css" rel="stylesheet">
 <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/javascripts/html5shiv.js"></script>
      <script src="/javascripts/respond.min.js"></script>
    <![endif]-->
<style type="text/css" title="currentStyle">
			@import "dataTables/media/css/demo_page.css";
			@import "dataTables/media/css/demo_table.css";
		</style>


<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.jeditable.js"></script>
<script type="text/javascript" language="javascript" src="dataTables/media/js/jquery.dataTables.editable.js"></script>

<script type="text/javascript" charset="utf-8">
	//	{"T_Id":"0000000066","Date_Claimed":"2014-01-01 00:00:00","Date_Returned":"2014-01-15 00:00:00","Status":"0","Stocks":"0","Book_Id":"7","User_Id":"2","Title":"Nat Geo Documentary Vol 2"
	jQuery(document).ready(function($) {
				var oTable = $('#example').dataTable( {
	
						//id:"T_Id",			
					"sAjaxSource": 'http://localhost/models/transaction_process.php',
					"aoColumns": [
{ "mDataProp": "T_Id" },
{ "mData": "Title" },
{ "mData": "Date_Claimed" },
{ "mData": "Date_Returned" },
{ "mData": "penalty"},
{ "mData": "Status"},
{ "mData": "condition"},
{ "mData": "damage"}


],
"fnRowCallback": function( nRow, aData, iDisplayIndex ) {
	//console.dir(nRow);
	//$(nRow).find("tr").attr("id",aData['T_Id']);
	nRow.id = aData['T_Id']+"_"+aData['Book_Id'];
	return nRow;
},
	//		"fnCreatedRow": function( nRow, aData, iDataIndex ) {
      //  $(nRow).attr('id', aData[0]);
    //},	
"sAjaxDataProp": "",	
"fnDrawCallback": function (aData) {
					/*	$('#example tbody td').editable( 'http://localhost/models/tedit.php?aid=12', {
							submitdata:function ( sAjaxDataProp ){
							var aId = this.parentNode.getAttribute('id').split('_');
							return {
							"id": aId['0'],
							"bid": aId['1'],
							"column": oTable.fnGetPosition( this )[2]
						};
							},
							"callback": function( sValue, y,full ) {
								oTable.fnDraw();
							},
							"height": "14px"
						} );
*/
					}
				} ).makeEditable({
                       	sUpdateURL: "http://localhost/models/tedit.php",
                       	"aoColumns": [
                    				null,
                    				null,
                    				null,
                    				null,
                    				null,
                    				{
                    					type:'select',
                    					data:{'0':'borrow','1':'reserve','2':'return'},
                    					submit: 'save',
                    					sUpdateURL: function(value, settings)
    {
        return(value); 
    },
                    					submitdata:function ( sAjaxDataProp ){
										var aId = this.parentNode.getAttribute('id').split('_');
										return {"id": aId['0']};
                    				},fnOnCellUpdated: function(sStatus, sValue, settings){
                    					if(sValue = 0){
                    						rr = 'borrow';
                    					}else if(sValue = 1){
                    						rr = 'reserve';
                    					}else {
                    						rr = 'return';
                    					}
                							this.html(rr);
                							}
                    			},
                    			{
                    					type:'select',
                    					data:{'0':'damaged','1':'good'},
                    					submit: 'save'
                    			},{
                    			type:'text',
                    			submit:'save'
                   	 		}

					]									
				});
			} );
		</script>
  </head>

  <body bgcolor="#993333" style="background-color:#993333">
  <!--	<img src="images/banner.jpg" width="1010px" height="150px"/> -->
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
    <?php require("./header.php"); ?>

<?php 
//require( './user.class.php' ); 
require( './transaction.class.php' );
	$defaultuser = new User();
	if(isset($_SESSION['userid']))
	$defaultuser->getUser($_SESSION['userid']);
	else
		$defaultuser->getUser(); // just put dummy value
?>
	<!-- Begin page content -->
      <div class="container">  
	
	<!-- start of profile display -->
	<div class="container">
			<?php
				$trans = new Transaction();
				$translist = $trans->getTransactions();
				//print_r($translist);
		   ?>
		<h3 style="color:#00FF00">Borrowed Books</h3>
		<br>
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">

	<thead>
	<tr style="background:grey" class="table-hover">
		<th style="text-transform:uppercase">ID</th>
		<th style="text-transform:uppercase">Book Title</th>
		<th style="text-transform:uppercase">Date Borrowed</th>
		<th style="text-transform:uppercase">Due Date</th>
		<th style="text-transform:uppercase">Penalty</th>
		<th style="text-transform:uppercase">Status</th>
		<th style="text-transform:uppercase">Condition</th>
		<th style="text-transform:uppercase">Damages</th>
	</tr>
	</thead>
	<tbody>
				<tr>
			<td colspan="5" class="dataTables_empty">Loading data from server</td>
		</tr>
	</tbody>
	</table><br />



		
	</div>
	<!-- end of profile display -->
		
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Implemented by: <a href="#">author</a></p>
      </div>
    </div>
    <script src="javascripts/jquery.js"></script>
 <script src="javascripts/modal.js"></script>
  </body>
</html>