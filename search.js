var tableField = document.getElementById("table");
var addForm = document.getElementById("addForm");
var addFields = document.getElementById("addFields");
var searchFields = document.getElementById("searchField");

var supplier = ['supplier_id', 'supplier_name', 'address', 'phone', 'email'];
var product = ['pid', 'product_id', 'product_name', 'description', 'price', 'quantity','status', 'supplier_id'];

var field_order  = [];
var counter = 0;

function checkMemory() {
    console.log("checking history");
    if (localStorage.length > 1) {
        console.log("loading previous history");
        table = localStorage.getItem("table");
        tableSelected = (table == "supplier") ? supplier : product;
        tableField.value = table;

        addFieldVals();
       
        for(let i = 0; i != tableSelected.length; i++) {
            storedVal = localStorage.getItem(tableSelected[i]);
            if (storedVal != null) {
                addFields.value = tableSelected[i];
                addSearchField(storedVal);
            }
        }
    }
    localStorage.clear();
}

// resets page back to default
function changeTable() {
    addForm.style.display = "none";
    document.getElementById("search-fields").innerHTML = "";
    clearFields();
    counter = 0;
}

function clearFields() {
    while (addFields.options.length > 0) {                
        addFields.remove(0);
    }
}

/*  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com"> */
function addSearchField(content = "") {
    if (addFields.value != "-") {
        addForm.style.display = "none";
        document.querySelector('select[name="add-fields"] option[value="' + addFields.value + '"]').disabled = true;

        field_order.unshift(addFields.value);
        var newSearch = addFields.value;

        const div = document.createElement('div');
        div.className = "form-group";

        div.innerHTML = `
        <label for="` + counter + `" class="col-sm-2 col-form-label input-labels">` + (newSearch + ' =') + `</label>
        <div class="col-sm-10">
            <input type="text" class="form-control search-input" id="`+ counter + `"name="` + ("input-"+counter) + `" placeholder="` + newSearch + `" value="` + content + `">
            <input type="hidden" name="` + ("field-"+counter) + `" value="` + (newSearch) + `">
        </div> 
        `;
        document.getElementById("search-fields").appendChild(div);
        counter += 1;
    }
}

function removeSearchField() {
    let element = document.getElementById("search-fields");

    if (element.childNodes.length > 0) {
        document.querySelector('select[name="add-fields"] option[value="' + field_order.shift() + '"]').disabled = false;
        console.log(element.lastChild);
        element.removeChild(element.lastChild);
        counter -= 1;
    }
}

function addFieldVals() {
    var tableSelected = (tableField.value == 'supplier') ? supplier : product;
    
    if (addFields.options.length == 0) {
        var newOption = document.createElement('option');
        newOption.setAttribute('disabled', true);
        newOption.setAttribute('selected', true);
        newOption.setAttribute('value', "-");
        newOption.innerHTML = "-- select an option --";
        addFields.add(newOption);

        for (let i = 0; i != tableSelected.length; i++) {
            newOption = document.createElement('option');
            newOption.setAttribute('value', tableSelected[i]);
            newOption.innerHTML = tableSelected[i];
            addFields.add(newOption);
        }
    }
}

function addBtn() {
    addForm.style.display = "block";
    addFields.value = '-';
    addFieldVals();
}

function commitToMem() {
    localStorage.setItem("table", tableField.value);
    for(let i = 0; i != field_order.length; i++) {
        element = document.getElementById(i);
        localStorage.setItem(field_order[(field_order.length - 1) - i], element.value);
    }
}