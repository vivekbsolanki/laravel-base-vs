 
 <template>        
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body" id="app">                        
                        <form method="POST" action="/vuejs/form" class="form-horizontal" @submit.prevent="onSubmit" id="vue-form">
                        
                            <div :class="['form-group', allerros.name ? 'has-error' : '']" >
                                <label for="name" class="col-sm-4 control-label">Name</label>

                                <div class="col-sm-6">
                                    <input id="name" name="name" value=""  autofocus="autofocus" class="form-control" type="text" v-model="form.name">

                                    <span v-if="allerros.name" :class="['label label-danger']">{{ allerros.name[0] }}</span>

                                </div>
                            </div>
                            <div :class="['form-group', allerros.comments ? 'has-error' : '']" >
                                <label for="comments" class="col-sm-4 control-label">Message</label>

                                <div class="col-sm-6">
                                    <input id="comments" name="comments" class="form-control" type="comments" v-model="form.comments">

                                    <span v-if="allerros.comments" :class="['label label-danger']">{{ allerros.comments[0] }}</span>

                                </div>
                            </div>                                                        
                            <button type="submit" class="btn btn-primary">Send</button>
                            <span v-if="success" :class="['label label-success']">{{ (success_msg) ? success_msg : "Success!" }}</span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>    
    <script>
        window.axios = require('axios');
        export default {
            data() {
                return {
                    form: {
                        name : '',
                        comments : '',    
                    },
                    allerros: [],
                    success : false,
                }                    
            },
            methods : {
                onSubmit: function(e) {
                    var form = document.getElementById('vue-form');
                    var dataform = new FormData(form);
                    // dataform = new FormData();
                    
                    dataform.append('name', this.form.name);
                    dataform.append('comments', this.form.comments);
                    
                    axios.post('vuevalidation/form', dataform).then( response => {
                        this.allerros = [];
                        this.form.name = '';
                        this.form.comments = '';
                        this.success = true;
                        this.success_msg = response.data.success;
                    } ).catch((error) => {
                        this.allerros = error.response.data.errors;
                        this.success = false;                        
                    });
                }
            }
        }
    </script>
    <style scoped>       
        .label-danger {
            color: #ff0000;
        }
        .label-success {
            color: #07a707;
        }
    </style>