<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="from-group">
                    <textarea rows="6" readonly="" class="form-control">{{dataMessages.join('\n')}}</textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Наберите сообщение" v-model="message">
                    <div class="input-group-append">
                        <button @click="sendMessage" class="btn btn-outline-secondary" type="button">отправить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>


export default {

    data: (vm) => ({
        dataMessages: [],
        message: "",
    }),
    mounted() {
        const socket = io('/')

        socket.on('news-action:App\\Events\\NewMessage', (messageObj) => {
            console.log('messageObj', messageObj)
            // публичное поле из события laravel
            this.dataMessages.push(messageObj.data.message)
        })
    },
    methods: {
        sendMessage: function () {

            axios({
                method: 'post',
                url: `/ajax/send-message`,
                params: {
                    message: this.message,
                }
            })
                .then(response => {
                    this.message = ''
                })

        }
    }
}
</script>
