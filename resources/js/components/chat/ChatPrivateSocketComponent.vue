<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="row form-group">
                    <div class="col-sm-4">
                        <select multiple="" size="6" class="form-control" v-model="usersSelect">
                            <option v-for="(user, id) in users" :value="`news-action.` + id" :key="id">{{ user }}</option>
                        </select>
                    </div>
                    <div class="col-sm-8">
                        <textarea rows="6" readonly="" class="form-control">{{dataMessages.join('\n')}}</textarea>
                    </div>
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
    props: ['users', 'owner'],
    data: (vm) => ({
        dataMessages: [],
        message: "",
        usersSelect: []
    }),
    mounted() {
        const socket = io('/socket')

        // подписываемся на общий чат
        socket.on('news-action.' + ':App\\Events\\PrivateMessage', (messageObj) => {
            console.log('messageObj', messageObj)
            // публичное поле из события laravel
            this.dataMessages.push(messageObj.data.message.user + ': ' + messageObj.data.message.message)
        })

        // подписываемся на личный чат
        socket.on('news-action.' + this.owner.id + ':App\\Events\\PrivateMessage', (messageObj) => {
            console.log('messageObj', messageObj)
            // публичное поле из события laravel
            this.dataMessages.push(messageObj.data.message.user + ': ' + messageObj.data.message.message)
        })
    },
    methods: {
        sendMessage: function () {
            let usersSelect = this.usersSelect;

            if (!usersSelect.length) {
                usersSelect = ['news-action.']
            }

            console.log('usersSelect', usersSelect)

            axios({
                method: 'post',
                url: `/ajax/send-private-message`,
                params: {
                    message: this.message,
                    channels: usersSelect,
                    user: this.owner.email
                }
            })
                .then(response => {
                    this.dataMessages.push(this.owner.email + ': ' + this.message);
                    this.message = ''
                })

        }
    }
}
</script>
