<section>
  <div class="data-list-view-header">
    <div class="add-new-data-sidebar">
      <div class="overlay-bg"></div>
        <div class="add-new-data col-12" style="width:100%" >
          <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
              <div>
                  <h4 id="mylabel">Task Details</h4>
              </div>
              <div class="hide-data-sidebar"   >
                  <i class="feather icon-x"></i>
              </div>
          </div>
          <div class="data-items pb-3 ">
            <div class="data-fields px-2  ">
              <section id="multiple-column-form">
              <div class="row  ">
                <div class="col-12">
                  <section id="\">
                        <div class="row">
                          <div class="col-lg-9 mt-3">
                            <div class="card">
                              <div class="card-content">
                                <div class="card-body">
                                  <div class="col-md-12 col-12 mb-1">
                                        <h1 id="heretaskname">Task Name</h1>

                                        <p>@{{udata.start_date+' '+udata.start_time}} - @{{udata.end_date+' '+udata.end_time}}</p>
                                        <p id="heretaskdescription">Description</p>
                                        <br>
                                        <label for="title">Task List</label>
                                        <fieldset  v-for="(input,k) in inputs" :key="k" class="checkbox">
                                            <div class="vs-checkbox-con vs-checkbox-primary  ">
                                                <input v-if="input.status==1" checked type="checkbox" :value="input.title" :id="input.id" v-on:change="markDone(input.id,$event)">
                                                <input v-else  type="checkbox" :value="input.title" :id="input.id" v-on:change="markDone(input.id,$event)">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class=""> @{{input.title}}</span>
                                            </div>
                                        </fieldset>

                                        <div class="mt-2"> <h2> Documents </h2></div>
                                           <div class="Outputshow" id="ImageGallery">

                                                              <div v-for="(data, key) in eventImages">
                                                                      <div title='' :id="'GalleryBox'+data.file_url" class='profile-picImg GalleryBox clearimx'>
                                                                        <input type="hidden" :value="data.file_url" name="imagename[]" id="imagename">
                                                                        <div class='iconclose' v-on:click="updatearray(key,data.id)"   >X</div>
                                                                        <input type='hidden'  :value="data.file_name"  name='orgimagename[]' id='orgimagename'>




                                                                        <div class='iconfile'>
                                                                          <a :href="'{{TaskAbsPath}}'+data.task_id+'/'+data.file_url" target='_blank' style='float: left;'>
                                                                            <i v-if="['png','jpeg','jpg'].includes(data.file_name.split('.').pop())" class='fa fa-file-image-o iconsize'></i>
                                                                            <i v-else-if="['png','jpg','jpeg','bmp','gif'].includes(data.file_name.split('.').pop())"></i>
                                                                            <i v-else-if="['pdf'].includes(data.file_name.split('.').pop())" class='fa fa-file-pdf-o iconsize'></i>
                                                                            <i v-else-if="['ppt','pptx'].includes(data.file_name.split('.').pop())" class='fa fa-file-powerpoint-o iconsize'></i>
                                                                            <i v-else-if="['doc','docx'].includes(data.file_name.split('.').pop())" class='fa fa-file-word-o iconsize' ></i>
                                                                            <i v-else class='fa fa-file-o iconsize'> </i>
                                                                          </a>
                                                                        </div>
                                                                        <div class='icontitle'>
                                                                          <a  :href="'{{TaskAbsPath}}'+data.task_id+'/'+data.file_url"  target='_blank'>@{{data.file_name}}</a>
                                                                        </div>
                                                                        <div></div>
                                                                        <div class='iconsubtitle'> @{{data.file_name.split('.').pop()}}</div>
                                                                      </div>
                                                                      <div class='clearfix'></div>
                                                              </div>


                                                            </div>


                                                            
                                      
<!-- 
                                        <fieldset  v-for="(input,k) in inputs" :key="k" class="checklistpd">
                                                                 <div class="input-group">
                                                                   <div class="input-group-prepend">
                                                                     <div class="input-group-text">
                                                                       <div class="vs-checkbox-con">
                                                                         <input type="checkbox" value="false">
                                                                         <span class="vs-checkbox vs-checkbox-sm">
                                                                           <span class="vs-checkbox--check">
                                                                             <i class="vs-icon feather icon-check"></i>
                                                                           </span>
                                                                         </span>
                                                                       </div>
                                                                     </div>
                                                                   </div>
                                                                   <lable  :value="input.title" placeholder="Enter Task" aria-describedby="button-addon2" name="tasklist[]" >@{{input.title}}</lable>
                                                                    
                                                                    
                                                                 </div>
                                          </fieldset>  -->
                                         
                                            </div>
                                </div>
                              </div>
                            </div>    
                          </div> 
                          <div class="col-lg-3  mt-3">
                              <div class="">
                                <div class="card mb-0 shadow mb-1 bg-white rounded cardtoppad">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>Manager</h4>
                                    </div>
                                    <div class="card-body pt-1 pb-0 pl-1">
                                        <div v-if="udata" class="d-flex justify-content-start align-items-center  ">
                                            <div class="avatar mr-50">
                                                <img :src="udata.manager_image" onerror="this.src='{{TeamImagePath}}user.png'" alt="" height="35" width="35">
                                            </div>
                                            <div class="user-page-info"  v-if="udata">
                                                <h6 class="mb-0" >@{{udata.manager_name}}  </h6>
                                                <!-- <div class="font-small-2" v-if="user.getLeader.get_volunteer_detail">@{{revenueData.getLeader.get_volunteer_detail.get_institution.title}}</div> -->
                                                <div class="font-small-2">@{{udata.manager_position}}</div>
                                            </div>
                                        </div>
                                      </div>
                                </div>
                              </div>

                              <div class="">
                                <div class="card mb-0 shadow mb-1 bg-white rounded cardtoppad">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>Assignee</h4>
                                    </div>
                                    <div class="card-body pt-1 pb-0 pl-1">
                                        <div v-if="udata" class="d-flex justify-content-start align-items-center  ">
                                            <div class="avatar mr-50">
                                                <img :src="udata.assignee_image" onerror="this.src='{{TeamImagePath}}user.png'" alt="" height="35" width="35">
                                            </div>
                                            <div class="user-page-info"  v-if="udata">
                                                <h6 class="mb-0" >@{{udata.assignee_name}}  </h6>
                                                <!-- <div class="font-small-2" v-if="user.getLeader.get_volunteer_detail">@{{revenueData.getLeader.get_volunteer_detail.get_institution.title}}</div> -->
                                                <div class="font-small-2">@{{udata.assignee_position}}</div>
                                            </div>
                                        </div>
                                      </div>
                                </div>
                              </div>
                              <div class="">
                                <div class="card mb-0 shadow mb-1 bg-white rounded cardtoppad">
                                    <div class="card-header d-flex justify-content-between">
                                        <h4>Observer</h4>
                                    </div>
                                    <div class="card-body pt-1 pb-0 pl-1">
                                        <div v-for="data in udata.get_team" class="d-flex justify-content-start align-items-center  ">
                                            <div class="avatar mr-50">
                                                <img :src="'{{UserPath}}'+data.get_observers.id+'/Thumb/'+data.get_observers.profile_pic" onerror="this.src='{{TeamImagePath}}user.png'" alt="" height="35" width="35">
                                            </div>
                                            <div class="user-page-info" >
                                                <h6 class="mb-0" >@{{data.get_observers.first_name}}  </h6>
                                                <div class="font-small-2">@{{data.get_observers.position}} </div>
                                            </div>
                                        </div>
                                      </div>
                                </div>
                              </div>
                             
                          </div>          
                  </section>
                </div>         
              </div>
              </section>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>              



                      
                    

 
 