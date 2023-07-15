var tableField = document.getElementById("table");
var addForm = document.getElementById("addForm");
var addFields = document.getElementById("addFields");
var searchFields = document.getElementById("searchField");

var supplier = ['supplier_id', 'supplier_name', 'address', 'phone', 'email'];
var product = ['pid', 'product_id', 'product_name', 'description', 'price', 'quantity','status', 'supplier_id'];

var counter = 0;

// resets page back to default
function changeTable() {
    addForm.style.display = "none";
    document.getElementById("search-fields").innerHTML = "";
    clearFields();
}

function clearFields() {
    while (addFields.options.length > 0) {                
        addFields.remove(0);
    }
}

/*  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com"> */
function addSearchField() {
    addForm.style.display = "none";
    // clearFields();
    var newSearch = addFields.value;

    const div = document.createElement('div');
    div.className = "form-group";
    div.id = counter;

    div.innerHTML = `
    <label for="` + (newSearch + counter) + `" class="col-sm-2 col-form-label input-labels">` + (newSearch + ' =') + `</label>
    <div class="col-sm-10">
        <input type="text" class="form-control search-input" id="` + (newSearch + counter) + `" placeholder="` + newSearch + `">
    </div>
    `;
    console.log(div);
    document.getElementById("search-fields").appendChild(div);

    counter += 1;
}

function removeSearchField() {
    let element = document.getElementById("search-fields");
    element.removeChild(element.lastChild);
    counter -= 1;
}

function addFieldVals() {
    var tableSelected = (tableField.value == 'supplier') ? supplier : product;
    
    if (addFields.options.length == 0) {
        for (let i = 0; i != tableSelected.length; i++) {
            var newOption = document.createElement('option');
            newOption.setAttribute('value', tableSelected[i]);
            newOption.innerHTML = tableSelected[i];
            addFields.add(newOption);
        }
    }
}

function addBtn() {
    addForm.style.display = "block";
    addFieldVals();
}