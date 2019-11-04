<template>
    <div class="card mt-5 p-5">
        <div class="form-inline my-4 w-full">
                <input v-model="newComment" type="text" class="form-control form-control-sm w-80">
                <button @click="addComment" class="btn btn-sm btn-primary">
                    <small>Add comment</small>
                </button>
        </div>
        <div class="media my-3" v-for="comment of comments.data" v-bind:key="comment.comment">
            <!--<img width="30" height="30" class="rounded-circle mr-3" src="https://picsum.photos/id/42/200/200">-->
            
            <avatar v-if="comment.user" :username="comment.user.name" :size="30" class="mr-3"></avatar>

            <div class="media-body">
                <h6 class="mt-0" v-if="comment.user">
                    {{ comment.user.name }}
                </h6>
                <small>{{ comment.body }}</small>
                
                <votes v-if="comment.user" :default_votes="comment.votes" :entity_id="comment.id" :entity_owner="comment.user.id"></votes>
                <replies :comment="comment"></replies>
            </div>
        </div>

        <div class="text-center">
            <button v-if="comments.next_page_url" @click="fetchComments" class="btn btn-success">
                Cargar más..
            </button>
        </div>
    </div>
</template>

<script>
    import Avatar from 'vue-avatar';
    import Replies from './replies.vue';
    export default {
        props: ['video'],

        components: {
            Avatar,
            Replies
        },

        mounted() {
            this.fetchComments()
        },

        data: () => ({
            comments: {
                data: []
            },

            newComment: ''
        }),

        methods: {
            fetchComments() {
                const url = this.comments.next_page_url ? this.comments.next_page_url : `/videos/${this.video.id}/comments`;
                axios.get(url).then(({data}) => {
                    this.comments = {
                        ...data, 
                        data: [
                            ...this.comments.data,
                            ...data.data
                        ]
                    }
                });
            },
            addComment() {
                if(!this.newComment) return
                
                axios.post(`/comments/${this.video.id}`, {
                    body: this.newComment
                }).then(({data}) => {
                    console.log(data)
                })
            }
        }
    }
</script>