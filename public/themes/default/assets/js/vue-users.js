import Vue from 'vue';
Vue.use(require('vue-resource'));

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('input[name="_token"').getAttribute('value');

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
            this.$http.post('api/users', this.user, function(data) {
                this.$dispach('update-users', data)
            });
        }
    }
});

new Vue({
    el: '#vjs-users',

    components: ['users-create-view'],

    data: {
        currentView: '',
        users: []
    },

    created() {
        this.fetchUsersList();
    },

    methods: {
        fetchUsersList() {
            this.$http.get('api/users').then(function(response) {
                this.users = response.data;
            }.bind(this));
        }
    }
});