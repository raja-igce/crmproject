<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="card" style="height:auto ">
                <div class="card-header mx-auto pb-0">
                    <div class="row m-0">
                        <div class="col-sm-12 text-center">
                            <h4 id="pname">Data</h4>
                        </div>
                        <div class="col-sm-12 text-center">
                            <p class="pposition" id="pposition">Volunteer</p>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body text-center mx-auto">
                            <div class="avatar avatar-xl">
                                <img class="img-fluid" id="pimg" src="http://localhost/innereye/crm/public/assets/Users/217/Thumb/Document1580911510_886.jpg" alt="img placeholder">
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div class="uploads">
                                    <p id="pcamp" class="font-weight-bold font-medium-2 mb-0">0</p>
                                    <span class="">Campaigns</span>
                                </div>
                                <div class="followers">
                                    <p id="pevent" class="font-weight-bold font-medium-2 mb-0">0</p>
                                    <span class="">Events</span>
                                </div>
                                <div class="following">
                                    <p id="pblog" class="font-weight-bold font-medium-2 mb-0">0</p>
                                    <span class="">Blogs</span>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                                <div class="mt-2 mb-1">
                                    <button class="btn gradient-light-primary waves-effect waves-light pull-left" style="width:45%" >Follow</button>
                                    <a href="{{route('ichat')}}">
                                    <button class="btn btn-outline-primary waves-effect waves-light pull-right" style="width:45%" >Message</button>
                                    </a>
                                </div>
                            <div class="clearfix"></div>
                        </div>
                </div>
            </div>
      </div>
       
    </div>
  </div>
</div>
