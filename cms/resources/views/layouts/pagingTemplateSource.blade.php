<script type="text/x-template" id="pagination-template">
   <div class="dataTables_paginate paging_simple_numbers">
    <ul class="pagination justify-content-center">
      <li class="page-item" v-if="pagination.current_page > 1" >
        <a href="javascript:void(0)"  class="page-link" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)">
                <span aria-hidden="true">«</span>
                </a>
      </li>
      <li class="page-item" v-for="page in pagesNumber" :class="{'active': page == pagination.current_page}">
        <a href="javascript:void(0)"  class="page-link" v-on:click.prevent="changePage(page)"><% page %></a>
      </li>
      <li class="page-item" v-if="pagination.current_page < pagination.last_page">
        <a href="javascript:void(0)"  class="page-link" aria-label="Next" v-on:click.prevent="changePage(pagination.current_page + 1)">
                  <span aria-hidden="true">»</span>
                </a>
      </li>
    </ul>
  </div>
  </script>
  <script type="text/x-template" id="paypagination-template">
         <div class="dataTables_paginate paging_simple_numbers">
          <ul class="pagination justify-content-center">
            <li class="page-item" v-if="pagination.current_page > 1" >
              <a href="javascript:void(0)"  class="page-link" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)">
                      <span aria-hidden="true">«</span>
                      </a>
            </li>
            <li class="page-item" v-for="page in pagesNumber" :class="{'active': page == pagination.current_page}">
              <a href="javascript:void(0)"  class="page-link" v-on:click.prevent="changePage(page)"><% page %></a>
            </li>
            <li class="page-item" v-if="pagination.current_page < pagination.last_page">
              <a href="javascript:void(0)"  class="page-link" aria-label="Next" v-on:click.prevent="changePage(pagination.current_page + 1)">
                        <span aria-hidden="true">»</span>
                      </a>
            </li>
          </ul>
        </div>
</script>
