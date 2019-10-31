<template>
    <div class="card mt-5 p-5">
        <div class="media" v-for="(comment) of comments.data" v-bind:key="comment.comment">
            <img width="30" height="30" class="rounded-circle mr-3" src="https://picsum.photos/id/42/200/200">

            <div class="media-body">
                <h6 class="mt-0">
                    {{ comment.user.name }}
                </h6>
                <small>{{ comment.body }}</small>
                <div class="form-inline my-4 w-full">
                        <input type="text" class="form-control form-control-sm w-80">
                        <button class="btn btn-sm btn-primary">
                            <small>Add comment</small>
                        </button>
                </div>

                <div class="media mt-3">
                    <a class="mr-3" href="#">
                        <img width="30" height="30" class="rounded-circle mr-3" src="https://picsum.photos/id/42/200/200">
                    </a>
                    <div class="media-body">
                        <h6 class="mt-0">Media heading</h6>
                        <small >Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</small>

                        <div class="form-inline my-4 w-full">
                                <input type="text" class="form-control form-control-sm w-80">
                                <button class="btn btn-sm btn-primary">
                                    <small>Add comment</small>
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['video'],

        mounted() {
            this.fetchComments()
        },

        data(){
            return {
                comments: {
                    data: []
                },

                user: {}
            }
        },

        methods: {
            fetchComments() {
                axios.get(`/videos/${this.video.id}/comments`).then(({data}) => {
                    this.comments = data
                    //console.log(this.comments.data[0].user.name);
                });
            }
        }
    }
</script>