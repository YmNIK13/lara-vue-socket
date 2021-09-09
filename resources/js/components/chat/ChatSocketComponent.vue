<template>
    <div class="container container-chat">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="from-group">
                    <textarea rows="12" readonly="" class="form-control">{{dataMessages.join('\n')}}</textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Укажите Имя" v-model="user_name">
                    <input type="text" class="form-control" style="flex-grow:2" placeholder="Наберите сообщение" autofocus
                           v-model="message" @keyup.enter="sendMessage">
                    <div class="input-group-append">
                        <button @click="sendMessage" class="btn btn-outline-secondary" type="button">отправить</button>
                    </div>
                </div>
            </div>

        </div>
        <pre>{{ JSON.stringify(this.result, null, '     ') }}</pre>
    </div>
</template>

<script>


export default {

    data: (vm) => ({
        user_id: '',
        user_name: '',

        dataMessages: [],
        message: "",
    }),
    created() {
        let user_id = localStorage.getItem('user.user_id')
        if (!!user_id) {
            this.user_id = user_id
        }

        let user_name = localStorage.getItem('user.user_name')
        if (!!user_name) {
            this.user_name = user_name
        }
    },
    mounted() {
        const socket = io('/')

        socket.on('news-action.:App\\Events\\NewMessage', (messageObj) => {
            let message = messageObj.data.message;
            console.log('message', message)

            this.dataMessages.push(message.user_name + ' [' + message.create.substr(11, 8) + ']: ' + message.text)
        })
    },


    methods: {
        sendMessage() {
            if (!this.user_id) {
                let user_id = 'usr_' + Math.floor(Math.random() * 400) + +(new Date().getTime())
                localStorage.setItem('user.user_id', user_id)
                this.user_id = user_id
            }

            let user_name = localStorage.getItem('user.user_name')
            if (!!this.user_name || user_name !== this.user_name) {
                localStorage.setItem('user.user_name', this.user_name)
            }

            axios({
                method: 'post',
                url: `/ajax/send-message`,
                params: this.result
            })
                .then(response => {
                    this.message = ''
                })

        },
    },

    computed: {
        result() {
            return {
                "user_id": this.user_id,
                "user_name": this.user_name,
                "text": this.message,
            }
        }
    },
}
</script>

<style scoped>
.container-chat {
    width: 100%;
}


@media (min-width: 850px) {
    .container-chat {
        width: 800px;
    }
}
</style>
