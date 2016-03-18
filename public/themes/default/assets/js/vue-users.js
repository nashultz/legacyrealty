import Vue from 'vue';
Vue.use(require('vue-resource'));

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#_token').getAttribute('value');

Vue.component('users-create-view', {
    template: '#create-new-user',

    data() {
        return {
            user: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            }
        }
    },

    methods: {
        createNewUser(e) {
            e.preventDefault()
            this.$http.post('api/users', this.user).then(function(response) {
                this.$dispatch('update-users', response.data);
            }, function(response) {
                this.$dispatch('error-handler', response.data);
            });
        }
    }
});

Vue.component('users-edit-view', {
    template: '#edit-user',

    data() {
        return {
            user: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            }
        }
    },

    methods: {
        createNewUser(e) {
            e.preventDefault()
            this.$http.post('api/users', this.user).then(function(response) {
                this.$dispatch('update-users', response.data);
            }, function(response) {
                this.$dispatch('error-handler', response.data);
            });
        }
    }
});

new Vue({
    el: '#vjs-users',

    components: ['users-create-view'],

    data: {
        currentView: '',
        users: [],
        errors: [],
        message: []
    },

    created() {
        this.fetchUsersList();
    },

    methods: {
        fetchUsersList() {
            this.$http.get('api/users').then(function(response) {
                this.users = response.data;
            }, function (response) {
                this.errors = response.data;
            }.bind(this));
        },
        clearError() {
            this.errors = [];
        },
        clearMessages() {
            this.messages = []
        }
    },

    events: {
        'update-users': function(data) {
            this.errors = [];
            this.users.push(data);
            this.currentView = '';
            this.message.text = 'User has been created.';
            this.message.status = 'success';
            this.messages.push(this.message);
        },

        'error-handler': function(response) {
            this.errors.push(response);
        }
    }
});