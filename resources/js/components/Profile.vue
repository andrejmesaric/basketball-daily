<style>
.widget-user-header {
    background-position: center center;
    background-size: cover;
    min-height: 300px;
}
</style>

<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">                
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-white" style="background-image: url('./img/basketball-court.jpg');">
                        <h3 class="widget-user-username text-right">{{ form.name }}</h3>
                        <h5 class="widget-user-desc text-right">{{ form.description }}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                            <h5 class="description-header">3,200</h5>
                            <span class="description-text">SALES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                            <h5 class="description-header">13,000</h5>
                            <span class="description-text">FOLLOWERS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                            <h5 class="description-header">35</h5>
                            <span class="description-text">PRODUCTS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>                
                    <!-- /.widget-user -->
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                    <div class="tab-pane" id="activity">                        
                    </div>

                    <div class="active tab-pane" id="settings">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" v-model="form.name" class="form-control" id="inputName" placeholder="Name" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" v-model="form.email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>                        
                            <div class="form-group row">
                                <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-12">
                                <textarea class="form-control" v-model="form.description" id="inputDescription" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputDescription" class="col-sm-2 col-form-label">User type</label>
                                <div class="col-sm-12">
                                <select v-model="form.type" name="type" id="type" class="form-control"  
                                :class="{ 'is-invalid': form.errors.has('type') }">
                                    <option>Select User Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">Standard User</option>
                                    <option value="author">Authors</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="photo" class="col-sm-12 control-label">Profile Photo</label>
                                <div class="col-sm-12">
                                    <input type="file" @change="updateProfile($event)" name="photo" class="form-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mt-3">
                                <button type="submit" @click.prevent="updateInfo" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    description:'',
                    photo: '',
                    remember: false
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            updateInfo() {
                this.form.put('api/user/'+this.form.id)
                .then(() => {

                })
                .catch(() => {

                });
            },
            updateProfile(e) {
                //console.log(e.target.files);
                let file = e.target.files[0];
                let reader = new FileReader();
                reader.onloadend = (file) => {
                    //this.form.photo = "test";
                    this.form.photo = reader.result;
                }
                reader.readAsDataURL(file);
            }
        },

        created() {
            axios.get("api/profile")
            .then(({data}) => (this.form.fill(data)))
        }
    }
</script>
