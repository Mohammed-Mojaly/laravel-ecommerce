<style>
    input{
        background: black !important;
    }
</style>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">


        </div>
        <div class="modal-body">
        <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">

        <div class="row">

         <div class="col-12">
            <div class="form-group">
             <label for="inputName" class="col-sm-3 control-label">Name</label>
               <div class="col-sm-9">

                <input readonly type="text" class="form-control has-error" id="name" name="name" placeholder="Product Name" value="">
               </div>
            </div>
         </div>

         <div class="col-12">
            <div class="form-group">
             <label for="inputName" class="col-sm-3 control-label">Price</label>
               <div class="col-sm-9">
                <input readonly  type="text" class="form-control has-error" id="price" name="price" placeholder="Product Name" value="">
               </div>
            </div>
         </div>

         <div class="col-12">
            <div class="form-group">
             <label for="inputName" class="col-sm-3 control-label">Quantity</label>
               <div class="col-sm-9">
                <input readonly type="text" class="form-control has-error" id="quantity" name="quantity" placeholder="Product Name" value="">
               </div>
            </div>
         </div>

         <div class="col-12">
             <div class="form-group">
             <label for="inputDetail" class="col-sm-3 control-label">Details</label>
                <div class="col-sm-9">
                <input readonly type="text" class="form-control" id="details" name="details" placeholder="details" value="">
                </div>
            </div>
         </div>
        </div>
        </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        <input type="hidden" id="product_id" name="tour_id" value="0">
        </div>
    </div>
  </div>
</div>
</div>
