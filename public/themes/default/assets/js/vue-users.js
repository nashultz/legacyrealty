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

new Vue({
    el: '#vjs-users',

    components: ['users-create-view'],

    data: {
        currentView: '',
        users: [],
        errors: [],
        message: ''
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
        }
    },

    events: {
        'update-users': function(data) {
            this.users.push(data);
            this.currentView = '';
            console.log('users data: ' + data)
            console.log('update-users hit')
        },

        'error-handler': function(response) {
            this.errors.push(response);
            console.log('error-handler hit')
        }
    }
});