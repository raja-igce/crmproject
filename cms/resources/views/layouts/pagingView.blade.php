<div class="pageview">
     <div class="rows" v-if="users">
       <div v-if="users.from" class="pull-left">
         @{{users.from}}-@{{users.to}} / @{{users.total}} Records
       </div>
       <div v-else class="col-lg-12 text-center">
            No record found
       </div>
       <div v-if="users.last_page>1"  >
           <vue-pagination :pagination="users" @paginate="getUsers(1)" :offset="4"></vue-pagination>
       </div>
     </div>
 </div>
