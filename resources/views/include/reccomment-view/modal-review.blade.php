 <!-- The Modal -->
 <div class="modal fade modal-position-c" id="myModal">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
                 <h4 class="modal-title">ส่งความคิดเห็น</h4>
                 <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
             </div>

             <!-- Modal body -->
             <div class="modal-body">
                 <div class="row">
                     <form action="#" method="post">
                         @csrf
                         <div class="col-12 d-flex justify-content-center align-items-center">
                             <input type="radio" class="btn-check star-input" id="btn-check-1" name="score"
                                 autocomplete="off" value="1">
                             <label class="star" for="btn-check-1"><span class="fa fa-star star-check"
                                     id="st-1"></span></label>
                             <input type="radio" class="btn-check star-input" id="btn-check-2" name="score"
                                 autocomplete="off" value="2">
                             <label class="star" for="btn-check-2"><span class="fa fa-star star-check"
                                     id="st-2"></span></label>
                             <input type="radio" class="btn-check star-input" id="btn-check-3" name="score"
                                 autocomplete="off" value="3">
                             <label class="star" for="btn-check-3"><span class="fa fa-star star-check"
                                     id="st-3"></span></label>
                             <input type="radio" class="btn-check star-input" id="btn-check-4" name="score"
                                 autocomplete="off" value="4">
                             <label class="star" for="btn-check-4"><span class="fa fa-star star-check"
                                     id="st-4"></span></label>
                             <input type="radio" class="btn-check star-input" id="btn-check-5" name="score"
                                 autocomplete="off" value="5">
                             <label class="star" for="btn-check-5"><span class="fa fa-star star-check"
                                     id="st-5"></span></label>
                         </div>
                         <div class="col-12 mt-3">
                             <input type="hidden" name="md-result" id="md-result">
                             <textarea name="md-details" id="md-details" cols="10" rows="4" class="form-control"></textarea>
                         </div>
                         <div class="col-12 mt-3">
                             <button type="button" class="form-control" id="sent-review" disabled>ส่ง</button>
                         </div>
                     </form>
                 </div>
             </div>

             <!-- Modal footer -->
             {{-- <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div> --}}
             <!-- Modal footer -->

         </div>
     </div>
 </div>
