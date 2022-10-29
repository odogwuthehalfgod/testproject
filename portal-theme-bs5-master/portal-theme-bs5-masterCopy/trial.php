<?php
session_start();


?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Zankli's Requisition Platform</title>
    
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
	<div class="emoji-loader">
		<div class="emoji-area"></div>
	</div>	
   <?php
	include_once "header.php";
 
 	?>
    
    <div class="app-wrapper">
	    
	    <!-- <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			    <h1 class="app-page-title">External Requisition</h1>
			    <hr class="mb-4"> -->
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">External Requisition</h1>
				    </div>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    
							    <div class="col-auto">						    
								    <a class="btn app-btn-secondary" href="#">
									    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
		  <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
		</svg>
									    Upload Invoice
									</a>
							    </div>
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
	    <!-- My own content -->
	   
		<div class="test">
			<form action="" class="inner-house">
			  <div class="flex-input">
				<!-- <div class="input-box">
				  <label for="">Invoice No</label>
				  <input type="text" readonly/>
				</div> -->
				<div class="input-box">
				  <label for="">Product Name</label>
				  <select name="selectbasic-0" id="" class="form-control-0">
					<option value=""></option>
				  </select>
				</div>
				<div class="input-box">
				  <label for="">Unit Price</label>
				  <input type="text" name="unit_price" class="unit_price" readonly/>
				</div>
				<div class="input-box">
				  <label for="">Current Stock</label>
				  <input type="text" name="cur_stk" class="cur_stk" readonly/>
				</div>
				<div class="input-box">
				  <label for="">Last Request Date</label>
				  <input type="text" name="last_req_date" class="last_req_date" />
				</div>
				<div class="input-box">
				  <label for="">Last Request Quantity</label>
				  <input type="text" name="last_req_qty" class="last_req_qty" />
				</div>
				<div class="input-box">
				  <label for="">Amount</label>
				  <input type="text" name="amount" class="amount" required/>
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
				  <!-- <label for="minor_request">Minor Request</label> -->
				</div>
				

			  </div>
			  <button type="submit" class="btn app-btn-primary submit_req">Add</button>
			</form>

			
		  </div>
			
		  <div class="data-table">
			<form action="final-request.php" class="final-request" method="post" enctype="multipart/form-data">
				<table>
					<thead>
						<tr>
							<!-- <th>ID</th> -->
							<th>PRODUCT</th>
							<th>PRICE</th>
							<th>CURRENT STOCK</th>
							<th>LAST REQUEST QUANTITY</th>
							<th>LAST REQUEST DATE</th>
							<th>REQUEST QUANTITY</th>
							<th>AMOUNT</th>
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
						Minor Request<input type="radio" name="minor-request" value="Minor Request">
					<!-- </form>	 -->
				</table>
				<input type="file" name="files[]" id="" multiple class="image-stuff">
			
		</form>
	</div>
	  
		  <style>
			
	  		.emoji-loader{
				background: #0000004d;
				width: 100%;
				height: 100%;
				position: absolute;
				top: 0%;
				left: 0%;
				display: none;
				z-index: 9999;
			}
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

			.submit_req{
				margin-bottom: 10px;
				margin-left: 40px;
			}

			.flex-table-row{
				display: flex;
			}

			.emoji-area{
				display: none;
				top: 30%;
				background: white;
				width: 300px;
				text-align: center;
				border-radius: 10px;
				padding: 30px;
				position: absolute;
				left: 40%;
				box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
			}
		  </style>
    </div><!--//app-wrapper-->    					

 
    <!-- Javascript -->       
	<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

  <script>
   
    let s = [];
    let w = [];
	let lastreqdate=[];
    let z = 0;
	let tot = 0;
	let waste = 0;
	let p, r;

	let x, m;
    async function trial() {
      let a = await fetch("orders.php");

      let b = await a.text();

      let c = JSON.parse(b);

	  m = c.length;

	  w.push(c);

	  c.forEach(function(el){
		

      if (el.product_name != undefined) {
        r = `
              <option value="${el.id}">${el.product_name}</option>
      `;

	 	 document.querySelector(".form-control-0").insertAdjacentHTML("afterbegin", r);
      }


	    if (el.store_name != undefined) {

        p = `
              <option value="${el.store_id}">${el.store_name}</option>
      `;

	    document.querySelector(".form-control-1").insertAdjacentHTML("afterbegin", p);
      	document.querySelector(".form-control-2").insertAdjacentHTML("afterbegin", p);
      }


	  

	})

	// console.log(w[0]); 
	x = document.querySelector(".form-control-0");
		let house = document.querySelector(".house");
		let d ={};
		
		let objArr = [];
		let infoArray = [];
		let price;
		let lastReqDate, lastReqQty;


		x.addEventListener("click", function(e){
			e.preventDefault();
			let y = x.options[x.selectedIndex].value;

			// console.log(y);

			if(y == ""){
				
				return;
			}


			w[0].find(function(el,i){

				if(el.invent_id == y){
					infoArray.push(el);
				}

				if(el.id == y && el.price !=undefined){
					price = +el.price;
				}
				
			
				

				if(el.invent_id == y && el.store_to ==1){
					lastreqdate.push(el);
		
					z= z + +el.stock_in
				}

				if(el.invent_id == y && el.store_to != 1){
					tot = tot + +el.stock_in;
					console.log(z,tot);
				}

				if(el.waste_id == y){
			
					waste = waste + +el.stock_in
				
				}
			})
			let total = z - tot - waste
			if(total<0){
				total = 0;
			}
		
			document.querySelector(".cur_stk").value = total;
			document.querySelector(".unit_price").value = price;


			document.querySelector(".last_req_date").value = infoArray.length==0 ? "0000-00-00" : infoArray[infoArray.length-1].date;
	
			document.querySelector(".last_req_qty").value = infoArray.length==0 ? 0 : lastreqdate[lastreqdate.length-1].stock_in;

			document.querySelector(".inner-house").addEventListener("keyup", function(){
			let v = document.querySelector(".cur_req_qty");
			let k = document.querySelector(".unit_price");
			document.querySelector(".amount").value = +v.value * +k.value;
		})
			
			z=0;
			tot=0;
			waste = 0;
			infoArray =[];
			v="";
	
		})

    }

    
    trial();
	let objValues;
	let objArr2 = [];
	document.querySelector(".submit_req").addEventListener("click", function(e){
			e.preventDefault();
			if(document.querySelector(".cur_req_qty").value==""){
				
				document.querySelector(".cur_req_qty").style.borderColor = "red";
				
				setTimeout(() => {
					document.querySelector(".cur_req_qty").style.borderColor = "black";

				}, 5000);

				alert("Enter a quantity")
				return;
			}

			 objValues = {
				id: document.querySelector(".form-control-0").value,
			  productName: document.querySelector(".form-control-0").options[document.querySelector(".form-control-0").selectedIndex].text,
			  unitPrice: document.querySelector(".unit_price").value,
			  currentStock: document.querySelector(".cur_stk").value,
			  lastReqQty: document.querySelector(".last_req_qty").value,
			  lastReqDate: document.querySelector(".last_req_date").value,
			  amount: document.querySelector(".amount").value,
			  requestQuantity: document.querySelector(".cur_req_qty").value,
			  from: document.querySelector(".form-control-1").value,
			  to: document.querySelector(".form-control-2").value
			}
	
			
			let inputUnitPrice = +objValues.unitPrice;
			let inputAmount = +objValues.amount;

			objArr2.push(objValues);
			
		
			let zzz = `
			  <tr class="flex-table-row">
				  <td class="display_none"><input type="text" class="pid-class" name="pid[]"value="${objValues.id}" hidden></td>
				  <td><input type="text" name="product__name[]" class="product-class" value="${objValues.productName}"></td>
				  <td><input type="text" name="unit__price[]" class="unit-price-class" value="${inputUnitPrice.toLocaleString("en-US")}"></td>
				  <td><input type="text"name="cur__stock[]" class="currentStock-class" value="${objValues.currentStock}"></td>
				  <td><input type="text" name="last__req__qty[]" class="last-qty-class" value="${objValues.lastReqQty}"></td>
				  <td><input type="text" name="last__req__date[]" class="last-date-class" value="${objValues.lastReqDate}"></td>
				  <td><input type="text" name="req__quantity[]" class="req-qty-class" value="${objValues.requestQuantity}"></td>
				  <td><input type="text" name="total__amount[]" class="input-amount-class" value="${inputAmount.toLocaleString("en-US")}" readonly></td>
				  <td><input type="text" name="store__from[]" class="store-from-class" value="${objValues.from}"></td>
				  <td><input type="text"name="store__to[]" class="store-to-class" value="${document.querySelector(".form-control-2").value}"></td> 
				  <td><span class="delete">
				  <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" fill="red"></path> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" fill="red"></path> </svg>
				  </span></td>
				</tr>
			`;
	
			document.querySelector(".table-body").insertAdjacentHTML("afterbegin", zzz);

			document.querySelector(".amount").value = "";
			document.querySelector(".cur_req_qty").value = "";

			
			
		})


		let tableBody = document.querySelector(".table-body");

		tableBody.addEventListener("click", function(e){
			let deleteButton = e.target.closest(".delete")
			deleteButton.parentElement.parentElement.remove();
		})

		let submitJSON = document.querySelector(".submit-json");

		submitJSON.addEventListener("click", function(e){
			e.preventDefault();
			let idd = document.querySelector(".data-table");

			let imageStuff = document.querySelector(".image-stuff").files;

			let imageArr = [];



			// for(let i=0; i<imageStuff.files.length;i++){
			// 	imageArr.push(imageStuff.files[i]["name"]);
			// };


			let idk = idd.querySelector(".pid-class");
			
			let idk2 = idd.querySelector(".pid-class");
			let idk3 = idd.querySelectorAll(".product-class");
			let idk4 = idd.querySelector(".unit-price-class");
			let idk5 = idd.querySelector(".currentStock-class");
			let idk6 = idd.querySelector(".last-qty-class");
			let idk7 = idd.querySelector(".last-date-class");
			let idk8 = idd.querySelector(".req-qty-class");
			let idk9 = idd.querySelector(".input-amount-class");
			let idk10 = idd.querySelector(".store-from-class");
			let idk11 = idd.querySelector(".store-to-class");
			let idk12 = idd.querySelector(".file");

			// console.log(idk)
			if(idk == null || idk2 == null || idk3 == null|| idk4 == null|| idk5 == null|| idk6 == null|| idk7 == null|| idk8 == null|| idk9 == null|| idk10 == null|| idk11 == null ){
				return;
			}else{
				let form = document.querySelector(".final-request");
				let data = new URLSearchParams();

				let formData = new FormData(form);
			
				
				for (const p of new FormData(form)) {
					
						data.append(p[0], p[1]);	
						// data.append("file", imageStuff[0]);	
				}

				fetch("final-request-copy.php",{
					method:"POST",
					body:formData,
				}).then(function(response){
					return response.text();
				}).then(function(result){
					document.querySelector(".emoji-loader").style.display ="block";
					document.querySelector(".emoji-area").style.display ="block";
						document.querySelector(".emoji-area").innerHTML = `
						<lottie-player src="https://assets9.lottiefiles.com/temp/lf20_zPrwZA.json" background="transparent" speed="1" style="width: 80px; height: 80px; margin:0 auto;" autoplay></lottie-player><br/>
						${result}
						`;

						document.querySelector(".table-body").innerHTML = "";

				})

				document.querySelector("body").addEventListener("click", function(){
					document.querySelector(".emoji-loader").style.display = "none";
				})

				// const req = new XMLHttpRequest();

				// req.open("POST", "final-request.php", true)
				// req.onload = function(progress){
				// 	if(req.status ==200){
				// 		console.log("file uploaded");
				// 	}else{
				// 		console.log("error");
				// 	}
				// }

				// req.send(formData);
				
			}
		})

  </script>
</html>
