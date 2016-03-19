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
    template: '#update-existing-user',

    props: ['user'],

    data() {
        return {
            u: []
        }
    },

    created() {
        this.fetchUserData()
    },

    methods: {
        fetchUserData() {
          this.$http.get('api/users/', user).then(function(response) {
              this.u = response.data;
          }, function(response) {
              this.$dispatch('error-handler', response.data);
          });
        },
        updateUser(e, user) {
            e.preventDefault()
            this.$http.post('api/users/'+ user, this.user).then(function(response) {
                this.$dispatch('update-users', response.data);
            }, function(response) {
                this.$dispatch('error-handler', response.data);
            });
        }
    }
});

new Vue({
    el: '#vjs-users',

    components: ['users-create-view', 'users-edit-view'],

    data: {
        currentView: '',
        users: [],
        errors: [],
        messages: []
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
        clearErrors() {
            this.errors = [];
        },
        clearMessages() {
            this.messages = ''
        }
    },

    events: {
        'update-users': function(data) {
            this.errors = [];
            this.users.push(data);
            this.currentView = '';
            var message = {'text': 'User has been created.', 'status':'success'};
            this.messages.push(message);
        },

        'error-handler': function(response) {
            this.errors.push(response);
        }
    }
});