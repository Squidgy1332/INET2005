<!DOCTYPE html>
<!-- TODO:
make dropdown item searchable
make dropdown person searchable
auto fill person form when person selected with DB data
make functions to calculate costs
make function to display person info after submission with DB data
connect to other pages
error checking
-->
<html lang="en">
<head>
    <?php include "Includes/Head.php" ?>
    <link href="InvoiceCSS/MakeInvoice.css" rel="stylesheet" />
</head>
<?php include "Includes/Header.php" ?>
<body>
    <h2 id="MakeInvoiceTitle">Make New Invoice</h2>
    <form>
        <table id="FormTable">
            <tr class="Sec" id="AddPeronButtonDisplay">
                <td colspan="3">
                    <label id="personAst" for="Person*"></label>
                    <button class="Person" onclick="ShowPersonModal()" id="ApButn"><img src="InvoiceImages/selectPerson.png" alt="select Person" /></button>
                </td>
            </tr>
            <tr class="personInfo">
                <td>
                    <h2>Person Info</h2>
                </td>
            </tr>
            <tr class="personInfo">
                <td id="NameInfo"> 
                    <p><b>Name:</b> FNameDD LNameDD </p>
                </td>
                <td id="BusinessInfo">
                    <p><b>Business:</b> NameDD</p>
                    <!--Only Display if has Business-->
                    <p><b>Registered:</b> YesDD/NoDD</p>
                </td>
            </tr>
            <tr class="personInfo">
                <td>
                    <p><b>Address:</b> AddressDD </p>
                    <p><b>Email:</b> MailDD </p>
                </td>
                <td>
                    <p><b>Postal Code:</b> PODD </p>
                    <p><b>Phone:</b> NumberDD </p>
                </td>
            </tr>
            <tr class="Sec personInfo">
                <td>
                    <button onclick="ShowPersonModal()" id="ChangePersonButn" class="btn btn-primary butn">Edit/Change</button>
                </td>
            </tr>
            <tr class="Sec">
                <td>
                    <label for="Item*">Choose Item </label>

                    <select class="Item">
                        <option>Item</option>
                    </select>
                </td>
                <td>
                    <label for="Amount*">Number of item </label>
                    <input type="text" class="Amount" placeholder="0">
                </td>
                <td>
                    <p class="prices">Item Cost </br > $0.00</p>
                </td>
            </tr>
            <tr class="Sec MakeNewItem">
                <td colspan="3">
                    <button onclick="MakeNewItem()"><img src="InvoiceImages/AddBtn.png" alt="select Item" /></button>
                </td>
            </tr>
            <tr class="Sec newItem">
            </tr>
            <tr>
                <td>
                    <label for="Discount*">Add Discount </label>
                    <input type="text" class="Discount" placeholder="0.00">
                </td>
                <td colspan="2">
                    <p class="prices">Sub Total </br > $0.00</p>
                </td>
            </tr>
            <tr class="Sec">
                <td colspan="3">
                    <p class="prices">Total </br > $0.00</p>
                </td>
            </tr>
            <tr>
                <td>
                    <button id="CancelButn" class="btn btn-danger butn">Cancel</button>
                </td>
                <td>
                    <button id="SaveButn" class="btn btn-primary butn">Make Invoice</button>
                </td>
            </tr>
        </table>
    </form>
</body>
<?php include "Includes/Footer.php" ?>
</html>

<div class="modal fade" id="AddPerson" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="ModalSize">
      <div class="modal-header">
        <h2 class="modal-title" id="ModalHeadText">Add Person to Invoice</h2>
      </div>
      <div id="ModalBody" class="modal-body">
        <form>
            <table>
                <tr>
                    <td>
                        <label for="Person*">Find Person </label>

                        <select class="Person">
                            <option>Person</option>
                            <option>Add New</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><h2>Person Info</h2></td>
                </tr>
                <tr id="InfoSec">
                    <td>
                        <label for="FName*">First Name </label>
                        <input type="text" class="FName" placeholder="Fist Name">
                    </td>
                    <td>
                        <label for="LName*">Last Name </label>
                        <input type="text" class="LName" placeholder="Last Name">
                    </td>
                    <td id="BusinessCol">
                        <label for="Business">Business</label>
                        <input type="text" class="Business" placeholder="Business Name">
                        <label id="RegBusLabel" for="IsRegistered">Are they a <b>Registered Business</b></label>
                        <input type="checkbox" id="IsRegisteredT" name="IsRegistered">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Address*">Address </label>
                        <input type="text" class="Address" placeholder="Address">
                    </td>
                    <td>
                        <label for="PO*">Postal Code </label>
                        <input type="text" class="PO" placeholder="PO">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Email*">Email Address </label>
                        <input type="text" class="Email" placeholder="Mail">
                    </td>
                    <td>
                        <label for="Phone*">Phone Number </label>
                        <input type="text" class="Phone" placeholder="(000) - 000 - 0000">
                    </td>
                </tr>
            </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="ClosePersonModal()">Close</button>
        <button type="button" class="btn btn-primary" onclick="DisplayPersonInfo()">Add Person</button>
      </div>
    </div>
  </div>
</div>

<script>
function MakeNewItem() {
    event.preventDefault();

    // Remove the existing 'MakeNewItem' button row
    var buttonRow = document.querySelector(".MakeNewItem"); 
    buttonRow.parentNode.removeChild(buttonRow);

    // Get the container where the new item will be added
    var newItemContainer = document.querySelectorAll(".newItem");

    // Add the new item content
    newItemContainer[newItemContainer.length -1].innerHTML += `
        <td>
            <label for="Item*">Choose Item</label>
            <select class="Item">
                <option>Item</option>
            </select>
        </td>
        <td>
            <label for="Amount*">Number of item</label>
            <input type="text" class="Amount" placeholder="0">
        </td>
        <td>
            <p class="prices">Item Cost </br > $0.00</p>
        </td>
        <td>
            <button class="RemoveItemBtn" onclick="RemoveItem(this)"><img src="InvoiceImages/RemoveItem.png" alt="Remove Item" /></button>
        </td>`;

    // Add a new 'MakeNewItem' button row
    var newItemButtonRow = `
        <tr class="Sec MakeNewItem">
            <td colspan="3">
                <button onclick="MakeNewItem()"><img src="InvoiceImages/AddBtn.png" alt="select Item" /></button>
            </td>
        </tr>`;
    
    // Insert the new button row after the newItemContainer
    newItemContainer[newItemContainer.length -1].insertAdjacentHTML('afterend', newItemButtonRow);

    // Add a new empty row for the next item
    var newTempItemRow = `<tr class="Sec newItem"></tr>`;
    newItemContainer[newItemContainer.length -1].insertAdjacentHTML('afterend', newTempItemRow);
}

//DD is Dummy Data any text with DD well come from DB
function DisplayPersonInfo(){
    ClosePersonModal();
    document.getElementById("AddPeronButtonDisplay").style.display = "none";
    $('.personInfo').css('display','table-row');
}

function RemoveItem(button){
    event.preventDefault();
    var parent = button.closest('.newItem');
    parent.remove();
}

function ShowPersonModal(){
    event.preventDefault();
    $('#AddPerson').modal('show');
}

function ClosePersonModal(){
    event.preventDefault();
    $('#AddPerson').modal('hide');
}
</script>


