<!DOCTYPE html>
<!-- front end list:
make person modal (person modal well have own list when completed)
make dropdown item searchable
make functions to calculate costs
error checking-->
<html lang="en">
<head>
    <?php include "Includes/Head.php" ?>
    <link href="InvoiceCSS/MakeInvoice.css" rel="stylesheet" />
    
</head>
<?php include "Includes/Header.php" ?>
<body>
    <form>
        <table id="FormTable">
            <tr class="Sec">
                <td colspan="3">
                    <button id="ApButn"><img src="InvoiceImages/selectPerson.png" alt="select Person" /></button>
                </td>
            </tr>
            <tr class="Sec">
                <td>
                    <label for="Item">Choose Item *</label>

                    <select class="Item">
                        <option>Item</option>
                    </select>
                </td>
                <td>
                    <label for="Amount">Number of item *</label>
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
                    <label for="Discount">Add Discount *</label>
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
            <label for="Item">Choose Item *</label>
            <select class="Item">
                <option>Item</option>
            </select>
        </td>
        <td>
            <label for="Amount">Number of item *</label>
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

function RemoveItem(button){
    event.preventDefault();
    var parent = button.closest('.newItem');
    parent.remove();
}
</script>


