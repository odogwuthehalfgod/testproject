let editReq = document.querySelector(".table-edit");

let productID;

let gi = [];

async function test() {
  // gi = [];
  let a = await fetch("orders2.php");

  let b = await a.text();

  let c = JSON.parse(b);

  gi.push(c);

  console.log(gi);
}

test();

let displayBox = document.querySelector(".edit-box");
let x = document.querySelector(".mumu1");
let displayBox2 = document.querySelector(".edit-box-inner");

editReq.addEventListener("click", function (el) {
  // test();
  x.innerHTML = "";
  let r = el.target.closest(".edit-request");

  if (r) {
    displayBox.style.display = "block";
  }

  if (r) {
    productID = r.dataset.id;

    gi[0].find(function (el) {
      if (productID == el.rid) {
        // console.log(el);
        let t = `
                <div class="mumu">
                <div class="flex-input">
                <input type="text" class="rid" name="rid[]" value=${
                  el.rid
                } hidden>
                <input type="text" class="prodID" name="prodID[]" value=${
                  el.product__id
                } hidden>
                Item Name: <input type="text" class="productName" name="productName[]" value="${
                  el.product_name
                }" class="block-input greyed" readonly>
                Price: <input type="text" class="prodPrice" name="prodPrice[]" value="${
                  el.price
                }" class="block-input">
                Quantity: <input type="text" class="qty" name="qty[]" value="${
                  el.quantity
                }" class="block-input">
                Amount: <input type="text" class="total" name="total[]" value="${
                  +el.quantity * +el.price
                }" class="block-input">
                <a href="#" class="delete-items" data-rid=${
                  el.rid
                } data-prodid=${el.product__id}>
                    <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" fill="red"></path> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" fill="red"></path> </svg>
                </a>
                </div>
                <hr>
                </div>
						
						`;

        // displayBox2.insertAdjacentHTML("afterbegin", t);
        x.insertAdjacentHTML("afterbegin", t);
      }
    });
  }
});

let closeModal = document.querySelector(".close");

closeModal.addEventListener("click", function () {
  let displayBox = document.querySelector(".edit-box");
  let displayBox2 = document.querySelector(".flex-input");
  let displayBox3 = document.querySelector(".mumu");

  displayBox.style.display = "none";
  //   display.innerHTML = "";
  displayBox2.innerHTML = "";
  displayBox3.innerHTML = "";
  gi = [];
  test();
});

let saveButton = document.querySelector(".save-button");

saveButton.addEventListener("click", function (el) {
  el.preventDefault();
  let form = document.querySelector(".edit-box-inner");
  let data = new URLSearchParams();

  for (const p of new FormData(form)) {
    data.append(p[0], p[1]);
  }

  console.log(data);
  fetch("edit-function.php", {
    method: "POST",
    type: "JSON",
    body: data,
  })
    .then(function (response) {
      return response.text();
    })
    .then(function (result) {
      alert(result);
    });
});

// let deleteItem = document.querySelector(".delete-item");

displayBox2.addEventListener("click", function (el) {
  let deleteBtn = el.target.closest(".delete-items");

  let data;

  if (deleteBtn) {
    data = {
      rid: deleteBtn.dataset.rid,
      prodid: deleteBtn.dataset.prodid,
    };

    fetch("delete-items.php", {
      method: "POST",
      type: "JSON",

      body: JSON.stringify({
        data,
      }),
    })
      .then(function (response) {
        return response.text();
      })
      .then(function (result) {
        alert(result);
      });

    gi[0].find(function (el, i, ad) {
      if (el == undefined) {
        return;
      }
      if (
        el.rid == deleteBtn.dataset.rid &&
        el.product__id == deleteBtn.dataset.prodid
      ) {
        console.log(gi);
        let trashItem;
        trashItem = gi[0].indexOf(el);
        gi[0].splice(trashItem, 1);
      }
    });

    deleteBtn.parentElement.parentElement.remove();
  }
});

displayBox2.addEventListener("keyup", function (el) {
  let qty = +el.target.value;
  let price = +el.target.previousSibling.previousSibling.value;
  el.target.nextSibling.nextSibling.value = qty * price;
});

{
  /* <a href="orders-table.php?id=${el.product__id}&rid=${el.rid}">
<svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"> <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" fill="red"></path> <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" fill="red"></path> </svg>
</a> */
}
