<template id="listing-template">
    <div>
        <h1>Listing</h1>    
        <table class="table">
            <thead>
                <th v-for="field in fields" @click="sortByColumn(field.name)"
                    class="table-head">
                    {{ field.label }}
                    <span v-if="'{{ field.name }}' === sortedColumn">
                        <i v-if="order === 'asc' " class="fa fa-sort-asc"></i>
                        <i v-else class="fa fa-sort-desc"></i>
                    </span>
                    <span v-else>
                        <i class="fa fa-sort"></i>
                    </span>
                </th>
                <th>Actions</th>
            </thead>
            
            <tbody>                
                <tr v-for="user in users">
                    <td v-for="field in fields">{{ user[field.name] }}</td>
                    <td><a href="list/"><i class="fa fa-eye"></i></a></a></td>
                </tr>
            </tbody>
        </table>

        <ul class="pagination">
            <li v-if="pagination.current_page > 1">
                <a href="javascript:void(0)" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)">
                    <span aria-hidden="true">«</span>
                    </a>
            </li>
            <li v-for="page in pagesNumber" :class="{'active': page == pagination.current_page}">
                <a href="javascript:void(0)" v-on:click.prevent="changePage(page)">{{ page }}</a>
            </li>
            <li v-if="pagination.current_page < pagination.last_page">
                <a href="javascript:void(0)" aria-label="Next" v-on:click.prevent="changePage(pagination.current_page + 1)">
                    <span aria-hidden="true">»</span>
                    </a>
            </li>
        </ul>
    </div>
</template> 
<script>        
    export default {
        template:"#listing-template",
        // props:['users'],        
        data: function(){
            return {
                fields: [{'name':'id','label':'Id'},
                    {'name':'name','label':'Name'},
                    {'name':'sku','label':'SKUs'},
                    {'name':'description','label':'Description'},
                ],
                users: [],
                pagination: [],
                order: 'asc',
                sortedColumn: 'id'
            };
        },
        computed: {
            pagesNumber() {                
                pagesArray = [];
                let from = this.pagination.from;                
                let to = this.pagination.last_page;
                let pagesArray = [];
                for (let page = from; page <= to; page++) {
                    pagesArray.push(page);
                }
                return pagesArray;
            }
        },
        created: function() {
            this.fatchUsersData()            
        },
        methods:{
            fatchUsersData: function(){
                this.makeGetCall();
            },
            changePage: function(page){                
               this.makeGetCall(page);

            },
            sortByColumn(column) {
                if (column === this.sortedColumn) {
                    this.order = (this.order === 'asc') ? 'desc' : 'asc'
                } else {
                    this.sortedColumn = column
                    this.order = 'asc'
                }
                // this.order = (this.order === 'asc') ? 'desc' : 'asc';
                this.makeGetCall();

            },            
            makeGetCall: function(page = null) {                
                if (page == null) {
                    page = this.pagination.current_page;
                }
                $.getJSON('get-data?page='+page+'&column='+this.sortedColumn+'&order='+this.order, function(data){
                // $.getJSON('api/tasks?page='+page, function(data){
                    this.users = data.data;                    
                    var pageArr = [];
                    pageArr.push({
                        current_page:data.current_page,
                        from: 1,
                        to:data.to,
                        total:data.total,
                        per_page:data.per_page,
                        last_page:data.last_page,
                        prev_page_url:data.prev_page_url,
                        first_page_url:data.first_page_url,
                        last_page_url:data.larst_page_url,
                        next_page_url:data.next_page_url,
                        path:data.path
                    });
                    this.pagination = pageArr[0];
                }.bind(this));
            }
        }
    }
</script>

<style scoped>
    a {        
        padding: 5px 5px 5px 5px;
        background-color: white;        
        border: 5px;        
    }
    li.active > a {
        font-weight: bold;        
    }
    .fa-sort{
        opacity: 0.5;
    }
</style>