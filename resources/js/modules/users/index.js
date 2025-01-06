Alpine.data('list_user', () => ({
    users: [],
    roles: [],
    formData: {
        name: '',
        email: '',
        role: '',
    },
    isManager: null,

    init() {
        this.loadUsers();
        this.loadRoles();
    },

    loadUsers() {
        axios.get('/get-users')
            .then((response) => {
                console.log(response);
                this.users = response.data.users;
            })
            .catch((error) => {
                console.log(error);
            });
    },
    getUser(id){
        axios.get(`/users/${id}`)
            .then((response) => {
                console.log(response);
                this.formData.name = response.data.user.name;
                this.formData.email = response.data.user.email;
                this.isManager = response.data.isManager;
            })
            .catch((error) => {
                console.log(error);
            });
    },

    loadRoles() {
        axios.get('/get-roles')
            .then((response) => {
                console.log(response);
                this.roles = response.data.roles;
            })
            .catch((error) => {
                console.log(error);
            });
    },

    storeUser() {
        axios.post('/users', {
            name: this.formData.name,
            email: this.formData.email,
            role: this.formData.role,
        })
            .then((response) => {
                console.log(response);
                this.resetForm();
                this.loadUsers();
            })
            .catch((error) => {
                console.log(error);
                this.handleError(error.response.data.errors);
            });
    },

    resetForm() {
        this.formData.name = '';
        this.formData.email = '';
        this.formData.role = '';
    },

    handleError(errors) {
        for (const [key, value] of Object.entries(errors)) {
            document.getElementById(key).classList.add('border-red-500')
            document.getElementById(key).after(value[0])
        }
    },
}))
