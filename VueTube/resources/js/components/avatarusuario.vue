<template>
    <avatar v-if="channelname" :username="channelname" :size="30" class="mr-3"></avatar>
</template>

<script>
import Avatar from 'vue-avatar';
export default {
    components: {
        Avatar
    },
    props: {
        channelname: {
            required: true,
            default: ""
        }
    },
}
</script>