<template>
<div>
    <div class="media my-3">
            <!--<img width="30" height="30" class="rounded-circle mr-3" src="https://picsum.photos/id/42/200/200">-->
            
            <avatar v-if="comment.user" :username="comment.user.name" :size="30" class="mr-3"></avatar>

            <div class="media-body">
                <h6 class="mt-0" v-if="comment.user">
                    {{ comment.user.name }}
                </h6>
                <small>{{ comment.body }}</small>
                
                <div class="d-flex">
                    <votes v-if="comment.user" :default_votes="comment.votes" :entity_id="comment.id" :entity_owner="comment.user.id"></votes>
                    <button @click="addingReply = !addingReply" class="btn btn-sm ml-2" :class="{'btn-default':!addingReply, 'btn-danger':addingReply}">{{addingReply ? 'Cancelar' : 'Añadir respuesta'}}</button>
                </div>
            </div>
        </div>

        <div v-if="addingReply" class="form-inline my-4 w-full">
                    <input type="text" class="form-control form-control-sm w-80">
                    <button class="btn btn-sm btn-primary">
                        <small>Añadir respuesta</small>
                    </button>
        </div>
        <replies :comment="comment"></replies>
        
</div>
</template>

<script>
import Replies from './replies.vue';
import Avatar from 'vue-avatar';
export default {
    components: {
        Replies,
        Avatar
    },
    props: {
        comment: {
            required: true,
            default: ()=>({})
        }
    },
    data () {
        return {
            addingReply: false
        }
    }
}
</script>