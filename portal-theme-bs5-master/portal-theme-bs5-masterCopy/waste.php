<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app">   	
  <?php
	include_once "header.php";
  ?>
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			    <h1 class="app-page-title">Waste Management</h1>
			    <hr class="mb-4">
	    <!-- My own content -->
	   
		<div class="test">
			<form action="" class="inner-house">
			  <div class="flex-input">
				<div class="input-box">
				  <label for="">Product Name</label>
				  <select name="selectbasic-0" id="" class="form-control-0">
					<option value=""></option>
				  </select>
				</div>
				<div class="input-box">
				  <label for="">Current Stock</label>
				  <input type="text" name="cur_stk" class="cur_stk" readonly/>
				</div>
				<div class="input-box">
				  <label for="">Request Quantity</label>
				  <input type="text" name="cur_req_qty" class="cur_req_qty" required/>
				</div>
				<div class="input-box">
				  <label for="">From</label>
				  <select name="selectbasic-1" id="" class="form-control-1">
					<option value=""></option>
					
				  </select>
				</div>
				<div class="input-box">
				  <label for="">To</label>
				  <select name="selectbasic-2" id="" class="form-control-2">
					<option value=""></option>
					
				  </select>
				</div>
			  </div>
			  <button type="submit" class="btn app-btn-primary submit_req">Submit</button>
			</form>

			
		  </div>

		  <div class="data-table">
			<form action="waste-record.php" method="post">
				<table>
					<thead>
						<tr>
							<!-- <th>ID</th> -->
							<th>PRODUCT</th>
							<th>CURRENT STOCK</th>
							<th>REQUEST QUANTITY</th>
							<th>FROM</th>
							<th>TO</th>
						</tr>
					</thead>
					<!-- <form action="final-request.php" method="post"> -->
						<tbody class="table-body">
							<!-- <tr>
								<td><input type="text" name="final-product-name" value="ksnkjasas"></td>
							</tr> -->
						</tbody>
						<button type="submit" name="request" class="submit-json">Submit</button>
					<!-- </form>	 -->
				</table>
		</form>

	
	</div>
	  
		  <style>
			
	  
			.flex-input {
			  display: flex;
			  flex-wrap: wrap;
			  padding: 30px;
			}

			.flex-input input, .flex-input label, .flex-input select{
				margin-left: 10px;
			}

			
			.test, .data-table {
			  margin: 0 auto;
			  width: 1079px;
			  background: white;
			}

			.test{
				margin-bottom: 50px;
				box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%) !important;
			}

			.data-table{
				box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%) !important;
			}

			.input-box{
				display: flex;
				flex-direction: column;
			}

			th{
				font-size: 8px;
				padding: 10px;
			}

			.display_none{
				display: none;
			}

			td input{
				width: 116px;
				border: 1px solid #d3d3d394;
			}

			tr{
				margin-bottom: 10px;
			}

			table{
				table-layout: fixed;
				width: 100%;
			}
		  </style>
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 
	<script>
		let obj = [];
		async function getData() {
		  let a = await fetch("../../inv.php"); //fetch data from php file
	
		  let b = await a.text();
	
		  let c = JSON.parse(b);
	
		//   console.log(c);

	
	
		  c.forEach((element, i) => {

			if (element.qty == undefined) {
			  element.qty = 0;
			}
			obj.push(element);
	
	
			let p, r;
	
			if (element.product_name != undefined) {
			  r = `
					<option value="${element.id}">${element.product_name}</option>
			`;
			}
	
			if (element.store_name != undefined) {
			  p = `
					<option value="${element.store_id}">${element.store_name}</option>
			`;
			}
			document.querySelector(".form-control-0").insertAdjacentHTML("afterbegin", r);
			document.querySelector(".form-control-1").insertAdjacentHTML("afterbegin", p);
			document.querySelector(".form-control-2").insertAdjacentHTML("afterbegin", p);
		  });
		}


		async function getData1(test) {
		  let a = await fetch("../../inv2.php"); //fetch data from php file
	
		  let b = await a.text();
	
		  let c = JSON.parse(b);
	
		  c.forEach(function(el){
			if(el.product_id == test.id){
				console.log(el);
				test.qty = el.qty;

				// console.log(test);
			}
		  })

		}
	
		getData();
		
	
	  
		let x = document.querySelector(".form-control-0");
		let house = document.querySelector(".house");
		let d ={};
		let objValues;
		let objArr = [];

		x.addEventListener("click", function (e) {
		  e.preventDefault();
	
		  let y = x.options[x.selectedIndex].value;
		  
		  if (y == "") {
			return;
		  }
		  obj.find(function (el) {
			if (el.id == y) {

			  document.querySelector(".cur_stk").value = el.qty;
			 
			//   document.querySelector(".amount").value = document.querySelector(".cur_req_qty").value * el.price ;
			}
		  // x.selectedIndex = 6;
			  });
		});
	
		document.querySelector(".submit_req").addEventListener("click", function(e){
			e.preventDefault();
			if(document.querySelector(".cur_req_qty").value==""){
				return;
			}

			 objValues = {
				id: document.querySelector(".form-control-0").value,
			  productName: document.querySelector(".form-control-0").options[document.querySelector(".form-control-0").selectedIndex].text,
			  currentStock: document.querySelector(".cur_stk").value,
			  requestQuantity: document.querySelector(".cur_req_qty").value,
			  from: document.querySelector(".form-control-1").value,
			  to: document.querySelector(".form-control-2").value
			}
	

			objArr.push(objValues);
			let zzz = `
			  <tr>
				  <td class="display_none"><input type="text" name="pid[]"value="${objValues.id}" hidden></td>
				  <td><input type="text" name="product__name[]" value="${objValues.productName}"></td>
				  <td><input type="text"name="cur__stock[]" value="${objValues.currentStock}"></td>
				  <td><input type="text" name="req__quantity[]" value="${objValues.requestQuantity}"></td>
				  <td><input type="text" name="store__from[]" value="${objValues.from}"></td>
				  <td><input type="text"name="store__to[]" value="${document.querySelector(".form-control-2").value}"></td> 
				</tr>
			`;
	
			document.querySelector(".table-body").insertAdjacentHTML("afterbegin", zzz);

		})

	  </script>
	  </script>

</body>
</html> 

