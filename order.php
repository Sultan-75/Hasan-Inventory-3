<?php include "inc/header.php"; ?>

<!-- Container Fluid-->
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                        <div class="card-header">
                            <h4>New Sales</h4>
                        </div>
                        <div class="card-body">
                            <form id="get_order_data" onsubmit="return false">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" align="right">Date</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="order_date" name="order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" align="right">Customer Name*</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="cust_name" name="cust_name" class="form-control form-control-sm" placeholder="Enter Customer Name" required />
                                    </div>
                                </div>
                                <div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
                                    <div class="card-body">
                                        <h3>Make a Sold list</h3>
                                        <table align="center" style="width:800px;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th style="text-align:center;">Item Name</th>
                                                    <th style="text-align:center;">Total Quantity</th>
                                                    <th style="text-align:center;">Quantity</th>
                                                    <th style="text-align:center;">Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="invoice_item">
                                                <!-- <tr>
                                                    <td><b id="number">1</b></td>
                                                    <td>
                                                        <select name="pid[]" class="form-control form-control-sm" required>
                                                            <option>Washing Machine</option>
                                                            <option> Machine</option>
                                                        </select>
                                                    </td>
                                                    
                                                    <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
                                                    <td><input name="price[]" type="text" class="form-control form-control-sm" readonly></td>
                                                    <td>TK.1540</td>
                                                </tr> -->
                                            </tbody>
                                        </table> <!--Table Ends-->
                                        <center style="padding:10px;">
                                            <button id="add" style="width:150px;" class="btn btn-success">Add</button>
                                            <button id="remove" style="width:150px;" class="btn btn-danger">Remove</button>
                                        </center>
                                    </div> <!--Crad Body Ends-->
                                </div> <!-- Order List Crad Ends-->

                                <p></p>
                                <div class="form-group row">
                                    <label for="sub_total" class="col-sm-3 col-form-label" align="right">Sub Total</label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly name="sub_total" class="form-control form-control-sm" id="sub_total" required />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="discount" class="col-sm-3 col-form-label" align="right">Discount</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="discount" class="form-control form-control-sm" id="discount" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="net_total" class="col-sm-3 col-form-label" align="right">Net Total</label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly name="net_total" class="form-control form-control-sm" id="net_total" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="paid" class="col-sm-3 col-form-label" align="right">Paid</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="paid" class="form-control form-control-sm" id="paid" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="due" class="col-sm-3 col-form-label" align="right">Due</label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly name="due" class="form-control form-control-sm" id="due" required />
                                    </div>
                                </div>

                                <center>
                                    <input type="submit" id="order_form" style="width:150px;" class="btn btn-info" value="SEND">
                                    <input type="submit" id="print_invoice" style="width:150px;" class="btn btn-success d-none" value="Print Invoice">
                                </center>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---Container Fluid-->
<!-- scrpit for onclcik funtion -->
<script src="js/ajax.js"></script>
<script src="js/proper.js"></script>
<script>
    function myFunction() {
        var x = document.getElementById("hide");
        if (x.innerHTML === "Show Details") {
            x.innerHTML = "Hide Details";
        } else {
            x.innerHTML = "Show Details";
        }
    }
</script>
<?php include "inc/footer.php"; ?>