let reportArr = [];

let storeArr = [];

let storeObj;

let testArr = [];

let result = {};

let blah;

async function binCard() {
  let a = await fetch("orders.php"); //make call to php file

  let b = await a.text();

  let c = JSON.parse(b);

  reportArr.push(c);

  c.forEach(function (el) {
    let dropdown = `<option selected value=${el.id}>${el.product_name}</option>`; //Data is inserted into the DOM
    if (el.product_name != undefined) {
      selectOptions.insertAdjacentHTML("afterbegin", dropdown);
    }

    if (el.store_id) {
      //Check if the store id exist and then create an object out of it
      storeObj = {
        [el.store_id]: el.store_name,
      };

      storeArr.push(storeObj);

      let keysObj = Object.keys(storeObj);
      testArr.push(keysObj);
    }
  });

  let num = 0;

  for (let i = 0; i < storeArr.length; i++) {
    let f = testArr.flat(); // make the nested array into one

    result[f[num]] = storeArr[i][f[num]]; //This reduces the object created above to a single object from the nested array

    num++;
  }

  console.log(result);
}

binCard();

let selectOptions = document.querySelector(".form-select");

let submitBtn = document.querySelector(".app-btn-secondary");

let tableEntry = document.querySelector(".table-entry");

let productName, sss;

submitBtn.addEventListener("click", function (e) {
  e.preventDefault();

  let count = -1;

  let m = 0;

  tableEntry.innerHTML = "";

  let valueOfOption = selectOptions.options[selectOptions.selectedIndex].value;

  let tableData;

  for (let i = 0; i < reportArr[0].length; i++) {
    if (reportArr[0][i].waste_id) {
      reportArr[0][i].type = "Waste";
      sss = [...reportArr[0]];

      // console.log(sss);
    }

    if (reportArr[0][i].id == valueOfOption) {
      productName = reportArr[0][i].product_name;
    }

    if (reportArr[0][i].waste_id == valueOfOption) {
      lp = +reportArr[0][i].stock_in;
    }

    if (reportArr[0][i].invent_id == valueOfOption) {
      count++;

      // console.log(sss);

      if (reportArr[0][i].store_to == 1) {
        m = m + +reportArr[0][i].stock_in;
      } else {
        m = m - +reportArr[0][i].stock_in;
      }

      if (count >= storeArr.length) {
        count = 0;
      }

      let statusReport;
      if (reportArr[0][i].store_to != 1) {
        statusReport = "Issued";
      } else if (reportArr[0][i].store_to == 1) {
        statusReport = "Received";
      }

      if (reportArr[0][i].invent_id != undefined) {
        tableData = `<tr>
            <td class="cell"></td>
            <td class="cell">${productName}<span class="truncate"></span></td>
            <td class="cell">${reportArr[0][i].stock_in}</td>
            <td class="cell"><span class=${
              reportArr[0][i].store_to != 1 ? "red-sign" : "green-sign"
            }>${m}</span></td>

            <td class="cell"><span class="badge ${
              reportArr[0][i].store_to != 1 ? "bg-danger" : "bg-success"
            }">${statusReport}</span></td>
            <td class="cell"><span>${result[reportArr[0][i].store_to]}</td>
            <td class="cell"><span>${reportArr[0][i].date}</td>

          
            </tr>`;
        tableEntry.insertAdjacentHTML("afterbegin", tableData);
      }
    } else if (reportArr[0][i].waste_id == valueOfOption) {
      // console.log(reportArr[0][i]);
      tableData = `<tr>
            <td class="cell"></td>
            <td class="cell">${productName}<span class="truncate"></span></td>
            <td class="cell">${reportArr[0][i].stock_in}</td>
            <td class="cell"><span class=${
              reportArr[0][i].store_to != 1 ? "red-sign" : "green-sign"
            }>${m - reportArr[0][i].stock_in}</span></td>

            <td class="cell"><span class="badge ${
              reportArr[0][i].store_to != 1 ? "bg-danger" : "bg-success"
            }">${reportArr[0][i].type}</span></td>
            <td class="cell"><span>${result[reportArr[0][i].store_to]}</td>
            <td class="cell"><span>${reportArr[0][i].date}</td>

           
            </tr>`;
      tableEntry.insertAdjacentHTML("afterbegin", tableData);
    }
  }
});

// reportArr[0][i].store_to != 1 ? "Issued" : "Received"
{
  /* <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td> */
}
{
  /* <td class="cell"><a class="btn-sm app-btn-secondary" href="#">View</a></td> */
}
{
}
