<template>
<div>
    
    <div class="media my-3" v-for="reply in replies.data" :key="reply.reply">
        <a class="mr-3" href="#">
            <avatar v-if="reply.user && reply.channelImage == null" :username="reply.user.name" :size="30" class="mr-3"></avatar>
            <img v-else :src="reply.channelImage" style="width:30px; height: 30px" class="rounded-circle mr-3"/>
        </a>
        <div class="media-body">
            <h6 class="mt-0" v-if="reply.user">{{reply.user.name}}</h6>
            <small >{{reply.body}}</small>
            <votes v-if="reply.user" :default_votes="reply.votes" :entity_id="reply.id" :entity_owner="reply.user.id"></votes>
        </div>
        
    </div>
        <div class="text-center" v-if="comment.repliesCount > 0 && replies.next_page_url">
            <button @click="fetchReplies" class="btn btn-info btn-sm">Cargar respuestas...</button>
        </div>
    
    
</div>
</template>

<script>
import Avatar from 'vue-avatar';
export default {
    props: ['comment'],
    components: {
        Avatar,
    },

    data(){
        return {
            replies: {
                data: [],
                next_page_url: `/comments/${this.comment.id}/replies`
            }
        }
        
    },

    methods: {
        fetchReplies() {
            axios.get(this.replies.next_page_url).then(({data}) => {
                this.replies = {
                    ...data, 
                    data: [
                        ...this.replies.data,
                        ...data.data
                    ]
                }
            });
        },

        addReply(reply) {
            this.replies = {
                ...this.replies,
                data: [
                    reply,
                    ...this.replies.data
                ]
            }
        }
    }
}
</script>